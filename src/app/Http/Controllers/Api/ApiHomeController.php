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

        return OrganisationResource::collection($organisations);
    }

    // public function show(Organisation $organisation)
    // {
    //     $organisation->load(['processes', 'users'])->withCount('processes');

    //     return new OrganisationResource($organisation);
    // }

    // public function update(Organisation $organisation, Request $request)
    // {
    //     $organisation->fill($request->all());
    //     $organisation->slug = $organisation->getUniqueSlug($organisation->title);
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
}
