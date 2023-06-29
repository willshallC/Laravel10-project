@extends('layouts.masterlayout')

@section('content')
    
    <h1 style="text-align: center">Add Sub-Category</h1>

    <form>
        <table>
            <tr>
                <td>Sub-Category:</td>
                <td><input type="text" name="sub_cat_name" placeholder="Sub-Category" required/></td>
            </tr>
            <tr>
                <td>[space for drop-down for parent category]</td>
                <td></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="sub_cat_name"/></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>Active <input checked type="radio" name="sub_cat_status" value="1"/> Inactive <input type="radio" name="sub_cat_status" value="0"/></td>
            </tr>
            <tr>
                
                <td><input type="submit" name="submit" value="Add Sub-Category"/></td>
            </tr>
        </table>
    </form>
    
@endsection