<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Organisation;
use App\Http\Resources\ProcessResource;
use App\Http\Resources\OrganisationResource;
use Auth;

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

    public function store(Request $request)
    {
        $organisation = new Organisation();
        $organisation->name = $request->name;
        $organisation->description = $request->description;
        $organisation->save();

        $organisation->members()->syncWithoutDetaching(
            [
        Auth::user()->id => [
          'member_type' => 'member',
          'is_external' => 0,
          'is_admin' => 1
            ]
        ]
        );


        return new OrganisationResource($organisation);
    }


    public function destroy(Organisation $organisation)
    {
        if (Gate::allows('delete-organisation', $organisation)) {
            $organisation->delete();

            return response(null, Response::HTTP_OK);
        }
    }
}
