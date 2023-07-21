@extends('layouts.masterlayout')


@section('content')

<div class="cat-tag">
    <h1>{{strtoupper($cat_name)}}</h1>
</div>

<div class="sub-categories-container">
    @foreach ($sub_categories as $category)
        <div class="cmn-sub-categories" onclick="location.href='{{url()->current().'/'.$category->sub_cat_slug}}'">
            <div class="sub-cat-img">
                <img src="{{$category->sub_cat_img}}" alt="cat-img"/>
            </div>
            <div class="sub-cat-name">
                <h4>{{$category->sub_cat_name}}</h4>
            </div>
            <div class="sub-cat-products"><b>{{$category->total}} Products</b></div>
        </div>
    @endforeach
</div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/sub-categories.css"/>
@endpush