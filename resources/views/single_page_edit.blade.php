@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/single-page-edit.css"/>
@endpush

@section('content')
    <form>
        <table>
            <tr>
                <th>ID:</th>
                <td><input type="number" value="{{$page->id}}" readonly/></td>
            </tr>
            <tr>
                <th>Title:</th>
                <td><input type="text" name="page_title" value="{{$page->title}}"/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="page_slug" value="{{$page->slug}}"/></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><textarea name="description">{!!$page->description!!}</textarea></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" name="img" value="{{$page->image}}"/></td>
            </tr>
            <tr>
                <th>Template</th>
                <td>
                    <select id="template" name="page_template">
                        <option value="">--Select-Template</option>
                        @foreach ($templates as $template )
                            <option value="{{$template->id}}">{{$template->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>SEO Title:</th>
                <td><input type="text" name="seo_title" placeholder="SEO Title" value="{{$page->seo_title}}"/></td>
            </tr>
            <tr>
                <th>SEO Image:</th>
                <td><input type="text" name="seo_img" placeholder="SEO Image URL" value="{{$page->seo_image}}"/></td>
            </tr>
            <tr>
                <th>Meta Description:</th>
                <td><textarea name="meta_description">{{$page->meta_description}}</textarea></td>
            </tr>
            <tr>
                <th>Page Sechma:</th>
                <td><textarea name="page_schema">{!!$page->page_schema!!}</textarea></td>
            </tr>
            <tr>
                <th>Published:</th>
                <td>
                    @if ($page->published==1)
                        Yes <input type="radio" name="publish" value="1" checked/>
                        No <input type="radio" name="publish" value="0"/>
                    @else
                        Yes <input type="radio" name="publish" value="1"/>
                        No <input type="radio" name="publish" value="0" checked/>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Indexed:</th>
                <td>
                    @if ($page->indexed==1)
                        Yes <input type="radio" name="indexed" value="1" checked/>
                        No <input type="radio" name="indexed" value="0"/>
                    @else
                        Yes <input type="radio" name="indexed" value="1"/>
                        No <input type="radio" name="indexed" value="0" checked/>
                    @endif
                </td>
            </tr>
            <tr>
                <td><input type="button" value="Create" onclick="submitForm(event)"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script src="js/admin-scripts/single-page-edit.js"></script>
@endpush