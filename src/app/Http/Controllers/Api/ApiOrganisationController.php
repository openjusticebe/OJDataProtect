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
}
