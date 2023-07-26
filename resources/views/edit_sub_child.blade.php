@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/admin-style/edit-sub-child.css"/>
@endpush

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>Name:</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
        @foreach ($subChild as $child)
            <tr>
                <td>{{$child->id}}</td>
                <td>{{$child->sub_child_name}}</td>
                <td>{{$child->sub_child_slug}}</td>
                <td>{{$child->sub_status}}</td>
                <td><a href="{{route('viewChildCat',$child->id)}}">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection
