<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Organisation;
use App\Helpers\BasicFunctions;
use Illuminate\Support\Str;

class ApiOrganisationProcessGraphController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Organisation $organisation, Process $process)
    {
        $process = $process->load(['tags']);
        
        $nodes = collect();

        $edges = collect();

        $default_process = collect();


        foreach ([
        'purpose',
        'data_object',
        'data_subject',
        'data_recipient',
        'data_controller',
        'data_operator',
        'data_processor'
        ] as $category) {
            $default_process->push(
                [
      'id' => $category,
    'label' => Str::title(str_replace('_', ' ', $category)),
    'shape' => 'box',
    'color' => "#ccc",
    'font' => [
      'color' => 'black',
      'border-color' => BasicFunctions::getColor($category),
      'size' => 20,
    ]
    ]
            );
        }
       

        // Create parents nodes
        $tags = $process->tags()->get()->map(function ($tag) {
            return [
            'id' => $tag->id,
            'label' => $tag->name,
            'shape' => 'box',
            'color' => $tag->color,
            'category' => $tag->category,
            'font' => [
              'color' => 'white',
              'border-color' => $tag->color,
              'size' => 20,
            ],
          ];
        });

        // Create tags edges
        foreach ($tags as $tag) {
            $edges = $edges->concat(
                [
              [
                'from' => $tag['id'],
                'to' => $tag['category'],
                'arrows' => 'from',
                'dashes' => false,
              ],
          ]
            );
        }

        // // Create children nodes
        // $children = $tag->children()->get()->map(function ($child) {
        //     return [
        // 'id' => $child->id,
        // 'label' => $child->name,
        // 'shape' => 'box',
        // 'color' => $child->color,
        // 'font' => [
        //   'color' => 'white',
        //   'border-color' => $child->color,
        //   'size' => 12,
        //   ],
        // ];
        // });

        // // Create children edges
        // foreach ($children as $child) {
        //     $edges = $edges->concat(
        //         [
        //       [
        //         'from' => $tag->id,
        //         'to' => $child['id'],
        //         'arrows' => 'to',
        //         'dashes' => true,
        //       ],
        //   ]
        //     );
        // }

        // Merging every the 3 kind of nodes
        $nodes = $nodes->concat($default_process)->concat($tags);
        

        return response()->json([
      'data' => [
        'nodes' => $nodes,
        'edges' => $edges,
        'options' => [
          'layout' => [
            'hierarchical' => [
              'direction' => "UD",
              'sortMethod' => "directed",
            ],
          ],

        ],
      ],
    ]);
    }
}
