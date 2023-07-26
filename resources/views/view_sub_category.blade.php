@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/view-sub-cat.css"/>
@endpush

@section('content')
    <form name='edit-sub-cat' action="" method="POST">
        @csrf
        <table>
            <tr>
                <th>ID:</th>
                <td><input type="text" name="id" value="{{$subCategory->id}}" readonly/></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><input type="text" name="sub_cat_name" value="{{$subCategory->sub_cat_name}}"/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="sub_cat_slug" value="{{$subCategory->sub_cat_slug}}"/></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" name="sub_cat_img" value="{{$subCategory->sub_cat_img}}"/></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    @if ($subCategory->sub_cat_status==1)
                        Active <input type="radio" name="sub_cat_status" value="1" checked/>
                        Inactive <input type="radio" name="sub_cat_status" value="0"/>
                    @else
                        Active <input type="radio" name="sub_cat_stutus" value="1"/>
                        Inactive <input type="radio" name="sub_cat_status" value="0" checked/>
                    @endif
                </td>
            </tr>
            <tr>
                <td><input type="button" value="Update" onclick="updateSubCat(event)"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/edit-sub-cat.js"></script>
@endpush