@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Edit this Category</h1>

</div>
<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/categories/' . $item['id']) }}" enctype="multipart/form-data" method="POST"
      novalidate="novalidate" autocomplete="off">
      @csrf()
      {{ method_field('PUT') }}
      <input type="hidden" name="item_id" value="{{ $item['id'] }}">
      <div class="form-group">
        <label for="name">Category Name:</label>
        <input class="form-control source-text" type="text" name="name" id="name" value="{{$item['cname']  }}">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group">
        <label for="link">Category Url:</label>
        <input class="form-control target-text" type="text" name="url" id="url" value="{{$item['curl'] }}">
        <span class="text-danger">{{$errors->first('url')}}</span>
      </div>

      <div class="form-group">
        <label for="article"> Article:</label>
        <textarea class="form-control" name="article" id="article" cols="30"
          rows="10">{{$item['cdescription']}}</textarea>
        <span class="text-danger">{{ $errors->first('article')}}</span>
      </div>
      <div class="form-froup">
        <label for="">Image category</label><br>
        <img hight="80" src="{{asset('images/' .$item['cimage']) }}" alt="" class="img-thumbnail">
      </div>



      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">change category Image</span>
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


      <input type="submit" value="Update Category" name="submit" class="btn btn-primary">
      <a class="btn btn-secondary" href="{{ url('cms/categories')}}">Cancel</a>

    </form>

  </div>
</div>

@endsection