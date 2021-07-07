<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Tag;

class OrganisationTagController extends Controller
{
    public function __construct()
    {
    }

    public function show($org_slug, $tag_id)
    {
        $organisation = Organisation::whereSlug($org_slug)->first();
        $tag = Tag::find($tag_id);


        return view('organisation.tag.tag', compact('organisation', 'tag'));
    }
}
