@component('mail::message')
# Helle, {{$name}}

We are very delighted that you are joining with us. We are proccessing your free membership. stay with us.

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
YourPortal
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
