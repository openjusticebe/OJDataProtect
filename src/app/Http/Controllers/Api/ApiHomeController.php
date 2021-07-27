<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganisationResource;
use Auth;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiHomeController extends Controller
{
    public function dashboard()
    {
        $organisations = Auth::user()->organisations()->orderBy('updated_at', 'desc')->get();
        $organisations->load(['members', 'processes', 'units', 'dpos']);
        return OrganisationResource::collection($organisations);
    }
}
