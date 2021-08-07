<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Process;

class OrganisationProcessController extends Controller
{
    public function show(Organisation $organisation, Process $process)
    {
        return view('organisation.process.process', compact('organisation', 'process'));
    }
}
