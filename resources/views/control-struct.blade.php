@php
    $a = true;

    $day = 1;
@endphp

@if ($a==true)
    {{"Hello"}}
    {{"How are you"}}
@else
    {{"Hola"}}
    {{"Amigo"}}
@endif

{{-- Switch Statment --}}
<br>
@switch($day)
    @case(1)
        {{"Sunday"}}<br>
        @break
    @case(2)
        {{"Monday"}}<br>
        @break   
    @case(3)
        {{"Tuesday"}}<br>
    @break

    @default
        {{"Other week Day"}}
        
@endswitch

{{-- isset --}}
<br>
@isset($a)
    {{"A is set"}}
@endisset

{{-- empty --}}
<br>
@empty($a)
    {{"A is empty"}}
@endempty