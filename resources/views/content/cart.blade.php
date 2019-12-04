@extends('master')
@section('main_content')


<div class="col-md-10 col-sm-12">
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- shopping-cart start -->

    <div class="tab-pane active" id="shopping-cart">
      <div class="shopping-cart-content">
        <form action="#">
          <div class="table-content table-responsive mb-50">
            @if($cart)
            <table class="text-center">
              <thead>
                <tr>
                  <th class="product-thumbnail">product</th>
                  <th class="product-price">price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-subtotal">total</th>
                  <th class="product-remove">remove</th>
                </tr>
              </thead>
              <tbody>
                <!-- tr -->
                <tr>
                  @foreach ($cart as $item)

                  <td class="product-thumbnail">
                    <div class="pro-thumbnail-img">
                      <img src="{{ asset('images/'. $item['attributes']['image'])}}" alt="">
                    </div>
                    <div class="pro-thumbnail-info text-left">
                      <h6 class="product-title-2">
                        <a href="">{{$item['name'] }}</a>
                      </h6>

                    </div>
                  </td>
                  <td class="product-price">ILS {{ $item['price'] }}</td>
                  <td class="product-quantity">

                    <a href="{{ url('shop/update-cart?pid=' . $item['id'] .'&op=minus') }}"><i
                        class="fas fa-minus"></i></a>
                    <input type="text-center" size="1" value="{{ $item['quantity']}}">
                    <a href="{{ url('shop/update-cart?pid=' .$item['id'] .'&op=plus')}}"> <i
                        class="fas fa-plus"></i></a></td>



          </div>

          </td>




          </td>
          <td class="product-subtotal">ILS {{ $item['price'] * $item['quantity'] }}</td>
          <td class="product-remove">
            <a href="{{ url('shop/delete-item?pid=' . $item['id'])}}"><i class="zmdi zmdi-close"></i></a>
          </td>
          </tr>
          @endforeach
          </tbody>

          </table>
          <div class="col-md-6">
            <div class="payment-details box-shadow p-30 mb-50">
              <h6 class="widget-title border-left mb-20">payment details</h6>
              <table>

                <td class="order-total">Order Total</td>
                <td class="order-total-price">ILS {{ Cart::getTotal() }}</td>
                </tr>
              </table>
            </div>
          </div>
      </div>

      <p><a href=" {{url('shop/save-order')}}" class="btn btn-primary"> !ORDER NOW!</a></p>


      <div class="d-flex flex-row-reverse bd-highlight">
        <a href="{{ url('shop/cart-clear')}}" class="btn btn-secondary p-2 bd-highlight">Clear Cart</a>
      </div>
      {{-- else of the if  --}}
      @else

      <h1><i>No items in cart....</i></h1>
      @endif
    </div>
  </div>
  @endsection