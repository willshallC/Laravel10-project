@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/sub-child-categories.css"/>
@endpush

@section('content')

    <div class="sub-child-categories-container">
        @foreach ($sub_child_categories as $category)
            @php
                $string = strtolower(trim($category->sub_child_name));
                $subCategorySlug = preg_replace('/[^A-Za-z0-9]+/', '-', $string);  
            @endphp
            <div class="cmn-sub-child-categories" onclick="location.href='{{url()->current().'/'.$subCategorySlug}}'">
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