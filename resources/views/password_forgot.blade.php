@component('mail::message')
    Hey, {{$user ->name}}. Forgot Your Password?
    <p>
        Click the link to reset your Passsword
    </p>
    @component('mail::button', ['url'=> url('reset/' .$user ->remember_token )])
    Reset Your Password
    @endcomponent
    <p>In Case of any Issue, Please contact Us</p>
{{config('app.name')}}
@endcomponent
