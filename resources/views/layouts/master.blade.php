<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf" value="{{ csrf_token() }}">
    <link href="{{asset($siteinfo[0]->logo)}}" rel="apple-touch-icon">
    <link href="{{asset($siteinfo[0]->logo)}}" rel="icon">
    <meta name="author" content="">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>{{$siteinfo[0]->site_name}}</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/ps-icon/style.css')}}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/Magnific-Popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/revolution/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/revolution/css/layers.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/plugins/revolution/css/navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- Custom-->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
<body class="ps-loading">
<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>{{$siteinfo[0]->address}}  -  Hotline: +880-{{$siteinfo[0]->phone_1}} @if($siteinfo[0]->phone_2) - +880-{{$siteinfo[0]->phone_2}} @endif</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">
                        <!--login modal-->
                        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="login">Login</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row text-center mb-10">
                                            <div class="col-sm-12">
                                                <h4>Login with </h4>
                                            </div>
                                        </div>
                                        <div class="row text-center mb-15">
                                            <div class="col-sm-12">
                                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary">Facebook</a>
                                                <a href="{{ url('/auth/redirect/google') }}" class="btn btn-success">Google</a>
                                            </div>
                                        </div>
                                       <form method="post" action="{{route('login')}}">
                                           <div class="row text-center mb-10">
                                               <div class="col-sm-12">
                                                   <h4>Or </h4>
                                               </div>
                                           </div>
                                           @csrf
                                           <div class="form-group">
                                               <label for="email">Email address</label>
                                               <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autofocus>
                                           </div>
                                           <div class="form-group">
                                               <label for="password">Password</label>
                                               <input type="password" class="form-control" id="password" name="password">
                                           </div>
                                           <div class="form-group">
                                               <a href="{{ route('password.request') }}">
                                                   Forgot password?
                                               </a>
                                           </div>
                                    </div>
                                    <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end login modal-->
                        <!--reg modal-->
                        <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="reg" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button  data-dismiss="modal" class="close"  aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="login">Registation</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row text-center mb-10">
                                            <div class="col-sm-12">
                                                <h4>Sign up with </h4>
                                            </div>
                                        </div>
                                        <div class="row text-center mb-15">
                                            <div class="col-sm-12">
                                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary">Facebook</a>
                                                <a href="{{ url('/auth/redirect/google') }}" class="btn btn-success">Google</a>
                                            </div>
                                        </div>
                                        <form method="post" action="{{ route('register') }}" >
                                            <div class="row text-center mb-10">
                                                <div class="col-sm-12">
                                                    <h4>Or </h4>
                                                </div>
                                            </div>
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info">Sign up</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end registaion modal-->
                        @guest
                            <a href="#" data-toggle="modal" data-target="#login">Login</a>
                            <a href="#" data-toggle="modal" data-target="#reg">Regiser</a>
                        @else
                            <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Setting</a></li>
                                    <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form></li>
                                </ul>
                            </div>
                            <a href="{{ url('wishlist') }}">Whishlist</a>
                        @endguest
                        <a href="{{ url('compare') }}">Compare</a>

                       </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="{{url("/")}}"><img src="{{asset($siteinfo[0]->logo)}}" alt=""></a></div>
            </div>
            <div class="navigation__column center">
                <ul class="main-menu menu">
                    <li class="menu-item"><a href="index.html">Home</a></li>
                    <li class="menu-item "><a href="#">Men</a></li>
                    <li class="menu-item"><a href="#">Women</a></li>
                    <li class="menu-item"><a href="#">Kids</a></li>
                    <li class="menu-item"><a href="#">News</a></li>
                    <li class="menu-item"><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="navigation__column right">
                <form class="ps-search--header" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="Search Product…">
                    <button><i class="ps-icon-search"></i></button>
                </form>
                <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i>20</i></span><i class="ps-icon-shopping-cart"></i></a>
                    <div class="ps-cart__listing">
                        <div class="ps-cart__content">
                            <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                                <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="{{asset('public/frontend/images/cart-preview/1.jpg')}}" alt=""></div>
                                <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">Amazin’ Glazin’</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                            <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                                <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="{{asset('public/frontend/images/cart-preview/2.jpg')}}" alt=""></div>
                                <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">The Crusty Croissant</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                            <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                                <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="{{asset('public/frontend/images/cart-preview/3.jpg')}}" alt=""></div>
                                <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">The Rolling Pin</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-cart__total">
                            <p>Number of items:<span>36</span></p>
                            <p>Item Total:<span>£528.00</span></p>
                        </div>
                        <div class="ps-cart__footer"><a class="ps-btn" href="cart.html">Check out<i class="ps-icon-arrow-left"></i></a></div>
                    </div>
                </div>
                <div class="menu-toggle"><span></span></div>
            </div>
        </div>
    </nav>
