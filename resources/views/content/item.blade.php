@extends('master')
@section('main_content')

<div class="shop-section mb-80">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-xs-12">
        <!-- single-product-area start -->
        <div class="single-product-area mb-80">
          <div class="row">
            <!-- imgs-zoom-area start -->
            <div class="col-md-5 col-sm-5 col-xs-12">
              <div class="imgs-zoom-area">
                <img id="zoom_03" src="{{ asset('images/'. $product['pimage'])}}"
                  data-zoom-image="{{ asset('images/'. $product['pimage'])}}" alt="">
                <div class="row">
                  <div class="col-xs-12">
                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                      <div class="p-c">
                        <a href="#" data-image="{{ asset('images/'. $product['pimage'])}}"
                          data-zoom-image="{{ asset('images/'. $product['pimage'])}}">
                          <img class="zoom_03" src="{{ asset('images/'. $product['pimage'])}}" alt="">
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- imgs-zoom-area end -->
            <!-- single-product-info start -->
            <div class="col-md-7 col-sm-7 col-xs-12">
              <div class="single-product-info">
                <h3 class="text-black-1">{{$product['ptitle']}}</h3>
                <h6 class="brand-name-2">brand name</h6>
                <!--  hr -->
                <hr>
                <!-- single-pro-color-rating -->
                <div class="single-pro-color-rating clearfix">
                  <div class="sin-pro-color f-left">
                    <p class="color-title f-left">Color</p>
                    <div class="widget-color f-left">
                      <ul>
                        <li class="color-1"><a href="#"></a></li>
                        <li class="color-2"><a href="#"></a></li>
                        <li class="color-3"><a href="#"></a></li>
                        <li class="color-4"><a href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="pro-rating sin-pro-rating f-right">
                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                    <span class="text-black-5">( 27 Rating )</span>
                  </div>
                </div>
                <!-- hr -->
                <hr>
                <!-- plus-minus-pro-action -->
                <div class="plus-minus-pro-action clearfix">
                  <div class="sin-plus-minus f-left clearfix">
                    <p class="color-title f-left">Qty</p>
                    <div class="cart-plus-minus f-left">
                      <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                    </div>
                  </div>
                  <div class="sin-pro-action f-right">
                    <ul class="action-button">
                      <li>
                        <a href="#" title="Wishlist" tabindex="0"><i class="zmdi zmdi-favorite"></i></a>
                      </li>
                      <li>
                        <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview" tabindex="0"><i
                            class="zmdi zmdi-zoom-in"></i></a>
                      </li>
                      <li>
                        <a href="#" title="Compare" tabindex="0"><i class="zmdi zmdi-refresh"></i></a>
                      </li>
                      @if(!Cart::get($product['id']) )

                      <li>
                        <a data-pid="{{ $product['id'] }}" title="Add to cart" tabindex="0"><i
                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                      </li>
                      @else

                      <li>
                        <a disabled='disabled' title="Add to cart" tabindex="0"><i
                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
                <!-- plus-minus-pro-action end -->
                <!-- hr -->
                <!-- single-product-price -->
                 <h3 class="pro-price">Price: ILS {{ $product['price'] }}</h3> 
                <!--  hr -->

                <div>
                  <a href="{{url('shop/cart')}}" class="button extra-small button-black" tabindex="-1">
                    <span class="text-uppercase">To Cart</span>
                  </a>
                </div>

                <div>
                  @if(!Cart::get($product['id']) )
                  <a data-pid="{{ $product['id'] }}"
                    class="button extra-small button-black  button-black add-to-cart-btn" tabindex="-1">
                    <span class="text-uppercase">add to cart</span>
                  </a>
                </div>
                @else
                <div>
                  <a disabled='disabled' class="button extra-small button-black  button-black add-to-cart-btn"
                    tabindex="-1">
                    <span class="text-uppercase">IN CART</span>
                  </a>
                </div>
                @endif
              </div>
            </div>
            <!-- single-product-info end -->
          </div>
          <!-- single-product-tab -->
          <div class="row">
            <div class="col-md-12">
              <!-- hr -->
              <hr>
              <div class="single-product-tab">
                <ul class="reviews-tab mb-20">
                  <li class="active"><a href="#description" data-toggle="tab">description</a></li>
                  <li><a href="#information" data-toggle="tab">information</a></li>
                  <li><a href="#reviews" data-toggle="tab">reviews</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="description">
                    <p>{!! $product['particle'] !!}</p>

                    <div role="tabpanel" class="tab-pane" id="information">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, neque fugit inventore quo
                        dignissimos est iure natus quis nam illo officiis, deleniti consectetur non ,aspernatur.</p>
                      <p>rerum blanditiis dolore dignissimos expedita consequatur deleniti consectetur non
                        exercitationem.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="reviews">
                      <!-- reviews-tab-desc -->
                      <div class="reviews-tab-desc">
                        <!-- single comments -->
                      </div>
                      <!-- single comments -->
                      

                      @endsection