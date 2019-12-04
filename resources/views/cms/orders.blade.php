@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">orders</h1>
</div>
@if($orders)
<table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th>User</th>
      <th>Total</th>
      <th>Order Details</th>
      <th>Date</th>

    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <td>{{$order->firstName}} {{$order->lastName}}</td>
      <td></td>
      <td>{{$order->total}}</td>
      <td>

        <ul>
          @foreach(unserialize($order->data) as $row)


          <li>{{ $row['name']}} ,price: ${{ $row['price'] }},Quantity: {{ $row['quantity']}}
          </li>
          @endforeach
        </ul>
      </td>


      <td>{{ date('d/m/Y H:i:s',strtotime($order->created_at)) }}</td>

    </tr>

    @endforeach
  </tbody>
</table>
@endif
@endsection