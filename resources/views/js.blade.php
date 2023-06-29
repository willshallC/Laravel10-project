@php
    $var = "hi";
@endphp

<script>
    var s = @json($var);
    var t = {{ Js::from($var)}}
    console.log(typeof s);
    console.log(t);
</script>