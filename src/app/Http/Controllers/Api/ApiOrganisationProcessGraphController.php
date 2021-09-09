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

        $edges->push([
          'from' => 'data_object',
          'to' => 'data_subject',
          'arrows' => 'to',
          'dashes' => true,
          'shadow' => true,
          'smooth' => true,
        ], [
          'from' => 'data_subject',
          'to' => 'data_operator',
          'arrows' => 'to',
          'dashes' => true,
        ], [
          'from' => 'data_operator',
          'to' => 'data_controller',
          'arrows' => 'to',
          'dashes' => true,
        ], [
          'from' => 'data_processor',
          'to' => 'data_controller',
          'arrows' => 'to',
          'dashes' => true,
        ], [
          'from' => 'data_controller',
          'to' => 'data_recipient',
          'arrows' => 'to',
          'dashes' => true,
        ], [
          'from' => 'data_recipient',
          'to' => 'purpose',
          'arrows' => 'to',
          'dashes' => true,
        ]);

      

        // Merging every the nodes
        $nodes = $nodes->concat($default_process)->concat($tags);
        

        return response()->json([
      'data' => [
        'nodes' => $nodes,
        'edges' => $edges,
        'options' => [
          'interaction' => [
            'hover' => true,
            'zoomView' => false,
          ],
          'layout' => [
            'hierarchical' => [
              'direction' => "LR",
              'sortMethod' => "directed",
            ],
          ],

        ],
      ],
    ]);
    }
}
