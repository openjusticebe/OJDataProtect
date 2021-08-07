<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation;

class OrganisationController extends Controller
{
    public function show(Organisation $organisation)
    {
        return view('organisation.organisation', compact('organisation'));
    }
}
