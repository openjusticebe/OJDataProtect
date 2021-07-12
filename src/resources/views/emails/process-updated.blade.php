@component('mail::message')
# Process from <em>{{ $event->organisation->name }}</em> updated

<strong>{{ $event->user->name }}</strong> has been added to the
organisation {{ $event->organisation->name }}

@component('mail::button', ['url' => route('organisation.show',
[$event->organisation])])
View organisation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
