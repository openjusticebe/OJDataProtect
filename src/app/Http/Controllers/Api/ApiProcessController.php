<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Organisation;
use App\Http\Resources\ProcessResource;

class ApiProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Organisation $organisation)
    {
        $processes = Process::orderBy('created_at', 'desc')->whereOrganisation_id($organisation->id)->firstOrfail()->id)->paginate(5);

        return ProcessResource::collection($processes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $process = Process::findOrFail($request->process_id);
        $process->name = $request->input('name');
        $process->description = $request->input('description');

        if ($process->save()) {
            return new ProcessResource($process);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
     
        return new ProcessResource($process);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
  
        if ($process->delete()) {
            return new ProcessResource($process);
        }
    }
}
