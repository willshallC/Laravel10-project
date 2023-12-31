@extends('admin-layout.admin_layout')

@section('content')
    <form name="editCatForm" action="{{route('editCat')}}" method="POST">
        @csrf
        <table>
                <tr>
                    <th>ID:</th>
                    <td><input type="number" value="{{$category->id}}" name="cat_id" readonly/></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="cat_name" value="{{$category->cat_name}}"/></td>
                </tr>
                <tr>
                    <th>Slug:</th>
                    <td><input type="text" value="{{$category->cat_slug}}" name="cat_slug" minlength="3"/></td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        @if ($category->cat_status==1)
                            Active <input checked type="radio" name="cat_status" value="1"/>
                            Inactive <input type="radio" name="cat_status" value="0"/>
                        @else
                            Active <input type="radio" name="cat_status" value="1"/>
                            Inactive <input checked type="radio" name="cat_status" value="0"/>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Top Category:</th>
                    <td>
                        @if ($category->top_cat==1)
                            Yes <input type="radio" name="top_cat" checked value="1"/>
                            No <input type="radio" name="top_cat" value="0"/>
                        @else
                            Yes <input type="radio" name="top_cat" value="1"/>
                            No <input type="radio" name="top_cat" value="0" checked/>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Image:</th>
                    <td><input type="text" value="{{$category->cat_img}}" name="cat_img"/></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea name="cat_description" >{{$category->cat_description}}</textarea></td>
                </tr>
                <tr>
                    <th>SEO Title:</th>
                    <td><input type="text" name="seo_title" value="{{$category->seo_title}}"/></td>
                </tr>
                <tr>
                    <th>SEO Image:</th>
                    <td><input type="text" name="seo_image" value="{{$category->seo_image}}"/></td>
                </tr>
                <tr>
                    <th>Meta Description:</th>
                    <td><textarea name="meta_description">{{$category->meta_description}}</textarea></td>
                </tr>
                <tr>
                    <th>Page Schema:</th>
                    <td><textarea name="page_schema">{!!$category->page_schema!!}</textarea></td>
                </tr>
                <tr>
                    <th>Index:</th>
                    <td>
                        @if ($category->index==0)
                            Yes <input type="radio" name="index" value="1"/>
                            No <input type="radio" name="index" value="0" checked/>
                        @else
                            Yes <input type="radio" name="index" value="1" checked/>
                            No <input type="radio" name="index" value="0"/>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><input type="button"  value="Update" onclick="editCat(event)"/></td>
                </tr>
            
        </table>
    </form>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/edit-cat-form.js" defer></script>
@endpush