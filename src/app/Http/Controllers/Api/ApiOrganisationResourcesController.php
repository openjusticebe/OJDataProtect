<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagSelectResource;
use App\Models\Organisation;
use App\Models\Tag;
use Illuminate\Http\Request;

class ApiOrganisationResourcesController extends Controller
{
    public function show(Organisation $organisation, Request $request)
    {
        $tags = ($request->has('categories') ? $organisation->tags->whereIn('category', explode(",", $request->get('categories'))) : $organisation->tags);
      
        return TagSelectResource::collection($tags);
    }
}
