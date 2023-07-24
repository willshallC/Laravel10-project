@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/cat-form.css"/>
@endpush

@section('content')
    <h1 style="text-align: center;">Add Category</h1>
    <form action="/insert-category" method="POST" name="cat-form">
        @csrf
        <table>
            <tr>
                <th>Name:</th>
                <td><input type="text" name="cat_name" placeholder="Category" required/></td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td><input type="text" name="cat_slug" placeholder="slug" required minlength="3"/></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><textarea name="cat_description"></textarea></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>Active <input checked type="radio" name="status" value="1"/> Inactive <input type="radio" name="status" value="0"/></td>
            </tr>
            <tr>
                <th>Top Category?</th>
                <td>Yes <input type="radio" name="top_cat" value="1"/> No <input checked type="radio" name="top_cat" value="0"/></td>
            </tr>
            <tr>
                <th>Image:</th>
                {{-- <td><input type="file" name="cat_img"/></td> --}}
                <td><input type="text" name="cat_img" required/></td>
            </tr>
            <tr>
                <th>Has Child:</th>
                <td>Yes <input checked type="radio" name="cat_child" value="1"/> No <input type="radio" name="cat_child" value="0"/></td>
            </tr>
            <tr>
                <td><input type="button" name="btnsubmit" onclick="submitForm(event)" value="Add Category"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script src="/js/cat-form-script.js"></script>
@endpush