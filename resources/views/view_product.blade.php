@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/view-product.css"/>
@endpush

@section('content')
    <form action="{{route('editProduct')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>ID:</th>
                <td><input type="number" name="id" value="{{$product->id}}"/></td>
            </tr>
            <tr>
                <th>Title:</th>
                <td><input type="text" name="product_name" value="{{$product->product_name}}" required/></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><textarea name="description" required>{!!$product->product_description!!}</textarea></td>
            </tr>
            <tr>
                <th>Price:</th>
                <td><input type="number" step="any" value="{{$product->product_price}}" name="product_price" required/></td>
            </tr>
            <tr>
                <th>Image:</th>
                <td><input type="text" name="product_img" value="{{$product->product_img}}" required/></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    @if ($product->product_status == 1)
                        Active <input type="radio" name="product_status" value="1" checked/>
                        Inactive <input type="radio" name="product_status" value="0"/>
                    @else
                        Active <input type="radio" name="product_status" value="1"/>
                        Inactive <input type="radio" name="product_status" value="0" checked/>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Brand:</th>
                <td><input type="text" name="product_brand" value="{{$product->product_brand}}" required/></td>
            </tr>
            <tr>
                <th>Retailer:</th>
                <td>
                    <select name="product_retialer" id="p-retailer">
                        @foreach ($retailers as $retailer )
                            <option value="{{$retailer->id}}">{{$retailer->first_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Link:</th>
                <td><input type="text" name="product_link" value="{{$product->product_link}}" required/></td>
            </tr>
            <tr>
                <th>Categories:</th>
                <td>
                    <select name="product_cat" id="cat" required>
                        <option value="">--Select-Category--</option>
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr id="subcat-row">
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
            <tr id="child-cat-row">
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
                <td><input type="submit" value="Update"/></td>
            </tr>
        </table>
    </form>
    <script>
        var fcid = "{{$product->fcid}}"
        var fscid = "{{$product->fscid}}"
        var fsccid = "{{$product->fsccid}}"
        var productRet = "{{$product->product_retailer}}"
    </script>
@endsection

@push('scripts')
    <script src="/js/admin-scripts/edit-products.js" defer></script>
@endpush