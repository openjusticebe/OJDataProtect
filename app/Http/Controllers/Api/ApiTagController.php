<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;

class ApiTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get tags
        $tags = Tag::orderBy('created_at', 'desc')->paginate(5);
        // Return collection of tages as a resource
        return TagResource::collection($tags);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = $request->isMethod('put') ? Tag::findOrFail($request->tag_id) : new Tag;
        $tag->id = $request->input('tag_id');
        $tag->name = $request->input('name');
        $tag->description = $request->input('description');
        if($tag->save()) {
            return new TagResource($tag);
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get tag
        $tag = Tag::findOrFail($id);
        // Return single tag as a resource
        return new TagResource($tag);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get tag
        $tag = Tag::findOrFail($id);
        if($tag->delete()) {
            return new TagResource($tag);
        }
    }
}
