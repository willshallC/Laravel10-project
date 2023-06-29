
@php
    $fruits = ['apple', 'mango', 'bananas', 'grapes'];
@endphp

@include('pages.header',['fruit'=>$fruits])

<h1>Ohio</h1>

@include('pages.footer')