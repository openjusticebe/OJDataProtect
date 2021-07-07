<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  <example-component></example-component>

                    @foreach (Auth::user()->organisations as $organisation)

                    <div class="py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-md space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
                      <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:flex-shrink-0" src="/img/erin-lindford.jpg" alt="Woman's Face">
                      <div class="text-center space-y-2 sm:text-left">
                        <div class="space-y-0.5">
                          <p class="text-lg text-black font-semibold">
                            Erin Lindford
                          </p>
                          <p class="text-gray-500 font-medium">
                            Product Engineer
                          </p>
                        </div>
                        <button class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Message</button>
                      </div>
                    </div>

                    <div class="md:w-1/1 pr-4 pl-4">
                      <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">

                  
                        <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900"><i class="fa fa-building text-blue-600"></i>    
                          
                          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                          <a href="{{ route('organisation.show', $organisation->slug)}}"> {{ $organisation->name }}</a>
                      </h2></div>
            
                        <div class="flex-auto p-6">
                          <div class="float-right">
                            <img src="{{ $organisation->logo_url }}" class="rounded max-w-full h-auto border-1 border-gray-200 rounded p-1 rounded-full" alt="">
                          </div>
            
                          <br />
                          <dl class="">
                            <dt>vat_number</dt>
                            <dd>{{ $organisation->vat_number }}</dd>
            
                            <dt>address</dt>
                            <dd>{{ $organisation->address }}, CP {{ $organisation->postcode }} <br />{{ $organisation->city }} {{ $organisation->country }}</dd>
                          </dl>
            
            
                          <h4>Data Protection Officer</h4>
            
                          <p>
            
            
                            <ul>
                              @foreach ($organisation->dpo as $member)
                                <li>
                                  <a href="#">{{ $member->fullName }} {{ $member->pivot->member_type }}
                                    <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-blue-500 text-white hover:bg-blue-600">{{ $organisation->dpo()->first()->pivot->is_external ? 'external' : 'internal' }}</span>
                                  </a>
                                </li>
                              @endforeach
                            </ul>
            
                          </p>
            
            
                          <h3>Members <small>{{ $organisation->members()->count() }}</small></h3>
                          <ul>
                            @foreach ($organisation->members as $member)
                              <li><a href="#">{{ $member->fullName }} {{ $member->pivot->member_type }}   <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-blue-500 text-white hover:bg-blue-600">{{ $organisation->dpo()->first()->pivot->is_external ? 'external' : 'internal' }}</span>  </a></li>
                            @endforeach
                          </ul>
            
                          <h3>Processes <small>{{ $organisation->processes()->count() }}</small></h3>
            
            
                          <button href="{{ route('organisation.show', $organisation->slug)}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700">Manage</button>
            
                          <a href="{{ route('organisation.show', $organisation->slug)}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Process</a>
                        </div>
                      </div>
                    </div>
            
                  @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
