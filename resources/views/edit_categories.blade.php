@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/edit-categories.css"/>
@endpush

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
        
        @foreach ($categories as $category )
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->cat_name}}</td>
                <td>{{$category->cat_slug}}</td>
                <td>{{$category->cat_status}}</td>
                <td><a href="{{route('viewCategory',$category->id)}}">Edit</a></td>
                <td><a href="">Delete</a></td>
            </tr>
        @endforeach
    </table>
@endsection