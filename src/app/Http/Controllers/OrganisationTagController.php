<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Tag;

class OrganisationTagController extends Controller
{
    public function show(Organisation $organisation, Tag $tag)
    {
        return view('organisation.tag.show', compact('organisation', 'tag'));
    }
}
