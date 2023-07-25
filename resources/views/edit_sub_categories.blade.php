@extends('layouts.masterlayout')

@section('content')
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
        @foreach ($subcategories as $subCategory )
            <tr>
                <td>{{$subCategory->id}}</td>
                <td>{{$subCategory->sub_cat_name}}</td>
                <td>{{$subCategory->sub_cat_slug}}</td>
                <td>{{$subCategory->sub_cat_status}}</td>
                <td><a href="{{route('viewCategory',$subCategory->id)}}">Edit</a></td>
                <td><button onclick="subCatDel({{$subCategory->id}})">Delete</button></td>
            </tr>
        @endforeach
    </table>
@endsection