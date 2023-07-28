@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/admin-style/select-product-type.css"/>
@endpush

@section('content')
    <form action="{{route('selectProductShow')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Category:</th>
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
                <td><input type="submit" value="Show Products"/></td>
            </tr>
        </table>
    </form>
@endsection

@push('scripts')
    <script defer src="/js/admin-scripts/select-product-type.js"></script>
@endpush