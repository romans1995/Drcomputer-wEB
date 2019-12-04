@extends('cms.cms_master')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Content</h1>
</div>
<p><a href="{{ url('cms/content/create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Add new
    Content</a>
</p>
@if($contents)
<table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th>Content Title</th>
      <th>Updated At</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($contents as $content)
    <tr>
      <td>{{$content['ctitle']}}</td>
      <td>{{ date('d/m/Y H:i:s',strtotime($content['updated_at'])) }}</td>
      <td>
        <a href="{{  url('cms/content/' . $content['id'] . '/edit')}}"><i class="fas fa-pen"></i>Edit</a>|
        <a href="{{  url('cms/content/'.$content['id'])}}"><i class="fas fa-eraser"></i>Delete</a>

      </td>
    </tr>

    @endforeach
  </tbody>
</table>
@endif
@endsection