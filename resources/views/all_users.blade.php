@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/all-users.css"/>
@endpush

@section('content')
    <table>
        <tr>
            <th>ID:</th>
            <th>Name:</th>
            <th>Email:</th>
            <th>Role:</th>
            <th>Created At:</th>
            <th>Edit:</th>
            <th>Delete:</th>
        </tr>
        @foreach ($users as $user )
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role_type}}</td>
                <th>{{$user->created_at}}</th>
                <th><a href="">Edit</a></th>
                <th><button>Delete</button></th>
            </tr>
        @endforeach
    </table>
@endsection