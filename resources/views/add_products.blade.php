@extends('layouts.masterlayout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/product-form.css" />
@endpush

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
                <th>Category</th>
                <td>
                    <select name="product_cat" id="cat" required>
                        <option value="">--Select-Category--</option>
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr id="subcat-row" style="visibility: hidden;">
                <th>Sub-Category</th>
                <td>
                    <select name="product_subcat" id="subcat" required>
                        <option value="">--Select-SubCategory--</option>
                        <option id="null-opt" value=null>NULL</option>
                        @foreach ($subCategories as $subcat )
                            <option value={{$subcat->id}} data-parent="{{$subcat->parent_id}}">{{$subcat->sub_cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr id="child-cat-row" style="visibility: hidden;">
                <th>Sub-Child-Category</th>
                <td>
                    <select name="child_sub_cat" id="childCat" required>
                        <option value="">--Select-Child-Category--</option>
                        <option id="null-child" value=null >Null</option>
                        @foreach ($subChildCategories as $childCat )
                            <option data-subparent="{{$childCat->sub_parent_id}}" value="{{$childCat->id}}">{{$childCat->sub_child_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Add Product"/></td>
            </tr>
        </table>
    </form>

@endsection

@push('scripts')
    <script src="js/product-form-script.js"></script>
@endpush