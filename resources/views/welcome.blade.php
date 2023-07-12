@extends('layouts.masterlayout')

@section('content')

    <div class="categories-container">
        @foreach ($categories as $category )
            @php
                $string = strtolower(trim($category->cat_name));
                $categorySlug = preg_replace('/[^A-Za-z0-9]+/', '-', $string);
            @endphp
            <div class="cmn-categories">
                <a href="/{{$categorySlug}}">
                    <img src="{{$category->cat_img}}" alt="cat-img"/>
                </a>
                <a href="/{{$categorySlug}}">{{$category->cat_name}}</a>
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