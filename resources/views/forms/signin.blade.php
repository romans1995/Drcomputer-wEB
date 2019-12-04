@extends('master')
@section('main_content')



<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<div id="page-content" class="page-wrapper">

  <!-- LOGIN SECTION START -->
  <div class="login-section mb-80">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="registered-customers">
            <h6 class="widget-title border-left mb-50">REGISTERED CUSTOMERS</h6>
            <form action="#" method="POST" novalidate="novalidate" autocomplete="off">
              @csrf()
              <div class="login-account p-30 box-shadow">
                <p>If you have an account with us, Please log in.</p>
                <input value="{{ old('email') }}" type="text" name="email" placeholder="Email Address"
                  class="form-control">
                <span class="text-danger">{{ $errors->first('email') }}</span>
                <input type="password" name="password" placeholder="Password" id="Password" class="form-control">
                <span class="text-danger">{{ $errors->first('password') }}</span>

                <p><small><a href="#">Forgot your password?</a></small></p>
                <button class="submit-btn-1 btn-hover-1" type="submit">login</button>
                @if(!empty($verify_error))
                <span class="text-danger">{{ $verify_error }}</span>
                @endif
              </div>
            </form>
          </div>
        </div>
        <!-- new-customers -->


        @endsection