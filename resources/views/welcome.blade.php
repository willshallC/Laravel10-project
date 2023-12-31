@extends('layouts.masterlayout')

@section('content')

    <div class="categories-container">
        @foreach ($categories as $category )
            <div class="cmn-categories">
                <a href="/{{$category->cat_slug}}">
                    <img src="{{$category->cat_img}}" alt="cat-img"/>
                </a>
                <a href="/{{$category->cat_slug}}">{{$category->cat_name}}</a>
            </div>
        @endforeach
    </div>

    
@endsection

@push('style')
    <link href="css/welcome.css" type="text/css" rel="stylesheet"/>
@endpush

@section('title')
    Home
@endsection

@push('scripts')
    <script src="testing.js" ></script>
@endpush