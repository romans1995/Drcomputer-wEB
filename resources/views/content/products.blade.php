
@extends('master')
@section('main_content')


<style>
.action-button>li>a {

  font-size: 26px;
}



</style>
@if($products)
<div class="short-by- f-right text-center">
    <span>Sort Price</span>
    <a href="{{url('shop/'  .$curl . '?price=up')}}" class='btn btn-link'>From High to Low</a>|
<a href="{{url('shop/'  .$curl . '?price=down')}}" class='btn btn-link' style='color:purple;'>From Low to High</a>
</div>




@foreach($products as $product)

<h1 {{$products[0]->cname}}>{{ $product->ptitle}}</h1>


<div class="col-md-4 col-sm-4 col-xs-12">
  

  <div class="product-item">
    <div class="product-img">

      <a href="{{ url('shop/' .$curl .'/' .$product->purl) }}">
        <img hight="270" width="300" href="{{ url('shop/' .$curl .'/' .$product->purl)}}"
          src="{{asset('images/'.$product->pimage)}}" alt="{{ $product->ptitle}} product image">
      </a>
    </div>
    <div class="product-info">

      <h6 class="product-title">
        <a href="{{ url('shop/' .$curl .'/' .$product->purl)}}">{{ $product->ptitle}} </a>
      </h6>
      <div class="pro-rating">
        <a href="#"><i class="zmdi zmdi-star"></i></a>
        <a href="#"><i class="zmdi zmdi-star"></i></a>
        <a href="#"><i class="zmdi zmdi-star"></i></a>
        <a href="#"><i class="zmdi zmdi-star"></i></a>
        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
      </div>
      <h3 class="pro-price">${{ $product->price }}</h3>
      <ul class="action-button">
        <li>
          <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
        </li>
        <li>
          <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i
              class="zmdi zmdi-zoom-in"></i></a>
        </li>


        <li>
          @if(!Cart::get($product->id) )
          <a data-pid="{{ $product->id }}" title="Add to cart" class="add-to-cart-btn"><i
              class="zmdi zmdi-shopping-cart-plus "></i></a>
        </li>
        @else
        <li>

          <a disabled="disabled" title="Add to cart" class="add-to-cart-btn"><i
              class="zmdi zmdi-shopping-cart-plus add-to-cart-btn">in
            cart</i></a>
        </li>
        @endif
      </ul>
    </div>
  </div>

</div>
@endforeach
<div class="row">
  <div class="col-12">
    {{ $products->links() }}
  </div>
</div>
@endif

@endsection
