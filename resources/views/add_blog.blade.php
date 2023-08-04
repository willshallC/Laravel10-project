@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/add-blog.css"/>
@endpush

@section('content')
    <h1>Create Blog</h1>
    <form name="blog-form" action="{{route('insertBlog')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Title:</th>
                <td><input type="text" name="title" placeholder="Enter Blog Title"/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="slug" placeholder="Enter Blog Slug"/></td>
            </tr>
            <tr>
                <th>Excerpt:</th>
                <td><textarea name="excerpt"></textarea></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><textarea name="description"></textarea></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" name="image" placeholder="Enter Blog Image URL"/></td>
            </tr>
            <tr>
                <th>Author:</th>
                <td>
                    <select name="author" id="authors">
                        <option value="">Select Author</option>
                        @foreach ($authors as $author )
                            <option value="{{$author->id}}">{{$author->first_name}} {{$author->last_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Category:</th>
                <td>
                    <select name="category" id="categories">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>SEO Title:</th>
                <td><input type="text" name="seo_title" placeholder="Enter SEO Title"/></td>
            </tr>
            <tr>
                <th>SEO Image:</th>
                <td><input type="text" name="seo_img" placeholder="Enter SEO Image URL"/></td>
            </tr>
            <tr>
                <th>Meta Description:</th>
                <td><textarea name="meta_description"></textarea></td>
            </tr>
            <tr>
                <th>Featured:</th>
                <td>
                    Yes <input type="radio" name="featured" value="1"/>
                    No <input type="radio" name="featured" value="0" checked/>
                </td>
            </tr>
            <tr>
                <th>Index:</th>
                <td>
                    Yes <input type="radio" name="index" value="1"/>
                    No <input type="radio" name="index" value="0" checked/>
                </td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    Publish <input type="radio" name="status" value="1" checked />
                    Draft <input type="radio" name="status" value="0"/>
                </td>
            </tr>
            <tr>
                <td><input type="button" value="Create Blog" onclick="addBlog(event)"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/add-blog.js" defer></script>
@endpush