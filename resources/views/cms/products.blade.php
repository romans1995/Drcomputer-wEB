@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Products</h1>
</div>
<p><a href="{{ url('cms/products/create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Add new
    Product</a>
</p>
@if($products)
<table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th>Product title</th>
      <th>Product Lead Image</th>
      <th>Updated At</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td>{{$product['ptitle']}}</td>
      <td><img width="50" src="{{asset('images/'.$product['pimage'])}}"></td>
      <td>{{ date('d/m/Y H:i:s',strtotime($product['updated_at'])) }}</td>
      <td>
        <a href="{{  url('cms/products/' . $product['id'] . '/edit')}}"><i class="fas fa-pen"></i>Edit</a>|
        <a href="{{  url('cms/products/'.$product['id'])}}"><i class="fas fa-eraser"></i>Delete</a>

      </td>
    </tr>

    @endforeach
  </tbody>
</table>

@endif
@endsection