@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/subcat-form.css"/>
@endpush

@section('content')
    
    <h1>Sub Child Category Form</h1>

    <form>
        <table>
            <tr>
                <td>Name:</td>
                <td><input type=" text" name="sub_child_name" required/></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="text" name="sub_child_img" required/></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>Active <input type="radio" name="sub_child_status" value="1" checked/> Inactive <input type="radio" name="sub_child_status" value="0"/></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><input type="submit" value="Add"/></td>
            </tr>
        </table>
    </form>

@endsection