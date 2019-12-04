@php $menus = App\Menu::all()->toArray() @endphp

@extends('master')

@section('main_content')
<style>
  .h3-404 {
    font-size: 126px;
  }
</style>

< <!-- BREADCRUMBS SETCTION END -->

  <!-- Start page content -->
  <div id="page-content" class="page-wrapper">

    <!-- ERROR SECTION START -->
    <div class="error-section mb-80">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="breadcrumbs-title">שגיאה 404
              <div class="error-404 box-shadow">

                <img src="{{asset('images\oops2.jpg')}}" alt="home page">
                <div class="go-to-btn btn-hover-3">
                  <h3 class="h3-404">הדף אינו קיים</h3>

                </div>
                <div class="go-to-btn btn-hover-2">


                  <a href="{{asset('')}}">לדף הבית</a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ERROR SECTION END -->
  </div>
  @endsection