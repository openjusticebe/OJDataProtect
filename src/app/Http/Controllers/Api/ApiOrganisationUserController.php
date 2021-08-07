<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Organisation;

class ApiOrganisationUserController extends Controller
{
    public function detach(Organisation $organisation, User $user, Request $request)
    {
        if (Gate::allows('detach-user', $organisation)) {
            $organisation->users()->detach($user->id);

            if ($request->ajax() || $request->wantsJson()) {
                return response(null, Response::HTTP_OK);
            } else {
                //  need api_token if regular form
                return redirect()->route('portfolio');
            }
        }
    }

    public function store(Organisation $organisation, AttachUser $request)
    {
        $user = User::whereEmail($request->email)->firstOrFail();

        if (!in_array($organisation->id, $user->organisations()->pluck('organisations.id')->toArray())) {
            $organisation->users()->syncWithoutDetaching([$user->id => ['role' => 'member']]);

            event(new UserAddedToOrganisationEvent($user, $organisation));
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response(null, Response::HTTP_OK);
        } else {
            //  need api_token if regular form
            return redirect()->back();
        }
    }

    public function update(Organisation $organisation, User $user, Request $request)
    {
        if (Gate::allows('change-role', $organisation)) {
            $organisation->users()
      ->updateExistingPivot(
          $request->input('id'),
          [
          'role' => $request->input('role'),
        ]
      );

            return response(null, Response::HTTP_OK);
        }
    }
}
