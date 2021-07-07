@extends('layouts.app')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap  justify-center">

            <div class="md:w-full pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">

                    <h5 class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                        {!! Html::alias_fa($tag->type) !!} {{ $tag->name }} <small>{{ $tag->category }}</small>
                    </h5>
                    <div class="flex-auto p-6">

                        Type: {{ $tag->type }}<br />
                        Category: {{ $tag->category }}<br />
                        <h5>Description</h5> 
                        {{ $tag->description }}

                        <button type="button" name="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline py-1 px-2 leading-tight text-xs  bg-blue-600 text-white hover:bg-blue-600">Edit</button>


                    </div>
                </div>
            </div>
            @foreach ($tag->processes as $process)

                <div class="md:w-full pr-4 pl-4">
                    <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                        <h5 class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                            {{ $process->name }} <small>process</small>
                        </h5>

                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap ">

                            <div class="md:w-3/4 pr-4 pl-4">
                                {{ $process->description }}

                            </div>
                            <div class="md:w-1/4 pr-4 pl-4">
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
