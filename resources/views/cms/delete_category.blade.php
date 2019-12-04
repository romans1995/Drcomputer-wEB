@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">are you sure you want to delete ?</h1>
</div>
<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/categories/' . $item_id) }}" method="POST">
      @csrf()
      {{ method_field('DELETE') }}
      <input type="submit" value="DELETE" name="submit" class="btn btn-danger">
      <a href="{{  url('cms/categories') }}" class="btn btn-secondary">CANCEL</a>
    </form>
  </div>
</div>

@endsection