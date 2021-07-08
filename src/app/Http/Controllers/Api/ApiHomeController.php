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

    // public function show(Collection $collection)
    // {
    //     $collection->load(['labels', 'users'])->withCount('texts');

    //     return new CollectionResource($collection);
    // }

    // public function update(Collection $collection, Request $request)
    // {
    //     $collection->fill($request->all());
    //     $collection->slug = $collection->getUniqueSlug($collection->title);
    //     $collection->save();

    //     return response(null, Response::HTTP_OK);
    // }

    // public function destroy(Collection $collection)
    // {
    //     if (Gate::allows('delete-collection', $collection)) {
    //         $collection->delete();

    //         return response(null, Response::HTTP_OK);
    //     }
    // }
}
