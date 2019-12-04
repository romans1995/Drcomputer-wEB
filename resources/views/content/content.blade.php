@extends('master')
@section('main_content')
<style>
p{
  margin:70px;
 
}
h4{
  margin:70px;
}
</style>
<div class="row">
  @foreach($contents as $content)
  <div class="col-12">
    <h4>{{$content->ctitle }}</h4>
    <p>{!! $content->carticle !!}</p>
  </div>
  @endforeach
</div>
@endsection