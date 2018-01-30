@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'www.filmuparduotuve.lt'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque beatae eaque pariatur, sint quia, placeat qui aut tempora hic ipsum voluptatem ducimus ab cum? Veniam error obcaecati quae deserunt perspiciatis.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
