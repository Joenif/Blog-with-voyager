<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog Template') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div id="app">

    {{-- Start Menu Section --}}
        <section class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </section>
        
        <header class="site-navbar" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    
                    <div class="col-12 search-form-wrap search-form">
                        <form action="{{route('search')}}" method="POST">
                            {{csrf_field()}}
                            <input type="text" id="s" name="q" class="form-control" placeholder="Search...">
                            <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                        </form>
                        <button class="btn btn-danger search-close-btn"><span class="icon-close"></span></button>
                    </div>
                    
                    <div class="col-6 site-logo">
                        <a href="/" class="text-black h2 mb-0">Blog</a>
                    </div>

                    <div class="col-6 text-right">
                        <nav class="site-navigation" role="navigation">
                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                                @php
                                    $category = new App\Category;
                                    $menus = $category->whereNull('parent_id')->get()
                                @endphp
                                @foreach ($menus as $menu)
                                    @if($category->hasChild($menu->id) === false)
                                        <li>
                                            <a href="{{route('category', $menu->slug)}}">{{$menu->name}}</a>
                                        </li>
                                    @else
                                        <li class="menu-dropdown">
                                            <a href="{{route('category', $menu->slug)}}">{{$menu->name}} <i class="icon-caret-down"></i></a>
                                            @php
                                                $children = TCG\Voyager\Models\Category::where('parent_id', $menu->id)->get();
                                            @endphp
                                            @if ($children->isNotEmpty())
                                                <div class="menu-dropdown-content">
                                                @foreach ($children as $child)
                                                    <a href="{{route('category', $child->slug)}}">{{$child->name}}</a>
                                                @endforeach
                                                    
                                                </div>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                                
                                <li class="d-none d-lg-inline-block"><a href="#" class="search-toggle"><span class="icon-search"></span></a></li>
                            </ul>
                        </nav>
                        <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
                    </div>
                </div>

            </div>
        </header>

    {{-- End Menu section --}}

    {{-- Start Section --}}
        <div class="space"></div>
        <main class="">
            @if(session()->has('message'))
            <div class="session-info">
                <p class="">{{session('message')}}</p>
            </div>
            @endif
            @yield('section')
        </main>
    {{-- End Section --}}
    
    {{-- Start Footer --}}
        <footer class="site-footer">
            <div class="container">
                <div class="row mb-5">
                <div class="col-md-4">
                    <h3 class="footer-heading mb-4">About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                    <ul class="list-unstyled float-left mr-5">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Subscribes</a></li>
                    </ul>
                    
                </div>
                <div class="col-md-4">
                    

                    <div>
                    <h3 class="footer-heading mb-4">Connect With Us</h3>
                    <p>
                        <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                        <a href="#"><span class="icon-twitter p-2"></span></a>
                        <a href="#"><span class="icon-instagram p-2"></span></a>
                        <a href="#"><span class="icon-rss p-2"></span></a>
                        <a href="#"><span class="icon-envelope p-2"></span></a>
                    </p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-12 text-center">
                    <p>Copyright &copy; All rights reserved</p>
                </div>
                </div>
            </div>
        </footer>
        
    </div>


<!-- Scripts -->
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/jquery-ui.js"></script>
    <script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/js/aos.js"></script>
    <script src="/assets/js/main.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
<!-- End Scripts -->
</body>
</html>
