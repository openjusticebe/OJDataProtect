<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Process;

class ApiVisProcessController extends Controller
{
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function data($org_slug, $process_id)
  {
    $process = Process::with('tags')->findOrFail($process_id);

    $nodes = [];
    $edges = [];

    $i = 0;

    $categories = [
      'data_object',
      'data_subject',
      'purpose',
      'data_controller',
      'data_processor'
    ];

    foreach ($categories as $key_cat => $category) {

      $group_id = $key_cat + 1000;

      $id_cat = $i;

      $nodes[] = [
        'id' => $i,
        'label' => $category,
        'group' => $group_id,
        'shape' => 'ellipse'
      ];

      $i++;

      foreach ($process->tags()->ofCategory($category)->get() as $key_tag => $tag) {

        $nodes[] = [
          'id' => $i,
          'label' => '<b>'. $tag->name . '</b>',
          'group' => $group_id,
          'shape' => 'text'
        ];

        // Fixing tag to its own category
        $edges[] = [
          'from' => $i,
          'to' => $id_cat,
        ];

        $i++;

      }
      // Fixing categories together
      $edges[] = [
        'from' => $id_cat,
        'to' => $i,
        'label' => 'data collection'

      ];


    }
    return response()->json([
      'nodes' => $nodes,
      'edges' => $edges
    ]);
  }

}
