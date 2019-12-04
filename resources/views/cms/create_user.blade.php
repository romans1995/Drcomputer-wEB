@extends('cms.cms_master')
@section('cms_content')
<style>
  .form-control {
    padding: 0px 1px;
  }

  .col-sm-8 {
    width: 102.666667%;
  }

  .error {
    float: right;
  }

  .row {

    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -1px;
    margin-bottom: 20px;
  }
</style>





<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Add New User</h1>





</div>
<div class="error">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>
<div class="col-md-8">
  <div class="row">

    <div class="col-md-8">
      <form action="{{ url('cms/users') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate"
        autocomplete="off">


        <div class="login-account  box-shadow">
          <div class="row">
            <div class="form-froup">

              <label for="name"></label>
              <input value="{{old('firstName')}}" type="text" name="firstName" id="firstName"
                class="form-control col-sm-8" placeholder="שם פרטי">
              @csrf()
            </div>
          </div>

          <div class="row">
            <div class="form-froup ">
              <input value="{{old('lastName')}}" type="text" name="lastName" id="lastName" class="form-control col-sm-8"
                placeholder="שם משפחה">

            </div>
          </div>

          <div class="row">

            <select id="city" class="form-control " name="city" class="custom-select col-sm-8">
              <option value="defalt">עיר</option>
              @foreach($city as $c)
              <option @if(old('city_id')==$c->id) selected="selected" @endif value="{{$c->id}}">{{$c->city}}
              </option>
              @endforeach
            </select>
          </div>


          <div class="row">
            <div class="form-froup ">
              <input value="{{old('phone')}}" type="text" class="phone col-sm-8" name="phone" id="phone" type="phone"
                class="form-control" placeholder="מס פלאפון">
            </div>
          </div>

          <div class="row">
            <div class="form-froup ">
              <input value="{{old('email')}}" type="email" name="email" id="email" class="form-control col-sm-8"
                placeholder="אימייל">
              <div>
                <div>

                  <div class="row">
                    <div class="form-froup">
                      <input name="password" id="password" class="form-control col-sm-8" type="password"
                        placeholder="סיסמה">
                      <input name="password_confirmation" id="password-confirmation" class="form-control"
                        type="password" placeholder="אימות סיסמה">
                      <div>
                        <div>

                          <div class="row">
                            <div class="form-froup col-sm-8">
                              <label for="categorie_id">Permission</label>
                              <select value="{{old('permission')}}" class="form-control" name="permission"
                                id="permission">
                                <option value="{{old('permission')}}">Choose permission</option>
                                @foreach($per as $p)
                                <option value="{{  $p->id}}">
                                  {{$p->Kind}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <input type="submit" value="Create User" name="submit" class="btn btn-primary">
                          <a class="btn btn-secondary" href="{{ url('cms/users')}}">Cancel</a>




      </form>
    </div>
  </div>

  @endsection