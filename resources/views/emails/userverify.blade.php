@component('mail::message')
    Dear {{ $notifiable->name }},
# Welcome to {{ config('app.name') }}!

Thank you for registering, we are delighted to have you join us.

Please use below code to activate your account.

# {{ $notifiable->otp }}

Have a great journey with Kinderway!

If you did not create an account, no further action is required.
<br/><br/>

Regards,<br/>
{{ config('app.name') }} Team

@endcomponent
