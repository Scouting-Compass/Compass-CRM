@component('mail::message')
# Some guest filled in the contact form from {{ config('app.name') }}

{{ $data['message'] }}

@endcomponent
