@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Add New Menu Link</h1>

</div>
<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/menu') }}" method="POST" novalidate="novalidate" autocomplete="off">
      @csrf()
      <div class="form-group">
        <label for="link">Menu Link:</label>
        <input class="form-control source-text" type="text" name="link" id="link" value="{{old('link')}}">
        <span class="text-danger">{{ $errors->first('link') }}</span>
      </div>
      <div class="form-group">
        <label for="link">Menu Link Url:</label>
        <input class="form-control target-text" type="text" name="url" id="url" value="{{old('url')}}">
        <span class="text-danger">{{$errors->first('url')}}</span>
      </div>
      <div class="form-group">
        <label for="link">Menu Link Title:</label>
        <input class="form-control " type="text" name="title" id="title" value="{{old('title')}}">
        <span class="text-danger">{{ $errors->first('title')}}</span>
      </div>
      <input type="submit" value="save Menu" name="submit" class="btn btn-primary">
      <a class="btn btn-secondary" href="{{ url('cms/menu')}}">Cancel</a>
    </form>
  </div>
</div>
@endsection