@extends('layouts.masterlayout')


@section('content')

{{-- <table>
    <tr>
        @foreach($sub_categories as $category)
            
                <td><a href="/product/{{$category->id}}"><img src="{{$category->sub_cat_img}}" alt="cat-img" style="height: 100px;" width="100px;"/>
                    <p>{{$category->sub_cat_name}}</p></a>
                </td>
                
            
        @endforeach
    </tr>
</table> --}}

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