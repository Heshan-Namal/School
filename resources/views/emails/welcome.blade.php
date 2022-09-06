@component('mail::message')
# Welcome to Viduhala

<br>
your password is 'viduhalapwd'

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Click here to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent