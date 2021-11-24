@component('mail::message')
# Congrats, {{$name}}

Now you are a part of YourPortal family,
Here is your login credentials, <br>
<b>email: {{$email}}</b> <br>
<b>password: {{$password}}</b> <br>
Please change the password as soon as possible

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
 