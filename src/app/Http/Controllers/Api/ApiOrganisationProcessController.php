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
        $process->fill($request->all())->save();

        $process->updated_by = auth()->id();

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
        $process->delete();
    }

    public function store(Organisation $organisation, Request $request)
    {
        $process = new Process;
        $process->organisation_id = $organisation->id;

        $process->fill($request->all())->save();

        $process->created_by = auth()->id();
        $process->updated_by = auth()->id();


        if ($process->save()) {
            return new ProcessResource($process);
        }
    }
}
