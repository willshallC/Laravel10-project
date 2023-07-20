@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/subcat-form.css"/>
@endpush
@section('content')
    
    <h1 style="text-align: center">Add Sub-Category</h1>

    <form action="{{route('insertSubCat')}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Sub-Category:</td>
                <td><input type="text" name="sub_cat_name" placeholder="Sub-Category" required/></td>
            </tr>
            <tr>
                <td>Parent Category:</td>
                <td>
                    <select required name="parent_id" required>
                        <option value="">--Select-Category--</option>
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                {{-- <td><input type="file" name="sub_cat_img"/></td> --}}
                <td><input type="text" name="sub_cat_img" required/></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>Active <input checked type="radio" name="sub_cat_status" value="1"/> Inactive <input type="radio" name="sub_cat_status" value="0"/></td>
            </tr>
            <tr>
                <td>Has Child?:</td>
                <td>Yes <input type="radio" name="sub_child" value="1"/> No <input type="radio" name="sub_child" value="0" checked/></td>
            </tr>
            <tr>
                
                <td><input type="submit" name="submit" value="Add Sub-Category"/></td>
            </tr>
        </table>
    </form>
    
@endsection