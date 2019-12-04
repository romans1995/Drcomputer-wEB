@extends('master')
@section('main_content')
<style>
  .form-control {
    display: block;
    width: 100%;
    height: 40px;
    padding: 1px 2px;
    font-size: 14px;
    margin-bottom: 23px;

  }
</style>

<img style="padding-left:368px" src=" {{asset('images/dog2.jpg')}}" alt="computer dog">




<!-- Start page content -->
<div id="page-content" class="page-wrapper">

  <!-- LOGIN SECTION START -->

  <!-- new-customers -->

  <div class="col-md-6">
    <div class="new-customers">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="" method="POST" novalidate="novalidate" autocomplete="off">
        @csrf()
        <h6 class="widget-title border-left mb-50">לקוח חדש</h6>
        <div class="login-account p-30 box-shadow">
          <div class="row">
            <div class="col-sm-8">
              <label for="name"></label>
              <input value="{{old('firstName')}}" type="text" name="firstName" id="firstName" class=""
                placeholder="שם פרטי">
            </div>
            <div class="col-sm-8">
              <input value="{{old('lastName')}}" type="text" name="lastName" id="lastName" class=""
                placeholder="שם משפחה">
            </div>

            <div class="row">
              <div id="city" class="col-sm-8  ">

                <select name="city" class="custom-select">
                  <option value="defalt">עיר</option>
                  @foreach($city as $c)
                  <option value="{{$c->id}}">{{$c->city}}</option>


                  @endforeach
                </select>

              </div>
            </div>


            <div class="row">
              
                <div class="col-sm-8">
                  <input type="text" class="phone" name="phone" id="phone" type="phone" class="billing-details p-30"
                    placeholder="מס פלאפון">
                </div>
              </div>
            </div>

            <div class="row">
             
                <input value="{{old('email')}}" type="email" name="email" id="email" class="col-sm-6"
                placeholder="Email address here...">
              </div>
              <div class="row">
                <div class="">
                  <input name="password" id="password" class="form-control" type="password" placeholder="סיסמה">
                </div>
              </div>
              <div class="row">
               
                  <input name="password_confirmation" id="password-confirmation" class="form-control" type="password"
                    placeholder="אימות סיסמה">
                </div>
              </div>

              <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">הרשם</button>
            </div>
          </div>
          <div class="col-md-6">
            <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">למחוק הכל!</button>
          </div>
        </div>
    </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
@endsection