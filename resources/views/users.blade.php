<h1>USERS</h1>

{{-- <p>{{$val}}</p>
<p>{{$sec}}</p> --}}

@foreach ($names as $index => $val )
    <h1>{{$val['name'] }} | {{$val['age']}} | {{$val['country']}} | <a href={{Route("single-user",$index)}}>Detail</a></h1>
@endforeach