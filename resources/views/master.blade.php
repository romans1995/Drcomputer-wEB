 <script src="{{asset('lib/sub/js/vendor/jquery-3.1.1.min.js')}}">
    </script>
    <!-- Bootstrap framework js -->
    <script src="{{url('lib/sub/js/bootstrap.min.js')}}">
    </script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('lib/sub/lib/js/jquery.nivo.slider.js')}}">
    </script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('lib/sub/js/plugins.js')}}">
    </script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('lib/sub/js/main.js')}}"></script>
    <script src="{{asset('/js/script1.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    <script src="{{ asset('js/script.js') }}"> </script>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/icon/favicon.png')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('lib/sub/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('lib/sub/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('lib/sub/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('lib/sub/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('lib/sub/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('lib/sub/css/responsive.css')}}">
    <!-- Template color css -->
    <link href="{{asset('lib/sub/css/color/color-core.css')}}" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('css/searchcss.css')}}">

    <link rel=" stylesheet" href="{{asset('lib/sub/css/custom.css')}}">
    <link rel="stylesheet" style="width:100%" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">




    <!-- Modernizr JS -->
    <script src="{{asset('lib/sub/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <title>DRcomputer @if(!empty($page_title))| {{ $page_title }} @endif</title>
    <script>
        var BASE_URL = "{{url('')}}/"
    </script>
</head>

<body>
    <div class="wrapper" style="overflow-x:hidden !important; overflow-y:hidden;">

        <!-- START HEADER AREA -->
        <header class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="call-us">
                                <p class="mb-0 roboto">052-673-7759</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    @if(! Session::has('user_id'))
                                    <li>
                                        <a href="">
                                            <i class=" zmdi zmdi-account"></i>
                                            My Account
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{url('user/profile')}}">
                                            <i class=" zmdi zmdi-account"></i>
                                            {{ Session::get('user_firstName')}}
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="wishlist.html">
                                            <i class="zmdi zmdi-favorite"></i>
                                            Wish List (0)
                                        </a>
                                    </li>
                                    @if(! Session::has('user_id'))
                                    <li>
                                        <a href="{{url('user/signin')}}">
                                            <i class="zmdi zmdi-lock"></i>
                                            Login
                                        </a>
                                    </li>
                                    @else

                                    <li>
                                        <a href="{{url('user/logout')}}">
                                            <i class="zmdi zmdi-lock"></i>
                                            Logout
                                        </a>
                                    </li>
                                    @endif

                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- search -->
            <div class="well" style="
    width: 72%;
    position: relative;
    left: 50px;">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="input-group">
                    <span class="input-group-addon" style="color: white; background-color: black; font-weight:bold;">Products Search</span>
                    <input type="text" autocomplete="off" id="search" class="form-control input-lg" placeholder="Enter product name Here" onkeyup="filter()">
                </div>
                <div id="filtered-products" style="z-index: 9999999;
    position: absolute;
    box-shadow: 3px 5px 3px 0px;
    width: 96%;
    top: 35px;
    background-color: #FAFAFA;
    border-top-left-radius: 0 !important;
    border-top-left-radius: 0 !important;
    ">
                </div>
            </div>
        </div>
    </div>
            <!-- header-middle-area -->
            <div class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <a href="{{asset('lib/sub/index.html')}}">
                                        <img src="{{asset('lib/sub/img/logo/logo.png')}}" alt="main logo">
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-md-8 hidden-sm hidden-xs">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="{{url('')}}">Home</a>
                                        </li>

                                        {{-- shop --}}


                                        @if(! empty($menus))
                                        @foreach($menus as $menu)
                                        <li><a href="{{ url( $menu['murl'] ) }}">{{ $menu['link']}}</a></li>
                                        @endforeach
                                        @endif
                                        <li><a href="{{url('shop')}}">Shop</a></li>



                                        @if(! Session::has('user_id'))


                                        <li>
                                            <a href="{{url('user/signin')}}">Signin</a>
                                        </li>
                                        <li>
                                            <a href="{{url('user/signup')}}">Signup</a>
                                        </li>


                                        @else
                                        <li>
                                            <a href="{{url('user/profile')}}">my profile</a>
                                        </li>
                                        @if(Session::has('is_admin'))

                                        <li>
                                            <a href="{{url('cms/dashboard')}}">Admin panel</a>
                                        </li>
                                        @endif
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            
                           
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="search-top-cart  f-right">
                            <div class="total-cart-in">
                                <div class="cart-toggler">
                                    <a href="{{url('shop/cart')}}">
                                        @if( ! Cart::isEmpty())
                                        <span class="cart-total-number">{{ Cart::getTotalQuantity() }}</span>
                                        @endif
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </a>
                                   



                                <!-- single-cart -->


                                <!-- START MOBILE MENU AREA -->
                                <div class="mobile-menu-area hidden-lg hidden-md">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="mobile-menu">
                                                    <nav id="dropdown">
                                                        <ul>
                                                            <li><a href="{{ url('')}}">Home</a>

                                                            </li>

                                                            <li>
                                                                <a href="{{url('shop')}}">Shop</a>
                                                            </li>

                                                            <li>
                                                                <a href=" {{url('user/signin')}}">signin</a>
                                                            </li>
                                                            @if(! empty($menus))
                                                            @foreach($menus as $menu)
                                                            <li><a
                                                                    href="{{ url( $menu['murl'] ) }}">{{ $menu['link']}}</a>
                                                            </li>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                               
                                <!-- END MOBILE MENU AREA -->
                                <!-- category navbar -->
                                
                             
                                <!--  mobile category navbar -->
                                
  
                                <nav class="navbar navbar-expand-lg navbar-dark primary-color">

