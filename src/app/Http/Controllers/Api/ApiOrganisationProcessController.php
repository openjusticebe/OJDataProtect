<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Organisation;
use App\Http\Resources\ProcessResource;
use App\Http\Resources\OrganisationResource;

class ApiOrganisationProcessController extends Controller
{
    public function show(Organisation $organisation, Process $process)
    {
        $process->load('tags');

        return new ProcessResource($process);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Organisation $organisation, Process $process, Request $request)
    {
        $process->name = $request->input('name');
        $process->description = $request->input('description');

        if ($process->save()) {
            return new ProcessResource($process);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Organisation $organisation, Process $process)
    {
    }

    public function store(Request $request)
    {
        $process = new Process;
        $process->name = $request->input('name');
        $process->organisation_id = $request->input('organisation_id');
        $process->description = $request->input('description');

        if ($process->save()) {
            return new ProcessResource($process);
        }
    }
}
