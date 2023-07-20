@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/subcat-form.css"/>
@endpush

@section('content')
    
    <h1>Sub Child Category Form</h1>

    <form action="{{route('insertSubChild')}}" method="POST">
        @csrf
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
                <td>Parent Sub-Category:</td>
                <td>
                    <select name="parent_sub_cat" required>
                        <option value="">--Select-Sub-Category--</option>
                        @foreach ($subCategories as $subcat)
                            <option value="{{$subcat->id}}">{{$subcat->sub_cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Add"/></td>
            </tr>
        </table>
    </form>

@endsection