<!-- Navbar brand -->

        </header>

        <!-- END HEADER AREA -->



        <!-- START SLIDER AREA -->
                                       
                @yield('main_content')
            </div>
        </main>

        <!-- START FOOTER AREA -->
        <footer id="footer" class="footer-area footer-2">
            <div class="footer-top footer-top-2 text-center ptb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="footer-logo">
                                <img src="img/logo/logo.png" alt="">
                            </div>
                            <ul class="footer-menu-2">
                            <ul class="main-menu text-center">
                                        <li><a href="{{url('')}}">Home</a>
                                        </li>

                                        @if(! empty($menus))
                                        @foreach($menus as $menu)
                                        <li><a href="{{ url( $menu['murl'] ) }}">{{ $menu['link']}}</a></li>
                                        @endforeach
                                        @endif
                                        <li><a href="{{url('shop')}}">Shop</a></li>

                                        @if(! Session::has('user_id'))


                                        <li>
                                            <a href="{{url('user/signin')}}">Signin</a>
                                        </li>
                                        <li>
                                            <a href="{{url('user/signup')}}">Signup</a>
                                        </li>


                                        @else
                                        <li>
                                            <a href="{{url('user/profile')}}">my profile</a>
                                        </li>
                                        @if(Session::has('is_admin'))

                                        <li>
                                            <a href="{{url('cms/dashboard')}}"> <font size="3" color="red">Admin panel</font></a>
                                        </li>
                                        @endif

                                        @endif


                                    </ul>
                                </nav>
                            </div>
                          

                            </ul>                                                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom footer-bottom-2 text-center gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="copyright-text copyright-text-2">
                                <p>&copy; <a href="#" target="_blank">DRcomputer</a> <?php echo date("Y"); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <ul class="footer-social footer-social-2">
                                <li>
                                    <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                </li>
                             
                               
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <ul class="footer-payment">
                                <li>
                                    <a href="#"><img src="{{asset('lib/sub/img/payment/1.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('lib/sub/img/payment/2.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('lib/sub/img/payment/3.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('lib/sub/img/payment/4.jpg')}}" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
      
        <!-- END FOOTER AREA -->

        <!-- START QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product clearfix">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="{{url('lib/sub/img/product/quickview.jpg')}}">
                                    </div>
                                </div><!-- .product-images -->


                                <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
                                        <div class="numbers-row">
                                            <input type="number" id="french-hens" value="3">
                                        </div>
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="quick-desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                    est tristique auctor. Donec non est at libero.
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons clearfix">
                                            <li>
                                                <a class="facebook"
                                                    href="https://www.facebook.com/profile.php?id=100005274872115"
                                                    target="_blank" title="Facebook">
                                                    <i class="zmdi zmdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="#" target="_blank" title="Google +">
                                                    <i class="zmdi zmdi-google-plus"></i>
                                                </a>
                                            </li>


                                            <li>
                                                <a class="rss" href="#" target="_blank" title="RSS">
                                                    <i class="zmdi zmdi-rss"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->

    </div>    
    <script src="{{asset('lib/sub/js/vendor/jquery-3.1.1.min.js')}}">
    </script>
    <!-- Bootstrap framework js -->
    <script src="{{url('lib/sub/js/bootstrap.min.js')}}">
    </script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('lib/sub/lib/js/jquery.nivo.slider.js')}}">
    </script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('lib/sub/js/plugins.js')}}">
    </script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('lib/sub/js/main.js')}}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/script.js') }}"> </script>
    @if(Session::has('sm'))
    <script>
        toastr.options.positionClass = 'toast-bottom-center';
    toastr.success("{{Session::get('sm')}}");
    </script>
    @endif


</body>

</html>