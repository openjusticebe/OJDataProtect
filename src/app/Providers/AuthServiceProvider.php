<?php

namespace App\Providers;

use App\Models\Organisation;
use App\Models\Text;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('access-root', function (
            User $user
        ) {
            return $this->isRoot($user);
        });

        Gate::define('view-organisation', function (
            User $user,
            Organisation $organisation
        ) {
            return $this->belongsToOrganisation($organisation, $user);
        });

        Gate::define('detach-user', function (
            User $user,
            Organisation $organisation
        ) {
            if ($this->isAdmin($organisation, $user)) {
                if ($this->notUniqueAdmin($organisation)) {
                    return true;
                } elseif ($this->notOnlyMember($organisation)) {
                    return true;
                }
            } else {
                return true;
            }
        });

        Gate::define('change-role', function (
            User $user,
            Organisation $organisation
        ) {
            return $this->isAdmin($organisation, $user);
        });

        Gate::define('delete-organisation', function (
            User $user,
            Organisation $organisation
        ) {
            return $this->isAdmin($organisation, $user);
        });

        Gate::define('delete-process', function (
            User $user,
            Process $process
        ) {
            return $process->uploader_id == $user->id;
        });
    }

    #
    # private functions
    #
    private function belongsToOrganisation(Organisation $organisation, User $user)
    {
        return in_array($organisation->id, $user->Organisations()->pluck('Organisations.id')->toArray());
    }

    private function isAdmin(Organisation $organisation, User $user)
    {
        return in_array($user->id, $organisation->users()->whereRole('admin')->pluck('Organisation_user.user_id')->toArray());
    }

    private function notUniqueAdmin(Organisation $organisation)
    {
        return ($organisation->users()->whereRole('admin')->get()->count() > 1);
    }

    private function isRoot(User $user)
    {
        return ($user->id == 1);
    }

    private function notOnlyMember(Organisation $organisation)
    {
        return ($organisation->users()->get()->count() > 1);
    }
}
