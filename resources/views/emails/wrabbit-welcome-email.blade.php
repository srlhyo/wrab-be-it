{{-- @component('mail::message')
# Welcome to {{ $companyName }}!

Dear {{ $name }},

We're thrilled to have you join our platform. Our team has designed the platform to be intuitive and user-friendly. However, if you have any questions or encounter any issues, please don't hesitate to reach out to our support team at support@ourplatform.com.

Thank you for choosing to join our community!

Best regards,<br>
The {{ $companyName }} Team
@endcomponent --}}

@component('mail::message')
# Welcome to My Website

Thank you for registering! Click the button below to complete your registration:

@component('mail::button', ['url' => route('register')])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent