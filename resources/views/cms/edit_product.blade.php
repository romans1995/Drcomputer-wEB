@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Edit this Product</h1>

</div>
<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/products/' . $item['id']) }}" enctype="multipart/form-data" method="POST"
      novalidate="novalidate" autocomplete="off">
      @csrf()
      {{ method_field('PUT') }}
      <input type="hidden" name="item_id" value="{{ $item['id'] }}">

      <div class="form-froup">
        <label for="categorie_id">Category:</label>
        <select class="form-control" name="categorie_id" id="categorie-id">

          @foreach($categories as $category)
          <option @if($item['categorie_id']==$category['id']) selected="selected" @endif value="{{  $category['id'] }}">
            {{$category['cname']}}</option>
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('categorie_id') }}</span>
      </div>

      <div class="form-group">
        <label for="title">Product Title:</label>
        <input class="form-control source-text" type="text" name="title" id="title" value="{{$item['ptitle']}}">
        <span class="text-danger">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group">
        <label for="url">Product Url:</label>
        <input class="form-control target-text" type="text" name="url" id="url" value="{{$item['purl']}}">
        <span class="text-danger">{{$errors->first('url')}}</span>
      </div>
      <div class="form-group">
        <label for="price">Product price:</label>
        <input class="form-control  " type="text" name="price" id="price" value="{{$item['price']}}">
        <span class="text-danger">{{$errors->first('price')}}</span>
      </div>

      <div class="form-group">
        <label for="article"> Description:</label>
        <textarea class="form-control" name="article" id="article" cols="30" rows="10">{{$item['particle']}}</textarea>
        <span class="text-danger">{{ $errors->first('article')}}</span>
      </div>
      <div class="form-froup">
        <label for="">Image category</label><br>
        <img hight="80" src="{{asset('images/' .$item['pimage']) }}" alt="{{$item['ptitle']}}" class="img-thumbnail">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input name="image" type="file" class="custom-file-input" id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">
            Product image</label>
        </div>
      </div>
      <div class="form-group">
        <span class="text-danger">{{ $errors->first('image')}}</span>
      </div>


      <input type="submit" value="update Category" name="submit" class="btn btn-primary">
      <a class="btn btn-secondary" href="{{ url('cms/products')}}">Cancel</a>

    </form>

  </div>
</div>

@endsection