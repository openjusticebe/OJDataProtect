<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Process;

class OrganisationProcessController extends Controller
{
    public function __construct()
    {
    }

    public function show(Organisation $organisation, Process $process)
    {
        return view('organisation.process.process', compact('organisation', 'process'));
    }

    public function store(Organisation $organisation, Process $process, StoreProcessRequest $request)
    {
        $process->fill($request)->save();

        return view('organisation.process.process', compact('organisation', 'process'));
    }


    public function destroy(Organisation $organisation, Process $process)
    {
        $process->delete();

        return view('organisation.process.process', compact('organisation', 'process'));
    }
}
