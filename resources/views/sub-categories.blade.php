@extends('layouts.masterlayout')


@section('content')

<div class="sub-categories-container">
    @foreach ($sub_categories as $category)
        <div class="cmn-sub-categories">
            <a href="/product/{{$category->id}}">
                <img src="{{$category->sub_cat_img}}" alt="cat-img"/>
            </a>
            <a href="/product/{{$category->id}}">{{$category->sub_cat_name}}</a>
        </div>
    @endforeach
</div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/sub-categories.css"/>
@endpush