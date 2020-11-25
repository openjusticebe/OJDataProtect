@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-9">
        <div class="card">

          <div class="card-header">
            <h5>
              {{ $process->name }}
            </h5>
          </div>

          <div class="card-body">

            <ul class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-item nav-link active" id="nav-show-tab" data-toggle="tab" href="#nav-show" role="tab" aria-controls="nav-show" aria-selected="true">Show</a>
              </li>
              <li class="nav-item">

                <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">Edit</a>
              </li>
            </ul>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-show" role="tabpanel" aria-labelledby="nav-show-tab">
                <p>
                  {{ $process->description }}
                </p>

              </div>
              <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
                <form>

                  {!! Form::textField('name', 'Name', $process->name) !!}

                  {!! Form::textareaField('description', 'Description', $process->description, ['rows' => 10, 'cols' => 150]) !!}

                  {!! Form::submitBtns() !!}

                </form>


              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Contact

              </div>
            </div>
          </div>


          <div class="card-body">


            <h3>Tags</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Specific description</th>
                </tr>
              </thead>
              @foreach ($process->tags as $tag)
                <tr>
                  <td>
                    {{ $tag->name }} <br />
                    {{-- {!! Html::tag_badge($organisation, $tag) !!} --}}
                  </td>
                  <td>{{ $tag->type }}</td>
                  <td>{{ $tag->category }}</td>
                  <td>{{ $tag->description }}</td>
                  <td>{{ $tag->pivot->specific_description }}</td>
                </tr>
              @endforeach
            </table>

            {{--
            <h2>Definition</h2>
            <ul>
            <li> <strong>Data Subject</strong> A European Union resident whose personal data is being processed.</li>
            <li><strong>Data Controller</strong> The Data Controller receives Data Subject requests from the Data Subjects and validates them. The Controller submits requests to the Data Processors.</li>
            <li><strong>Data Processor</strong> The Data processor fulfills the request for the Controllers scope.</li>
          </ul>

          <h2>Typical request</h2>
          <ul>
          <li>New Data Subject Request: The data subject files a request to the data controller containing appropriate information. Request may be of any type provisioned in the GDPR text, commonly: access, portability, erasure, rectification.</li>
          <li>Request Distribution: The controller verifies the request and if it will be honored, it is submitted to Processors.</li>
          <li>Request Fulfillment: The Processor fulfills their obligation within the scope of this request. For example, this may include deleting user data in the case of a deletion request.</li>
          <li>Request Status via Callback: The processor will submit status updates to the controller if callbacks are included in the request.</li>
          <li>Communication to the Data Subject: The Controller communicates the results to the data subject.</li>
        </ul>
        --}}


        <h3>Graph</h3>

        <network
        style="
        width: 700px;
        height: 500px;
        "
        ref="network"
        :nodes="nodes"
        :edges="edges"
        :options="options">
      </network>

      :nodes="getNodes('{{ route('api.vis.network', [$organisation->slug, $process->id]) }}')"
      :edges="getEdges('{{ route('api.vis.network', [$organisation->slug, $process->id]) }}')"

{{ route('api.vis.network', [$organisation->slug, $process->id]) }}

    </div>
  </div>
</div>

<div class="col-md-3">

  <div class="card">
    <div class="card-header">
      Adding tag
    </div>
    <div class="card-body">

      <input type="text" name="" value="">
      <input type="text" name="" value="">
<button type="button" name="button" class="btn btn-success">add</button>
    </div>

  </div>


</div>

</div>
</div>
@endsection