</header>
@if (count($coupon)>0)
    <div class="header-services">
        <div class="ps-services owl-slider" data-owl-auto="true" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-mousedrag="on" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-loop="true" data-owl-item="1" data-owl-dots="false" data-owl-speed="7000" data-owl-nav="true"   data-owl-gap="0">
            @foreach ($coupon as $row )
                <p class="ps-service"><strong>Coupon</strong>: Use {{$row->code}} And Get {{$row->discount}}% Off</p>
            @endforeach
        </div>
    </div>
@endif
<main class="ps-main">
    @yield('content')
    <div class="ps-subscribe mt-20">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                    <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                    <form class="ps-subscribe__form" action="{{route('store.newsletter')}}" method="post">
                        @csrf
                        <input class="form-control" type="text" placeholder="" name="email">
                        <button>Sign up now</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                    <p>...and receive Exclusive news.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-footer">
        <div class="ps-footer__content">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--info">
                            <header>
                                <a class="ps-logo" href="{{url('/')}}"><img src="{{asset($siteinfo[0]->logo)}}" alt=""></a>
                            </header>
                            <footer>
                                <p>{!! $siteinfo[0]->about!!} </p>

                            </footer>
                        </aside>
                    </div>
                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Address Office</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <p><strong>{{$siteinfo[0]->address}}</strong></p>
                                    <p>Email: <a href='mailto:{{$siteinfo[0]->email}}'>{{$siteinfo[0]->email}}</a></p>
                                    <p>Phone: +880 {{$siteinfo[0]->phone_1}} </p>
                                </ul>
                            </footer>
                        </aside>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Find Our store</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--link">
                                    <li><a href="#">Coupon Code</a></li>
                                    <li><a href="#">SignUp For Email</a></li>
                                    <li><a href="#">Site Feedback</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Get Help</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Shipping and Delivery</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Payment Options</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                    <!--
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Products</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Accessries</a></li>
                                    <li><a href="#">Football Boots</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                -->
                </div>
            </div>
        </div>
        <div class="ps-footer__copyright">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <p>&copy; <a href="{{url('/')}}">{{$siteinfo[0]->site_name}}</a>, Inc. All rights Resevered. Develop by <a href="#"> Abdullah Zahid</a></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <ul class="ps-social">
                            <li><a href="{{url($siteinfo[0]->facebook_link)}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href='mailto:{{$siteinfo[0]->email}}'><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{url($siteinfo[0]->instagram_link)}}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- JS Library-->
<script type="text/javascript" src="{{asset('public/frontend/plugins/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/owl-carousel/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{asset('public/frontend/plugins/imagesloaded.pkgd.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/jquery.matchHeight-min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/slick/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/elevatezoom/jquery.elevatezoom.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<!-- Custom scripts-->
<script type="text/javascript" src="{{asset('public/frontend/js/main.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script>
        @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }

    @endif
</script>
<script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
<script>
    $(document).on("click", "#return", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to Return?",
            text: "Once Return,You will return your money!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Cancel");
                }
            });
    });
</script>

<script>
    $('.addwishlist').on('click',function(){
        var id = $(this).data('id');
        if(id){
            $.ajax({
                url:"{{url('add/wishlist/')}}/"+id,
                type:'GET',
                datatype:'json',
                success:function (data) {
                    if ($.isEmptyObject(data.error)){
                        toastr.success( data.success );
                    }else{
                        toastr.error( data.error );
                    }
                },
            })
        }else{
            alert('danger');
        }
    })

    $('.addcart').on('click',function(){
        var id = $(this).data('id');
        if(id){
            $.ajax({
                url:"{{url('add/cart/')}}/"+id,
                type:'GET',
                datatype:'json',
                success:function (data) {
                    if ($.isEmptyObject(data.error)){
                        toastr.success( data.success );
                    }else{
                        toastr.error( data.error );
                    }
                },
            })
        }else{
            alert('danger');
        }
    })
    $('.addCompare').on('click',function(){
        var id = $(this).data('id');
        if(id){
            $.ajax({
                url:"{{url('add/compare/')}}/"+id,
                type:'GET',
                datatype:'json',
                success:function (data) {
                    if ($.isEmptyObject(data.error)){
                        toastr.success( data.success );
                    }else{
                        toastr.error( data.error );
                    }
                },
            })
        }else{
            alert('danger');
        }
    })
</script>

</body>
</html>
