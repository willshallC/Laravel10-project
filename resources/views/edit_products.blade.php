@extends('admin-layout.admin_layout')

@push('style')
    <link rel="stylesheet" type="text/css" href="css/admin-style/edit-products.css"/>
@endpush

@section('content')
    <table>
        <tr>
            <th>ID:</th>
            <th>Title:</th>
            <th>Price</th>
            <th>Status:</th>
            <th>Brand:</th>
            <th>Retialer:</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($products as $product )
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_price}}</td>
                <td>{{$product->product_status}}</td>
                <td>{{$product->product_brand}}</td>
                <td>{{$product->role_type}}</td>
                <td><a href="{{route('viewProduct',$product->id)}}">Edit</a></td>
                <td><button onclick="delProduct({{$product->id}})">Delete</button></td>
            </tr>
        @endforeach
    </table>
@endsection

@push('scripts')
    <script src="js/admin-scripts/del-products.js"></script>
@endpush