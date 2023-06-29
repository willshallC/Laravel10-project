@extends('layouts.masterlayout')

@section('content')

    <div class="categories-container">
        @foreach ($categories as $category )
            <div class="cmn-categories">
                <a href="/sub-categories/{{$category->id}}">
                    <img src="{{$category->cat_img}}" alt="cat-img"/>
                </a>
                <a href="/sub-categories/{{$category->id}}">{{$category->cat_name}}</a>
            </div>
        @endforeach
    </div>

    
@endsection

@push('style')
    <link href="css/welcome.css" type="text/css" rel="stylesheet"/>
@endpush

@section('title')
    Home
@endsection

@section('content')
    <h1>Home</h1>
    <p>
        Welcome to our website! We are thrilled to have you here. Whether you're a first-time visitor or a returning customer, we want to extend our warmest greetings and invite you to explore everything we have to offer. Our mission is to provide you with an exceptional online experience, where you can discover a wide range of products and services tailored to your needs. From cutting-edge technology to timeless classics, we strive to bring you the very best. So sit back, relax, and embark on a journey of discovery as you navigate through our pages. We're here to assist you every step of the way, so don't hesitate to reach out if you have any questions or need assistance. Thank you for choosing us as your destination, and we hope you enjoy your time with us!
    </p>
@endsection

@push('scripts')
    <script src="testing.js" ></script>
@endpush