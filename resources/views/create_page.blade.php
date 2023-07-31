@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/create-page.css"/>
@endpush

@section('content')
    <form name="page-form" action="{{route('addPage')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Title:</th>
                <td><input type="text" name="page_title" placeholder="Page Title"/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="page_slug" placeholder="Slug"/></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><textarea name="description"></textarea></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" name="img" placeholder="Image URL"/></td>
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
                <td><input type="text" name="seo_title" placeholder="SEO Title"/></td>
            </tr>
            <tr>
                <th>SEO Image:</th>
                <td><input type="text" name="seo_img" placeholder="SEO Image URL"/></td>
            </tr>
            <tr>
                <th>Meta Description:</th>
                <td><textarea name="meta_description"></textarea></td>
            </tr>
            <tr>
                <th>Page Sechma:</th>
                <td><textarea name="page_schema"></textarea></td>
            </tr>
            <tr>
                <th>Published:</th>
                <td>Yes <input type="radio" name="published" value="1" checked/> No <input type="radio" name="published" value="0"/></td>
            </tr>
            <tr>
                <th>Indexed:</th>
                <td>Yes <input type="radio" name="indexed" value="1"/> No <input type="radio" name="indexed" value="0" checked/></td>
            </tr>
            <tr>
                <td><input type="button" value="Create" onclick="submitForm(event)"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script src="js/admin-scripts/create-page.js" defer></script>
@endpush