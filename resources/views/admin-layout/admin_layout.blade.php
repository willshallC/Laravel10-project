<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/css/admin-style/admin-layout.css"/>
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
                <li><a href="{{route('login')}}">Dashboard</a></li>
                <li class="outer-li">Manage Categories <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="/add-category">Add Category</a></li>
                        <li><a href="/edit-categories">Edit Category</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Sub-Categories <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="/add-sub-category">Add Sub-Category</a></li>
                        <li><a href="/edit-sub-categories">Edit Sub-Category</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Sub-Child-Category <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="">Edit Sub-Child-Category</a></li>
                        <li><a href="/add-sub-child-category">Add Sub-Child-Category</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Products <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="/add-products">Add Product</a></li>
                        <li><a href="/select-product-type">Edit Product</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Blogs <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="">Add Blogs</a></li>
                        <li><a href="">Edit Blog</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Users <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="{{route('addUsers')}}">Add User</a></li>
                        <li><a href="{{route('allUsers')}}">Edit User</a></li>
                    </ul>
                </li>
                <li class="outer-li">Manage Pages <i class="fa-solid fa-angle-down"></i>
                    <ul class="side-list-hide">
                        <li><a href="{{route('createPage')}}">Create Page</a></li>
                        <li><a href="{{route('editPage')}}">Edit Page</a></li>
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
                            <li><a href="">Sign Out</a></li>
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