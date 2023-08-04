@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/blogs.css"/>
@endpush

@section('content')
    <div class="blog-container">
        @foreach ($blogs as $blog)
            <div class="blog-card">
                <div class="blog-img"><img src="{{$blog->image}}" alt="blog-thumbnail"/></div>
                <div class="blog-title"><h3>{{$blog->title}}</h3></div>
                <div class="blog-excerpt">{{$blog->excerpt}}</div>
                <div class="blog-read-more"><a href="/blog/{{$blog->slug}}">Continue Reading..</a></div>
            </div>
        @endforeach
    </div>
@endsection