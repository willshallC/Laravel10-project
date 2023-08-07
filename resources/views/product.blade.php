@extends('layouts.sidebar_temp')

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/product.css"/>
@endpush

@section('sidebar')
    <div class="sidebar-filter">
        <form>
          <li>Brand 1 <input type="checkbox" value=""/></li>
          <li>Brand 1 <input type="checkbox" value=""/></li>
          <li>Brand 1 <input type="checkbox" value=""/></li>
        </form>
    </div>
@endsection

@section('content')    
<h2 class="cat-bread">{{ucfirst($cat_name)}} | {{ucfirst($sub_cat_name)}}</h2>
<div class="products-container">
    @if (count($products)<1)
        <h1>No Products</h1>
    @else    
        @foreach ($products as $product)
            <div class="cmn-products">
                <div class="product-img" onclick="window.open('/searching-product/{{$product->id}}', '_blank')">
                    <img src="{{$product->product_img}}" alt="cat-img"/>
                </div>
                <div class="product-name">{{$product->product_name}}</div>
                <div class="product-brand"><b>{{$product->product_brand}}</b></div>
                <div class="product-price-view">
                    <span class="price"><strong><sup>$</sup>{{$product->product_price}}</strong></span>
                    <span class="view n">Quick View</span>
                </div>
                {{-- Popup --}}
                <div class="modal" id="">
                    <div class="m-header">
                        <div class="title">
                            <h3>Description</h3>
                        </div>
                        <button onclick="togglePop()" class="close">&times;</button>
                    </div>
                    <div class="m-body">
                        <div class="m-img mcmn"><img src="{{$product->product_img}}" alt="cat-img"/></div>
                        <div class="m-desc mcmn">
                            <h3>Product Description</h3>
                            <p>{!!$product->product_description!!}</p>
                        </div>
                    </div>
                </div>
                <div id="overlay" onclick="togglePop()"></div>
            </div>
        @endforeach
    @endif   
</div>

@endsection


@push('scripts')
    <script src="/js/admin-scripts/product-pop.js"></script>
@endpush