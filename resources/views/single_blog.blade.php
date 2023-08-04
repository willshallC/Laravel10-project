@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/single-blog.css" />
@endpush

@section('content')
    <div class="blog-container">
        <div class="blog-title"><h1>{{$blog->title}}</h1> by {{$blog->first_name}} {{$blog->last_name}}</div>
        <div class="blog-img"><img src="{{$blog->image}}"/></div>
        <div class="blog-description">{!!$blog->description!!}</div>
    </div>
@endsection