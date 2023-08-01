@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/edit-page.css"/>
@endpush

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Template</th>
            <th>Publish</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($pages as $page)
            <tr>
                <td>{{$page->id}}</td>
                <td>{{$page->title}}</td>
                <td>{{$page->slug}}</td>
                <td>{{$page->template}}</td>
                <td>
                    @if ($page->published==0)
                        {{"Draft"}}
                    @else
                        {{"Published"}}
                    @endif
                </td>
                <td><a href="{{route('editSinglePage',$page->id)}}">Edit</a></td>
                <td><button onclick="deletePage({{$page->id}})">Delete</button></td>
            </tr>
        @endforeach
    </table>
@endsection

@push('scripts')
    <script src="js/admin-scripts/edit-page.js" defer></script>
@endpush