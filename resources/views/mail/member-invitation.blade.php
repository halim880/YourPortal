@component('mail::message')
# Hey !,
You are invited to join <b>{{$member_name}}</b>

@component('mail::button', ['url' => $url])
Join Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
