@extends('layouts.masterlayout')

@section('content')

    <h1 style="text-align: center">Add Product</h1>

    <form action="{{route('insertProduct')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Product:</th>
                <td><input type="text" name="product_name" placeholder="Product Name" required/></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><textarea name="description"></textarea></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td><input type="number" name="product_price" required placeholder="Price"/></td>
            </tr>
            <tr>
                <th>Image:</th>
                {{-- <td><input type="file" name="product_img"/></td> --}}
                <td><input type="text" name="product_img" required/></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>Active <input type="radio" name="product_status" checked value="1"/> Inactive <input type="radio" name="product_status" value="0"/></td>
            </tr>
            <tr>
                <th>Brand:</th>
                <td><input type="text" name="product_brand" required placeholder="Brand"/></td>
            </tr>
            <tr>
                <th>Link:</th>
                <td><input type="text" name="product_link" required placeholder="Link"/></td>
            </tr>
            <tr>
                <td></td>
                <td>[place for drop-down for category]</td>
            </tr>
            <tr>
                <td></td>
                <td>[place for drop-down for sub category]</td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Add Product"/></td>
            </tr>
        </table>
    </form>

    <script>
        CKEDITOR.replace('description');
    </script>
@endsection