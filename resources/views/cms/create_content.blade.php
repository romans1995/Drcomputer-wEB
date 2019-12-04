@extends('cms.cms_master')
@section('cms_content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Add New Content</h1>

</div>
<div class="row">
  <div class="col-md-6">
    <form action="{{ url('cms/content') }}" method="POST" novalidate="novalidate" autocomplete="off">
      @csrf()
      <div class="form-group">
        <label for="menu-id">Menu Link:</label>
        <select class="form-control" name="menu_id" id="menu_id">
          <option value="">Choose Menu Link:</option>
          @foreach($menus as $menu)
          <option @if(old('menu_id')==$menu['id']) selected="selected" @endif value="{{ $menu['id']}} ">
            {{$menu['link']}}:
          </option>

          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('menu_id')}}</span>





      </div>
      <div class="form-group">
        <label for="link">Title:</label>
        <input class="form-control " type="text" name="title" id="title" value="{{old('title')}}">
        <span class="text-danger">{{ $errors->first('title')}}</span>
      </div>
      <div class="form-group">
        <label for="article"> Article:</label>
        <textarea style="align:left" class="form-control" name="article" id="article" cols="30" rows="10">{{old('article')}}</textarea>
        <span class="text-danger">{{ $errors->first('article')}}</span>
      </div>
      <input type="submit" value="save Content" name="submit" class="btn btn-primary">
      <a class="btn btn-secondary" href="{{ url('cms/content')}}">Cancel</a>

    </form>

  </div>
</div>

@endsection