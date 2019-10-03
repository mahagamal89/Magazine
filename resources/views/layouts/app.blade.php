


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- the new body !-->
        <div id="app">
        <div class="top_header hidden-xs">

                       
                <header>
       
                        <!-- top header -->
                        <div class="top_banner_wrap mt-0 text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="header-logo">  <!-- logo -->
                                            <a href="index.html">
                                                <img class="td-retina-data img-responsive img-fluid" src="/images/main_logo.jpeg" alt="" style="width:280px; height:90px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-none d-md-block">
                                        <div class="header-banner">
                                            <a href="#"><img class="td-retina img-responsive img-fluid" src="/images/transparent_logo.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- main navber -->
                                <nav class="navbar navbar-expand-lg navbar-light py-0">
                                                
                                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav">
                                            <li class="navbar-list-item nav-item"><a href="/" class="nav-link category01">الصفحة الرئيسية</a></li>
                                            <li class="navbar-list-item nav-item"><a href="{{ route('magazines.index')}}" class="nav-link category02">الاعداد السابقة</a></li>
                                            <li class="navbar-list-item nav-item"><a href="/articles_title" class="nav-link category02"> عنواين المقالات</a></li>
                                            <li class="navbar-list-item nav-item"><a href="/authors" class="nav-link category03">الكتاب </a></li>
                                            <li class="navbar-list-item nav-item"><a href="#" class="nav-link category02">المكتبة</a></li>
                                            <li class="navbar-list-item nav-item"><a href="/sites" class="nav-link category02">مواقع تخصك</a></li>
                                            <li class="navbar-list-item nav-item"><a href="/sponsors" class="nav-link category02">الرعاة</a></li>
                                           @if(Auth::check())
                                            @if(Auth::user()->is_admin == 0)
                                            <li class="navbar-list-item nav-item"><a href="/contact" class="nav-link category04">تواصل معنا </a>  </li>
                                            @endif
                                            @endif
                                            <li class="navbar-list-item nav-item"><a href="{{route('create_article')}}" class="nav-link category05">اضافة مقالة</a></li>
                                            @if(Auth::check())
                                            <li class="navbar-list-item nav-item"><a href="{{route('profile')}}" class="nav-link category07">الصفحة الشخصية</a></li>
                                            @endif
                                            @if(Auth::check())
                                            @if(Auth::user()->is_admin == 1)
                                            <li class="navbar-list-item nav-item"><a class="nav-link category03" href="/admin">لوحة الادارة</a></li>
                                            @endif
                                            @endif
    
    
                                        </ul>
                                                        <ul class="navbar-nav mr-auto">
                                                    @guest
                                                    <li class="nav-item navbar-list-item">
                                                        <a class="nav-link  category04 " href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                                                    </li>
                                                    <li class="nav-item navbar-list-item">
                                                        <a class="nav-link category01" href="{{ route('register') }}">{{ __('تسجيل ') }}</a>
                                                    </li>
                                                @else
                                                    <li class="nav-item dropdown navbar-list-item">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{Auth::user()->first_name}} {{Auth::user()->last_name}} <span class="caret"></span>
                                                        </a>
                            
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                                                {{ __('تسجيل الخروج') }}
                                                            </a>
                            
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>
                                                @endguest
                                                </ul>
                                                </div>
                                </nav>
                            </div>
                        </div>
                    </header>
                                              <!-- Authentication Links -->
         
                
                                   
                                
                            </div>
                        </div>
                        @include('includes.messages')

     
            @yield('content')
            
            
      
    

        <div class="sub-footer">  <!-- sub footer -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p><a href="" class="color-1"></a> موضوع | جميع الحقوق محفوظة 2019</p>
                   
                    </div>
                </div>
            </div>
        </div>

</body>
</html>