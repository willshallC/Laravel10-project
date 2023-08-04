@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/edit-blog.css"/>
@endpush

@section('content')
<form name="blog-form" action="" method="POST">
    @csrf
    <table>
        <tr>
            <th>ID:</th>
            <td><input type="number" name="id" value="{{$blog->id}}" readonly/></td>
        </tr>
        <tr>
            <th>Title:</th>
            <td><input type="text" name="title" value="{{$blog->title}}"/></td>
        </tr>
        <tr>
            <th>Slug:</th>
            <td><input type="text" name="slug" value="{{$blog->slug}}"/></td>
        </tr>
        <tr>
            <th>Excerpt:</th>
            <td><textarea name="excerpt">{{$blog->excerpt}}</textarea></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><textarea name="description">{!!$blog->description!!}</textarea></td>
        </tr>
        <tr>
            <th>Image:</th>
            <td><input type="text" name="image" value="{{$blog->image}}"/></td>
        </tr>
        <tr>
            <th>Author:</th>
            <td>
                <select name="author" id="authors">
                    @foreach ($authors as $author )
                        <option value="{{$author->id}}">{{$author->first_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <th>Category:</th>
            <td>
                <select name="category" id="categories">
                    @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <th>SEO Title:</th>
            <td><input type="text" name="seo_title" value="{{$blog->seo_title}}"/></td>
        </tr>
        <tr>
            <th>SEO Image:</th>
            <td><input type="text" name="seo_img" value="{{$blog->seo_image}}"/></td>
        </tr>
        <tr>
            <th>Meta Description:</th>
            <td><textarea name="meta_description">{{$blog->meta_description}}</textarea></td>
        </tr>
        <tr>
            <th>Featured:</th>
            <td>
                @if ($blog->featured==1)
                Yes <input type="radio" name="featured" value="1" checked/>
                No <input type="radio" name="featured" value="0"/>
                @else
                    Yes <input type="radio" name="featured" value="1"/>
                    No <input type="radio" name="featured" value="0" checked/>
                @endif
            </td>
        </tr>
        <tr>
            <th>Index:</th>
            <td>
                @if ($blog->index==1)
                    Yes <input type="radio" name="index" value="1" checked/>
                    No <input type="radio" name="index" value="0"/>
                @else
                    Yes <input type="radio" name="index" value="1"/>
                    No <input type="radio" name="index" value="0" checked/>
                @endif
            </td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>
                @if ($blog->status==1)
                    Publish <input type="radio" name="status" value="1" checked />
                    Draft <input type="radio" name="status" value="0"/>
                @else
                    Publish <input type="radio" name="status" value="1" />
                    Draft <input type="radio" name="status" value="0" checked/>
                @endif
            </td>
        </tr>
        <tr>
            <td><input type="button" value="Update Blog" onclick="updateBlog(event)"/></td>
        </tr>
    </table>
</form>
@endsection