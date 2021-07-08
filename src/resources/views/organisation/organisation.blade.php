<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organisation') }} {{ $organisation->name }}
    </x-slot>

    <div class="py-12">

        <div class="flex flex-wrap  justify-center">

            <div class="md:w-full pr-4 pl-4">
                <div
                    class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div
                        class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                        <i class="fa fa-building"></i><a
                            href="{{ route('organisation.show', $organisation->slug)}}">
                            {{ $organisation->name }}</a> -
                        Processes
                        <small>{{ $organisation->processes()->count() }}</small>
                    </div>

                    <section
                        class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
                        <header
                            class="flex items-center justify-between">
                            <h2
                                class="text-lg leading-6 font-medium text-black">
                                Projects</h2>
                            <button
                                class="hover:bg-light-blue-200 hover:text-light-blue-800 group flex items-center rounded-md bg-light-blue-100 text-light-blue-600 text-sm font-medium px-4 py-2">
                                <svg class="group-hover:text-light-blue-600 text-light-blue-500 mr-2"
                                    width="12" height="20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z" />
                                </svg>
                                New
                            </button>
                        </header>
                        <form class="relative">
                            <svg width="20" height="20"
                                fill="currentColor"
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <path fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                            </svg>
                            <input
                                class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10"
                                type="text"
                                aria-label="Filter projects"
                                placeholder="Filter projects" />
                        </form>
                        <ul
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
                            <li x-for="item in items">
                                <a :href="item.url"
                                    class="hover:bg-light-blue-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-gray-200">
                                    <dl
                                        class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                                        <div>
                                            <dt class="sr-only">
                                                Title</dt>
                                            <dd
                                                class="group-hover:text-white leading-6 font-medium text-black">
                                                {item.title}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="sr-only">
                                                Category</dt>
                                            <dd
                                                class="group-hover:text-light-blue-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                                                {item.category}
                                            </dd>
                                        </div>
                                        <div
                                            class="col-start-2 row-start-1 row-end-3">
                                            <dt class="sr-only">
                                                Users</dt>
                                            <dd
                                                class="flex justify-end sm:justify-start lg:justify-end xl:justify-start -space-x-2">
                                                <img x-for="user in item.users"
                                                    :src="user.avatar"
                                                    :alt="user.name"
                                                    width="48"
                                                    height="48"
                                                    class="w-7 h-7 rounded-full bg-gray-100 border-2 border-white" />
                                            </dd>
                                        </div>
                                    </dl>
                                </a>
                            </li>
                            <li
                                class="hover:shadow-lg flex rounded-lg">
                                <a href="/new"
                                    class="hover:border-transparent hover:shadow-xs w-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-200 text-sm font-medium py-4">
                                    New Project
                                </a>
                            </li>
                        </ul>
                    </section>

                    <div class="flex-auto p-6">

                        <div
                            class="block w-full overflow-auto scrolling-touch">
                            <table
                                class="w-full max-w-full mb-4 bg-transparent p-1">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Actors
                                        </th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Purposes
                                        </th>
                                        <th scope="col">Recipients
                                        </th>
                                        <th scope="col">Legal
                                            grounds</th>
                                        <th scope="col">Misc</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach
                                    ($organisation->processes as
                                    $process)
                                    <tr>
                                        <th scope="row"><a
                                                href="{{ route('organisation.process.show', [$organisation->slug, $process->id]) }}">{{ $process->name }}</a>
                                        </th>
                                        <td>
                                            <strong>Data
                                                subject</strong>
                                            <ul class="list-unstyled">
                                                @foreach
                                                ($process->tags()->ofCategory('data_subject')->get()
                                                as $tag)
                                                {{ $tag }}
                                                {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                                                @endforeach
                                            </ul>
                                            <strong>Data
                                                processor</strong>
                                            <ul class="list-unstyled">
                                                @foreach
                                                ($process->tags()->ofCategory('data_processor')->get()
                                                as $tag)
                                                {{ $tag }}
                                                {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                                                @endforeach
                                            </ul>

                                            <strong>Data
                                                operator</strong>
                                            <ul class="list-unstyled">
                                                @foreach
                                                ($process->tags()->ofCategory('data_operator')->get()
                                                as $tag)
                                                {{ $tag }}
                                                {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <strong>Data
                                                object</strong>

                                            <ul class="list-unstyled">
                                                @foreach
                                                ($process->tags()->ofCategory('data_object')->get()
                                                as $tag)
                                                {{ $tag }}
                                                {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <strong>Data
                                                recipient</strong>
                                            <ul class="list-unstyled">
                                                @foreach
                                                ($process->tags()->ofCategory('data_recipient')->get()
                                                as $tag)
                                                {{ $tag }}
                                                {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                                                @endforeach
                                            </ul>
                                            <strong>Purpose</strong>

                                            <ul class="list-unstyled">
                                                @foreach
                                                ($process->tags()->ofCategory('purpose')->get()
                                                as $tag)
                                                {{ $tag }}
                                                {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td>



                                            <ul
                                                class="list-unstyled text-xs">
                                                {{-- <li>{!! Html::alias_fa('check') !!}  Consent</li>
                            <li>{!! Html::alias_fa('box') !!} Contract</li>
                            <li>{!! Html::alias_fa('check') !!} Legal obligation</li>
                            <li>{!! Html::alias_fa('check') !!} Vital interest</li>
                            <li>{!! Html::alias_fa('check') !!} Public task</li>
                            <li>{!! Html::alias_fa('check') !!} Legitimate interest</li> --}}
                                            </ul>

                                            Art. 6 of GDPR
                                        </td>
                                        <td
                                            class="text-xs text-gray-700">
                                            <table
                                                class="w-full max-w-full mb-4 bg-transparent table-condensed table-borderless">
                                                <tr>
                                                    <td>Active
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Updated
                                                    </td>
                                                    <td>{{ $process->updated_at->diffForHumans() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Created
                                                    </td>
                                                    <td>{{ $process->created_at->diffForHumans() }}
                                                    </td>
                                                </tr>
                                            </table>


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>




                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
