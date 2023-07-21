@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/sub-child-categories.css"/>
@endpush

@section('content')

    <div class="sub-child-categories-container">
        @foreach ($sub_child_categories as $category)
            
            <div class="cmn-sub-child-categories" onclick="location.href='{{url()->current().'/'.$category->sub_child_slug}}'">
                <div class="sub-child-cat-img">
                    <img src="{{$category->sub_child_img}}" alt="cat-img"/>
                </div>
                <div class="sub-child-cat-name">
                    <h4>{{$category->sub_child_name}}</h4>
                </div>
                {{-- <div class="sub-child-cat-products"><b>{{$category->total}} Products</b></div> --}}
            </div>
        @endforeach
    </div>

@endsection