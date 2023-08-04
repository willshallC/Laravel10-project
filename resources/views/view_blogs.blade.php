@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/view-blogs.css"/>
@endpush

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($blogs as $blog )
            <tr>
                <td>{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->slug}}</td>
                <td>{{$blog->fname}}</td>
                <td>{{$blog->cat_name}}</td>
                <td>
                    @if ($blog->status==1)
                        {{"Published"}}
                    @else
                        {{"Draft"}}
                    @endif
                </td>
                <td><a href="{{route('editBlog',$blog->id)}}">Edit</a></td>
                <td><button onclick="delBlog({{$blog->id}})">Delete</button></td>
            </tr>
        @endforeach
    </table>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/view-blogs.js" defer></script>
@endpush