@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">

                    <h5 class="card-header">
                        {!! Html::alias_fa($tag->type) !!} {{ $tag->name }} <small>{{ $tag->category }}</small>
                    </h5>
                    <div class="card-body">

                        Type: {{ $tag->type }}<br />
                        Category: {{ $tag->category }}<br />
                        <h5>Description</h5> 
                        {{ $tag->description }}

                        <button type="button" name="button" class="btn btn-sm btn-primary">Edit</button>


                    </div>
                </div>
            </div>
            @foreach ($tag->processes as $process)

                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">
                            {{ $process->name }} <small>process</small>
                        </h5>

                        <div class="card-body">
                            <div class="row">

                            <div class="col-md-9">
                                {{ $process->description }}

                            </div>
                            <div class="col-md-3">
                                Specific description : {{ $process->pivot->specific_description }}

                            </div>
                        </div>


                        </div>

                    </div>
                </div>


                @endforeach


            </div>
        </div>
    @endsection
