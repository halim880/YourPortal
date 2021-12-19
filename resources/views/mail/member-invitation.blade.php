@component('mail::message')
# Hey !,
You are invited to join <b>{{$bussiness_name}}</b>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/register-user?bussinessId='.$bussiness_id])
Join Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
