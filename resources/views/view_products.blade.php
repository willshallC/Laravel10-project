@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/admin-style/select-product-type.css"/>
@endpush

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Status</th>
            <th>Brand</th>
            <th>Retailer</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->cat_name}}</td>
                <td>{{$product->product_price}}</td>
                <td>
                    @if ($product->product_status==1)
                        {{"Active"}}
                    @else
                        {{"Inactive"}}
                    @endif
                </td>
                <td>{{$product->product_brand}}</td>
                <td>{{$product->slug}}</td>
                <td><a href="{{route('editProduct',$product->id)}}">Edit</a></td>
                <td><button onclick="deleteProduct({{$product->id}})">Delete</button></td>
            </tr>
        @endforeach
    </table>
    <div>
        {{$products->links()}}
    </div>
@endsection


@push('scripts')
    <script defer src="/js/admin-scripts/view-products.js"></script>
@endpush