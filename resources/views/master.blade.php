<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <script>
        let BASE_URL = "{{ url('')}}/";
        console.log(BASE_URL);
    </script>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- jQuery -->
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <!-- bootstrap js -->
    <script   src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <!-- scripts -->
    <script defer src="{{asset('js/script.js')}}"></script>

</head>
<body>
    <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
                <div class="container">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="{{url('')}}">iCar</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">

                          @foreach ($menu as $item)
                            <li class="nav-item">
                             <a class="nav-link" href="{{url($item['url'])}}">{{$item['link']}}</a>
                            </li>
                          @endforeach

                          <li class="nav-item">
                            <a class="nav-link" href="{{url('shop')}}">Shop</a>
                          </li>

                          <li class="nav-item">
                                <a class="nav-link" href="{{url('shop/checkout')}}">
                                    <img width="20" src="{{asset('images/shopping-cart.png')}}" alt="">

                                    @if (!Cart::isEmpty())
                                        <div class="total-cart">{{Cart::getTotalQuantity()}}</div>
                                    @endif

                                </a>
                          </li>
                        </ul>

                        <ul class="navbar-nav ml-auto ">
                            @if(!Session::has('user_id'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/signin')}}">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/signup')}}">Sign Up</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/profile')}}">{{Session::get('user_name')}}</a>
                                </li>
                                @if (Session::has('is_admin'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('cms/dashboard')}}">CMS Dashboard</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/logout')}}">logout</a>
                                </li>

                            @endif
                        </ul>

                      </div>
                    </div>
                </div>
            </nav>

    </header>

    <main>

        <div class="container">
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

            @yield('content')

        </div>

    </main>

    <footer>
        <div>
            <p class="text-center"> Gal Mizrahi &copy {{date('Y')}}</p>
        </div>
    </footer>


</body>
</html>
