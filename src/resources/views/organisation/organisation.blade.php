<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Organisation') }} {{ $organisation->name }} dd
  </x-slot>


  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-building"></i><a href="{{ route('organisation.show', $organisation->slug)}}"> {{ $organisation->name }}</a> - Processes <small>{{ $organisation->processes()->count() }}</small>
          </div>

            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Actors</th>
                      <th scope="col">Data</th>
                      <th scope="col">Purposes</th>
                      <th scope="col">Recipients</th>
                      <th scope="col">Legal grounds</th>
                      <th scope="col">Misc</th>
                    </tr>

                  </thead>
                  <tbody>

                    @foreach ($organisation->processes as $process)
                      <tr>
                        <th scope="row"><a href="{{ route('organisation.process.show', [$organisation->slug, $process->id]) }}">{{ $process->name }}</a></th>
                        <td>
                          <strong>Data subject</strong>
                          <ul class="list-unstyled">
                            @foreach ($process->tags()->ofCategory('data_subject')->get() as $tag)
                              {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                            @endforeach
                          </ul>
                          <strong>Data processor</strong>
                          <ul class="list-unstyled">
                            @foreach ($process->tags()->ofCategory('data_processor')->get() as $tag)
                              {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                            @endforeach
                          </ul>

                          <strong>Data operator</strong>
                          <ul class="list-unstyled">
                            @foreach ($process->tags()->ofCategory('data_operator')->get() as $tag)
                              {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                            @endforeach
                          </ul>
                        </td>
                        <td>
                          <strong>Data object</strong>

                          <ul class="list-unstyled">
                            @foreach ($process->tags()->ofCategory('data_object')->get() as $tag)
                              {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                            @endforeach
                          </ul>
                        </td>
                        <td>
                          <strong>Data recipient</strong>
                          <ul class="list-unstyled">
                            @foreach ($process->tags()->ofCategory('data_recipient')->get() as $tag)
                              {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                            @endforeach
                          </ul>
                          <strong>Purpose</strong>

                          <ul class="list-unstyled">
                            @foreach ($process->tags()->ofCategory('purpose')->get() as $tag)
                              {{-- <li>{!! Html::tag_badge($organisation, $tag) !!}</li> --}}
                            @endforeach
                          </ul>
                        </td>

                        <td>



                          <ul class="list-unstyled small">
                            {{-- <li>{!! Html::alias_fa('check') !!}  Consent</li>
                            <li>{!! Html::alias_fa('box') !!} Contract</li>
                            <li>{!! Html::alias_fa('check') !!} Legal obligation</li>
                            <li>{!! Html::alias_fa('check') !!} Vital interest</li>
                            <li>{!! Html::alias_fa('check') !!} Public task</li>
                            <li>{!! Html::alias_fa('check') !!} Legitimate interest</li> --}}
                          </ul>

                          Art. 6 of GDPR
                        </td>
                        <td class="small text-muted">
                          <table class="table table-condensed table-borderless">
                            <tr>
                              <td>Active</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>Updated</td>
                              <td>{{ $process->updated_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                              <td>Created</td>
                              <td>{{ $process->created_at->diffForHumans() }}</td>
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
