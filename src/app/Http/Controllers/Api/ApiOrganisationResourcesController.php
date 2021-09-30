<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagSelectResource;
use App\Models\Organisation;
use App\Models\Process;
use App\Models\Tag;
use Illuminate\Http\Request;

class ApiOrganisationResourcesController extends Controller
{
    public function show(Organisation $organisation, Request $request)
    {
        $tags_already_used = Process::find($request->get('process'))->tags->whereIn('category', explode(",", $request->get('categories')))->pluck('id')->toArray();

        $tags = ($request->has('categories') ? $organisation->tags->whereIn('category', explode(",", $request->get('categories')))->whereNotIn('id', $tags_already_used) : $organisation->tags);

        return TagSelectResource::collection($tags);
    }
}
