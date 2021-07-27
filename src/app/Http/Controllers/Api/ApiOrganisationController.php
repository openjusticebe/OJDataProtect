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
    public function show(Organisation $organisation)
    {
        $organisation->load(['members', 'dpos', 'tags', 'processes.tags', 'units', ]);
       
        return new OrganisationResource($organisation);
    }

    // public function update(Organisation $organisation, Request $request)
    // {
    //     $organisation->fill($request->all());
    //     $organisation->slug = $organisation->getUniqueSlug($organisation->name);
    //     $organisation->save();

    //     return response(null, Response::HTTP_OK);
    // }

    // public function destroy(Organisation $organisation)
    // {
    //     if (Gate::allows('delete-organisation', $organisation)) {
    //         $organisation->delete();

    //         return response(null, Response::HTTP_OK);
    //     }
    // }

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
}
