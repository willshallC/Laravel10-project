@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/subcat-form.css"/>
@endpush

@section('content')
    
    <h1>Sub Child Category Form</h1>

    <form action="{{route('insertSubChild')}}" method="POST" name="sub-child-form">
        @csrf
        <table>
            <tr>
                <th>Name:</th>
                <td><input type=" text" name="sub_child_name" required placeholder="Name"/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="sub_child_slug" min="3" required placeholder="Slug"/></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" name="sub_child_img" required/></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>Active <input type="radio" name="sub_child_status" value="1" checked/> Inactive <input type="radio" name="sub_child_status" value="0"/></td>
            </tr>
            <tr>
                <th>Parent Sub-Category:</th>
                <td>
                    <select id="subCatParent" name="parent_sub_cat" required>
                        <option value="">--Select-Sub-Category--</option>
                        @foreach ($subCategories as $subcat)
                            <option value="{{$subcat->id}}">{{$subcat->sub_cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="button" onclick="formSubmit(event)" value="Add"/></td>
            </tr>
        </table>
    </form>

@endsection

@push('scripts')
    <script src="js/sub-child-form.js"></script>
@endpush