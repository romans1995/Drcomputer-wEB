@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Categories</h1>
</div>
<p><a href="{{ url('cms/categories/create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Add new
    Category</a>
</p>
@if($categories)
<table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th>category title</th>
      <th>Category Lead Image</th>
      <th>Updated At</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <td>{{$category['cname']}}</td>
      <td><img width="50" src="{{asset('images/'.$category['cimage'])}}"></td>
      <td>{{ date('d/m/Y H:i:s',strtotime($category['updated_at'])) }}</td>
      <td>
        <a href="{{  url('cms/categories/' . $category['id'] . '/edit')}}"><i class="fas fa-pen"></i>Edit</a>|
        <a href="{{  url('cms/categories/'.$category['id'])}}"><i class="fas fa-eraser"></i>Delete</a>

      </td>
    </tr>

    @endforeach
  </tbody>
</table>
@endif
@endsection