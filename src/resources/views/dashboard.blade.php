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
                    You're logged in!

                    @foreach (Auth::user()->organisations as $organisation)
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header"><i class="fa fa-building text-primary"></i><a href="{{ route('organisation.show', $organisation->slug)}}"> {{ $organisation->name }}</a></div>
            
                        <div class="card-body">
                          <div class="float-right">
                            <img src="{{ $organisation->logo_url }}" class="rounded img-thumbnail rounded-circle" alt="">
                          </div>
            
                          <br />
                          <dl class="">
            
                            <dt>vat_number</dt>
                            <dd>{{ $organisation->vat_number }}</dd>
            
                            <dt>address</dt>
                            <dd>{{ $organisation->address }}, CP {{ $organisation->postcode }} <br/ >{{ $organisation->city }} -- {{ $organisation->country }}</dd>
                          </dl>
            
            
                          <h4>Data Protection Officer</h4>
            
                          <p>
            
            
                            <ul>
                              @foreach ($organisation->dpo as $member)
                                <li>
                                  <a href="#">{{ $member->fullName }} {{ $member->pivot->member_type }}
                                    <span class="badge badge-primary">{{ $organisation->dpo()->first()->pivot->is_external ? 'external' : 'internal' }}</span>
                                  </a>
                                </li>
                              @endforeach
                            </ul>
            
                          </p>
            
            
                          <h3>Members <small>{{ $organisation->members()->count() }}</small></h3>
                          <ul>
                            @foreach ($organisation->members as $member)
                              <li><a href="#">{{ $member->fullName }} {{ $member->pivot->member_type }}   <span class="badge badge-primary">{{ $organisation->dpo()->first()->pivot->is_external ? 'external' : 'internal' }}</span>  </a></li>
                            @endforeach
                          </ul>
            
                          <h3>Processes <small>{{ $organisation->processes()->count() }}</small></h3>
            
            
                          <button href="{{ route('organisation.show', $organisation->slug)}}" class="btn btn-secondary">Manage</button>
            
                          <a href="{{ route('organisation.show', $organisation->slug)}}" class="btn btn-primary">Process</a>
                        </div>
                      </div>
                    </div>
            
                  @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
