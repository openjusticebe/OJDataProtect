<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagSelectResource;
use App\Models\Organisation;
use App\Models\Tag;

class ApiCOrganisationResourcesController extends Controller
{
    public function tags(Organisation $organisation)
    {
        return TagSelectResource::collection($organisation->tags);
    }
}
