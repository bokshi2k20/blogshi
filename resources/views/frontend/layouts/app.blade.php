
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>{{ env('APP_NAME') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Site Icons -->

    <link rel="shortcut icon" href="{{ asset('uploads/logos/' . logo()) }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('uploads/logos/' . logo()) }}">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    {{-- {{asset('frontend/')}} --}}
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('frontend/style.css')}}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{asset('frontend/css/colors.css')}}" rel="stylesheet">

    <!-- Version Garden CSS for this template -->
    <link href="{{asset('frontend/css/version/garden.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form  action="{{route('frontend.post.search')}}" method="GET" class="form-inline">
                        @csrf
                        <input type="text" name="search" class="form-control" placeholder="What you are looking for?">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->

        <div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                        <div class="topsocial">
                            <a href="{{ social()->facebook ?? null  }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="{{ social()->pinterest ?? null  }}" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="{{ social()->twitter ?? null  }}" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="{{ social()->flickr ?? null  }}" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a>
                            <a href="{{ social()->instagram ?? null  }}" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="{{ social()->youtube ?? null  }}" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                        </div><!-- end social -->
                    </div><!-- end col -->

                    <div class="col-lg-4 hidden-md-down">
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="topsearch text-right">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-search"></i> Search</a>
                                <form action="{{ route('translate') }}" method="GET" id="translate_form">
                                    @csrf
                                <select name="translate" class="form-control d-none" id="translate_select">
                                    <option value="bn">BN</option>
                                    <option value="en">EN</option>
                                    <option value="hi">Hi</option>
                                </select>
                            </form>


                           @auth
                            <a href="{{route('dashboard')}}" class="ml-3"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                           @endauth

                           @guest
                               <a href="{{ route('login') }}" class="ml-3"><i class="fa fa-user"></i> Login</a>
                           @endguest
                        </div><!-- end search -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->

        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            {{-- {{asset('frontend/')}} --}}
                            <a href="{{route('homepage')}}"><img src="{{ asset('uploads/logos/' . logo()) }}" width="80" alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu" aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="{{route('homepage')}}">Home</a>
                            </li>


                            
                            @forelse(menucategories()->take(5) as $menucategory)
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="{{route('category')}}">{{$menucategory->title}}</a>
                            </li>
                            @empty
                            @endforelse



                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->



        @yield('content')



        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="{{ route('homepage') }}"><img src="{{asset('uploads/logos/'. logo())}}" width="100" alt="" class="img-fluid"></a>
                                <p>{{short_description()}}</p>
                                <div class="social">
                                    <a href="{{ social()->facebook ?? null }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a href="{{ social()->twitter ?? null  }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="{{ social()->youtube ?? null  }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    <a href="{{ social()->flickr ?? null  }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a>
                                    <a href="{{ social()->instagram ?? null  }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="{{ social()->pinterest ?? null  }}" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form class="form-inline">
                                        <input type="hidden" id="url" value="{{route('subscribe')}}">
                                        <input type="email" id="subscribe_email" required name="email" class="form-control" placeholder="Enter your email address">
                                        <button type="button" onclick="Subscribe()" id="sbc-btn" value="Subscribe" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy; {{ Carbon\Carbon::now()->year }} {{ footer_credit() }}</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/tether.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>

</body>
</html>