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


    // public function store(Request $request)
    // {
    //     $organisation = new Organisation;
    //     $organistaion->name = $request->input('name');
    //     $organistaion->description = $request->input('description');

    //     if ($organistaion->save()) {
    //         return new OrganisationResource($process);
    //     }
    // }

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
