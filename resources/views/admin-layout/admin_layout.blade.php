<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/css/admin-style/admin-layout.css"/>
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <script defer src="/js/admin-scripts/admin-layout.js"></script>
    @stack('style')
    <title>Dashboard</title>
</head>
<body>
    
    <section class="admin-section">
        <div class="side-bar">
            <div class="logo">
                <img src="https://dev.redefiningweb.com/imgs/BS-Logo.png" alt="logo"/>
            </div>
            <ul>
                <li><a href="{{route('adminDashboard')}}">Dashboard</a></li>
                <li class="outer-li">Manage Categories <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="/add-category">Add Category</a></li>
                        <li><a href="/edit-categories">View Categories</a></li>
                        <li><a href="/add-sub-category">Add Sub-Category</a></li>
                        <li><a href="/edit-sub-categories">View Sub-Categories</a></li>
                        <li><a href="/add-sub-category">Add Sub-Category</a></li>
                        <li><a href="/edit-sub-categories">View Sub-Categories</a></li>
                    </ul>
                </li>
                {{-- <li class="outer-li">Manage Sub-Categories <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="/add-sub-category">Add Sub-Category</a></li>
                        <li><a href="/edit-sub-categories">View Sub-Categories</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Sub-Child-Category <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="/add-sub-category">Add Sub-Category</a></li>
                        <li><a href="/edit-sub-categories">View Sub-Categories</a></li>
                    </ul>
                </li> --}}
                <li class="outer-li">Manage Products <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="/add-products">Add Product</a></li>
                        <li><a href="{{route('viewProducts')}}">view Products</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Blogs <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="{{route('addBlog')}}">Add Blogs</a></li>
                        <li><a href="{{route('viewBlogs')}}">View Blogs</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Users <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="{{route('addUsers')}}">Add User</a></li>
                        <li><a href="{{route('allUsers')}}">View Users</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Pages <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="{{route('createPage')}}">Create Page</a></li>
                        <li><a href="{{route('editPage')}}">View Pages</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage FAQs <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="{{route('addFaq')}}">Create FAQ</a></li>
                        <li><a href="{{route('viewFaqs')}}">View FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-content">
            <header class="desktop-header">
                
                <div class="header-search">Search bar</div>
                <div class="admin-details">
                    <div class="admin-img">'
                        <img src="" alt="admin"/>
                    </div>
                    <div class="admin-name">
                        <h6 id="name-admin">Name Here <i class="fa-solid fa-angle-down"></i></h6>
                        <ul id="name-box" class="admin-drop-down">
                            <li><a href="">Edit Profile</a></li>
                            <li><a href="">View Profile</a></li>
                            <li><a href="{{route('signOut')}}">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                
            </header>

            @hasSection('content')
                @yield('content')
                @else
                    <h1>No Content</h1>
            @endif
        </div>
    </section>

    @stack('scripts')
</body>
</html>