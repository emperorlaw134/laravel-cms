@component('mail::message')
# Introduction

The body of your message.
-one

-two

-three

Thanks So Much For Registering

@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Some inspirational quote to go here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
