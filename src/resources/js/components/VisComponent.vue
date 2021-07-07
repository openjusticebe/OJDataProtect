<template>

  <!-- <div id="vis-network" class="vis-network"></div> -->

  <!-- <timeline ref="timeline"
  :items="items"
  :groups="groups"
  :options="options"
  :events="['drop', 'changed']"
  @drop="myDropCallback"
  @changed="myChangedCallback">
  </timeline> -->

</template>

<script>
  //
  // data() {
  //     groups: [{
  //     	id: 0,
  //       content: 'Group 1'
  //     }],
  //     items: [{
  //     	id: 0,
  //       group: 0,
  //       start: new Date(),
  //       content: 'Item 1'
  //     }],
  //     options: {
  //       editable: true,
  //     }
  // };


// var color = 'gray';
// var len = undefined;
//
// // create an array with nodes
// var nodes = new vis.DataSet([
//   {id: 1, label: 'Node 1'},
//   {id: 2, label: 'Node 2'},
//   {id: 3, label: 'Node 3'},
//   {id: 4, label: 'Node 4'},
//   {id: 5, label: 'Node 5'}
//   // Subject --> Data -> Collection by Data Controller / Processor --> to pursue the purposes --> Validated by the legal grounds
//   // @foreach ($process->tags()->ofCategory('data_subject')->get() as $key => $tag)
//   // {id: '{{ $tag->id }}', label: '{{ $tag->name }}', group: 5},
//   // @endforeach
//   // {id: 1, label: 'data_subject', group: 0},
//   // @foreach ($process->tags()->ofCategory('data_object')->get() as $key => $tag)
//   // {id: '{{ $tag->id }}', label: '{{ $tag->name }}', group: 1},
//   // @endforeach
//   // {id: 2, label: 'data_object', group: 0},
//   // {id: 3, label: 'Data processor {{ $organisation->name }}', group: 2, color: '#ccc'},
//   // @foreach ($process->tags()->ofCategory('purpose')->get() as $key => $tag)
//   // {id: '{{ $tag->id }}', label: '{{ $tag->name }}', group: 3},
//   // @endforeach
//   // @foreach ($process->tags()->ofCategory('data_controller')->get() as $key => $tag)
//   // {id: '{{ $tag->id }}', label: '{{ $tag->name }}', group: 4},
//   // @endforeach
//
// ]);
//
// // create an array with edges
// var edges = new vis.DataSet([
//   {from: 1, to: 3},
//   {from: 1, to: 2},
//   {from: 2, to: 4},
//   {from: 2, to: 5},
//   {from: 3, to: 3}
//   // @foreach ($process->tags()->ofCategory('data_subject')->get() as $key => $tag)
//   // {from: {{ $tag->id }}, to: 1},
//   // @endforeach
//   // {from: 1, to: 2},
//   // @foreach ($process->tags()->ofCategory('data_object')->get() as $key => $tag)
//   // {from: {{ $tag->id }}, to: 2},
//   // @endforeach
//   // {from: 2, to: 3},
//   // @foreach ($process->tags()->ofCategory('purpose')->get() as $key => $tag)
//   // {from: 3, to: {{ $tag->id }}},
//   // @endforeach
//   // @foreach ($process->tags()->ofCategory('data_controller')->get() as $key => $tag)
//   // {from: 3, to: {{ $tag->id }}},
//   // @endforeach
//
// ]);
//
// // create a network
// var container = document.getElementById('vis-network');
//
// var data = {
//   nodes: nodes,
//   edges: edges
// };
// var options = {
//   // nodes: {
//   //   shape: 'box',
//   //   size: 40,
//   //   font: {
//   //     size: 16,
//   //     color: '#344c77'
//   //   },
//   //   borderWidth: 2
//   // },
//   // edges: {
//   //   width: 2
//   // }
// };
// var network = new vis.Network(container, data, options);
</script>
