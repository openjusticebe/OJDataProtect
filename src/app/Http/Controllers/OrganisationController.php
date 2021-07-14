<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation;

class OrganisationController extends Controller
{
    public function __construct()
    {
    }

    public function show($org_slug)
    {
        $organisation = Organisation::whereSlug($org_slug)->firstOrfail();

        return view('organisation.organisation', compact('organisation'));
    }
}
