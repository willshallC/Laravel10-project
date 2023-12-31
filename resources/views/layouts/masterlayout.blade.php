
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}"/>
    <title>Laravel Site - @yield('title')</title>
    @stack('style')
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-main">
                <h1>First Laravel Site</h1>
            </div>
            <div class="nav-bar">
                <nav>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="{{route('posts')}}">Post</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('blogs')}}">Blogs</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
<section class="content-section">
    <div class="main-content">
        @hasSection('content')
            @yield('content')
            @else
            <h1>Wrong</h1>
        @endif
        {{-- @hasSection('content')
            @yield('content')
            @else
                <h1>Nothing to Show</h1>
        @endif --}}
    </div>
</section>
@stack('scripts')
</body>
</html>