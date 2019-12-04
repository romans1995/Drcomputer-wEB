@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Add New Category</h1>

</div>
<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/categories') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate"
      autocomplete="off">
      @csrf()
      <div class="form-group">
        <label for="name">Category Name:</label>
        <input class="form-control source-text" type="text" name="name" id="name" value="{{old('name')}}">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group">
        <label for="link">Category Url:</label>
        <input class="form-control target-text" type="text" name="url" id="url" value="{{old('url')}}">
        <span class="text-danger">{{$errors->first('url')}}</span>
      </div>

      <div class="form-group">
        <label for="article"> Article:</label>
        <textarea class="form-control" name="article" id="article" cols="30" rows="10">{{old('article')}}</textarea>
        <span class="text-danger">{{ $errors->first('article')}}</span>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input name="image" type="file" class="custom-file-input" id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">
            Choose category image</label>
        </div>
      </div>
      <div class="form-group">
        <span class="text-danger">{{ $errors->first('image')}}</span>
      </div>


      <input type="submit" value="Save Category" name="submit" class="btn btn-primary">
      <a class="btn btn-secondary" href="{{ url('cms/categories')}}">Cancel</a>

    </form>

  </div>
</div>

@endsection