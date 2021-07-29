<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Process;

class ApiOrganisationProcessGraphController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function data(Organisation $organisation, Process $process)
    {
        $tag = $process->load(['tags']);

        $nodes = collect();

        $edges = collect();

        // Create parents nodes
        $parents = $tag->get()->map(function ($parent) {
            return [
            'id' => $parent->id,
            'label' => $parent->name,
            'shape' => 'box',
            'color' => $parent->color,
            'font' => [
              'color' => 'white',
              'border-color' => $parent->color,
              'size' => 20,
            ],
          ];
        });

        // Create parents edges
        foreach ($parents as $parent) {
            $edges = $edges->concat(
                [
              [
                'from' => $parent['id'],
                'to' => $tag->id,
                'arrows' => 'to',
                'dashes' => false,
              ],
          ]
            );
        }

        // Create children nodes
        $children = $tag->children()->get()->map(function ($child) {
            return [
        'id' => $child->id,
        'label' => $child->name,
        'shape' => 'box',
        'color' => $child->color,
        'font' => [
          'color' => 'white',
          'border-color' => $child->color,
          'size' => 12,
          ],
        ];
        });

        // Create children edges
        foreach ($children as $child) {
            $edges = $edges->concat(
                [
              [
                'from' => $tag->id,
                'to' => $child['id'],
                'arrows' => 'to',
                'dashes' => true,
              ],
          ]
            );
        }

        // Merging every the 3 kind of nodes
        $nodes = $nodes->concat($parents)->concat($children)->concat(
            [
          [
          'id' => $tag->id,
          'label' => $tag->name,
          'shape' => 'box',
          'color' => $tag->color,
          'font' => [
            'color' => 'white',
            'border-color' => 'red',
            'size' => 20,
            ],
          ],
        ]
        );

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
