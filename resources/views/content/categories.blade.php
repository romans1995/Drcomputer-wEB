@extends('master')
@section('main_content')
<style>
p{
}
</style>


<div class="by-brand-section mb-80">
  @if($categories)
  <div class="container">

    <div class="row">
      <div class="col-md-6"> 
      <div class="section-title text-left mb-40"> 
      <h2 class="uppercase">By categories</h2>
      <h6>There are many variations of passages of categories available,</h6>
    </div>
  </div>
</div>


<div class="by-brand-product">
  <div class="row active-by-brand slick-arrow-1">
    <!-- single-brand-product start -->
    @foreach($categories as $category)
    <div class="col-xs-6">
      <div class="single-brand-product">
        <a hight="370px" width="300px" href="{{ url('shop/'.$category['curl'])}}"><img
            src="{{asset('images/' . $category['cimage']) }}" alt="{{$category['cname']}}"></a>
        <h3 class="brand-title text-gray">
          <a href="{{ url('shop/'.$category['curl'])}}">{{$category['cname']}}</a>
        </h3>

      </div>

    </div>
    @endforeach

    @else
    <div class="col-12">
      <p><i>sorry,we Dont have Items here :(</i></p>
    </div>
    @endif
  </div>
  @endsection