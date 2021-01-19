<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iCar | admin panel</title>
    <script>
        let BASE_URL = "{{ url('')}}/";

    </script>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- jQuery -->
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <!-- bootstrap js -->
    <script   src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/style.css') }}">


<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<!--my scripts -->
<script defer src="{{asset('js/script.js')}}"></script>



</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('cms/dashboard')}}">iCar Admin Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link active" target="_blanc" aria-current="page" href="{{url('')}}">Back To Site</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('user/logout')}}">Logout</a>
                        </li>
                    </ul>
              </div>
            </div>
          </nav>
    </header>

      <div class="container-fluid">
        <div class="row">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('cms/dashboard')}}">
                    <span data-feather="home"></span>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/menu')}}">
                    <span data-feather="file"></span>
                    Menu
                  </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{url('cms/content')}}">
                    <span data-feather="shopping-cart"></span>
                    Content
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/categories')}}">
                    <span data-feather="bar-chart-2"></span>
                    Catrories
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/products')}}">
                    <span data-feather="layers"></span>
                    Products
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cms/orders')}}">
                      <span data-feather="layers"></span>
                      Orders
                    </a>
                  </li>
              </ul>
            </div>
          </nav>

          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
               <!-- Add to cart message -->
            @if(Session::has('sm'))
            <div class="row sm-box">
                    <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('sm')}}</div>
                    </div>
                </div>
        @endif

        <!-- Errors Messages -->
        @if($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
            @yield('cms_content')
          </main>

        </div>
      </div>




      <script>
            $('#article').summernote({
                height:300
            });
        </script>
</body>
</html>
