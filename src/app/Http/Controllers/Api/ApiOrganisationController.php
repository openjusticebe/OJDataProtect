<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Organisation;
use App\Http\Resources\ProcessResource;
use App\Http\Resources\OrganisationResource;

class ApiOrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($org_slug)
    {
        $organisation = Organisation::whereSlug($org_slug)->firstOrfail();
        $organisation->load(['members', 'processes', 'units', 'dpos']);
       
        return new OrganisationResource($organisation);
    }
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $organisation = new Organisation;
    //     $organistaion->name = $request->input('name');
    //     $organistaion->organisation_id = $request->input('organisation_id');
    //     $organistaion->description = $request->input('description');

    //     if ($organistaion->save()) {
    //         return new OrganisationResource($process);
    //     }
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request)
    // {
    //     $organisation = Process::findOrFail($request->process_id);
    //     $organistaion->name = $request->input('name');
    //     $organistaion->description = $request->input('description');

    //     if ($organistaion->save()) {
    //         return new OrganisationResource($process);
    //     }
    // }
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     // Get process
    //     $organisation = Process::findOrFail($id);
    //     // Return single process as a resource
    //     return new OrganisationResource($process);
    // }
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     // Get process
    //     $organisation = Process::findOrFail($id);
    //     if ($organistaion->delete()) {
    //         return new OrganisationResource($process);
    //     }
    // }
}
