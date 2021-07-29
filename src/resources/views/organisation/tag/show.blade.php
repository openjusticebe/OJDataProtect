<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a
                href="{{ route('organisation.show', [$organisation]) }}">{{ $organisation->name }}</a>
            <small>{{ __('Organisation') }}</small>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div
                    class="py-3 px-6 mb-0 bg-blue-600 border-b-1 border-blue-300 text-white text-xl">
                    <h1>
                        {{ $tag->name }}
                    </h1>
                </div>

                <div class="py-3 px-6 mb-0">

                    <tag
                        page_url="{{ route('api.organisation.tag.show', [$organisation, $tag->id]) }}">
                    </tag>



                </div>


            </div>
        </div>
    </div>



</x-app-layout>
