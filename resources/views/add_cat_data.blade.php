@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/cat-form.css"/>
@endpush

@section('content')
    <h1 style="text-align: center;">Add Category</h1>
    <form action="/insert-category" method="POST">
        @csrf
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="cat_name" placeholder="Category" required/></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>Active <input checked type="radio" name="status" value="1"/> Inactive <input type="radio" name="status" value="0"/></td>
            </tr>
            <tr>
                <td>Top Category?</td>
                <td>Yes <input type="radio" name="top_cat" value="1"/> No <input checked type="radio" name="top_cat" value="0"/></td>
            </tr>
            <tr>
                <td>Image:</td>
                {{-- <td><input type="file" name="cat_img"/></td> --}}
                <td><input type="text" name="cat_img" required/></td>
            </tr>
            <tr>
                <td>Has Child:</td>
                <td>Yes<input checked type="radio" name="cat_child" value="1"/> No <input type="radio" name="cat_child" value="0"/></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Add Category"/></td>
            </tr>
        </table>
    </form>
@endsection