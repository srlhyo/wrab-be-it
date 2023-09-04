{{-- @component('mail::message')
# Welcome to {{ $companyName }}!

Dear {{ $name }},

We're thrilled to have you join our platform. Our team has designed the platform to be intuitive and user-friendly. However, if you have any questions or encounter any issues, please don't hesitate to reach out to our support team at support@ourplatform.com.

Thank you for choosing to join our community!

Best regards,<br>
The {{ $companyName }} Team
@endcomponent --}}

@component('mail::message')
# Welcome to Wrabbit

Hey, hey! 

Click the link below to login to Wrabbit app:
@component('mail::subcopy')
    <a href="{{ $magicLink }}" style="color: #000000;">
        Click Magic Link to Login
    </a>

    @dd($magicLink)
@endcomponent
<br>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent