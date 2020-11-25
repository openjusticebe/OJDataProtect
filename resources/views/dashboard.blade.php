@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">

      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif

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

                {!! Form::submitBtns() !!}

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
@endsection
