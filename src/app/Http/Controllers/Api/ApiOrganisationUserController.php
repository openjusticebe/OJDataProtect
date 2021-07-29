<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Organisation;

class ApiOrganisationUserController extends Controller
{
    public function update(Organisation $organisation, User $user)
    {
    }

    public function create(Organisation $organisation, User $user) // attach
    {
    }


    public function destroy(Organisation $organisation, User $user) // detach
    {
    }
}
