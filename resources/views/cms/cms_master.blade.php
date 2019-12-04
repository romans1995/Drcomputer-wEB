<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/cms_style.css')}}">

  <title>DRcomputer|Admin panel</title>
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{asset('cms/dashboard')}}">DRcomputer Admin Panel</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="{{url('user/logout')}}">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('cms/dashboard')}}">

                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('cms/menu')}}">

                Menu
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('cms/content')}}">

                Content
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('cms/categories')}}">

                Categories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('cms/products')}}">

                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('cms/orders')}}">

                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('cms/users')}}">

                Users
              </a>
            </li>
            <li class="nav-item">
              <a target="_blank" class="nav-link active" href="{{url('')}}">

                To Front Site
              </a>
            </li>






          </ul>


      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @yield('cms_content')
      </main>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

  <script src={{asset('js/cms_script.js')}}></script>
  @if(Session::has('sm'))
  <script>
    toastr.options.positionClass = 'toast-top-center';
    toastr.success("{{Session::get('sm')}}");
   
  </script>
  @endif
</body>

</html>