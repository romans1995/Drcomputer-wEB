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
  }
</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Edit User</h1>






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
        <form action="{{ url('cms/users/' . $user['id'] . '/edit') }}" enctype="multipart/form-data" method="POST"
          novalidate="novalidate" autocomplete="off">
          @csrf()
          {{ method_field('PUT') }}

          <div class="login-account  box-shadow">
            <div class="row">
              <div class="form-froup">

                <label for="name"></label>
                <input value="{{$user['firstName']}}" type="text" name="firstName" id="firstName" class="form-control"
                  placeholder="שם פרטי">
                <input type="hidden" name="user_id" value="{{ $user['id'] }}">

              </div>
            </div>
            <div class="row">
              <div class="form-froup">
                {{-- <div class="col-sm-8"> --}}
                <input value="{{$user['lastName']}}" type="text" name="lastName" id="lastName" class="form-control"
                  placeholder="שם משפחה">
              </div>
            </div>

            <div class="row">
            
              <div class="form-group">
                <div class="col-sm-8 form-control ">
                  <select name="city" id="city" class="custom-select">
                    @foreach($cps as $c)
                    <option @if(old('city_id')==$c->id) selected="selected" @endif value="{{$c->id}}">{{$c->city}}
              </option>
              @endforeach
            </select>
          </div>


              <div class="row">
                <div class="form-group">
                  <input value="{{$user['phone']}}" type="text" class="phone" name="phone" id="phone" type="phone"
                    class="form-control" placeholder="מס פלאפון">
                </div>
              </div>

              <div class="row">
                <div class="form-group">
                  <input value="{{$user['email']}}" type="email" name="email" id="email" class="form-control"
                    placeholder="אימייל">
                  <div>
                    <div>

                      <div class="row">
                        <div class="form-group">
                          <input value="{{$user['password']}}" name="password" id="password" class="form-control"
                            type="password" placeholder="סיסמה">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                          <div>
                            <div>
                              <div class="row">
                                <div class="form-group">
                                  <div id="permission" class="col-sm-8 form-control ">
                                    <select class="form-control" name="permission" id="permission">
                                      <option>Choose permission</option>
                                      @foreach($permission as $p)
                                      @foreach($cps as $u)
                                      <option @if($u->permission_id==$p->id) selected="selected" @endif @endforeach
                                        value="{{$p->id}}">
                                        {{$p->Kind}}
                                        @endforeach
                                      </option>
                                    </select>
                                  </div>
                                </div>
                                <input type="submit" value="update Users" name="submit" class="btn btn-primary">
                                <a class="btn btn-secondary" href="{{ url('cms/users')}}">Cancel</a>
        </form>
      </div>
    </div>

    @endsection