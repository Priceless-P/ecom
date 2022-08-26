<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Ecom</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/templatemo.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    </head>
    <body class="antialiased">


                <!-- Header -->
                <nav class="navbar navbar-expand-lg navbar-light shadow">
                    <div class="container d-flex justify-content-between align-items-center">

                        <a class="navbar-brand text-success logo h1 align-self-center" href="/">
                            E-com
                        </a>

                        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                            <div class="flex-fill">
                                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Contact</a>
                                    </li>

                                    <li class="nav-item">

                                            @if (Route::has('login'))

                                                    @auth
                                                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                                                    @else
                                                        <a href="{{ route('login') }}" class="nav-link">Log in</a>

                                                        @if (Route::has('register'))
                                                        <li class="nav-item">
                                                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                                                        </li>
                                                            @endif
                                                    @endauth

                                            @endif

                                    </li>
                                </ul>
                            </div>
                            <div class="navbar align-self-center d-flex">



                                <div class="col-lg-12 col-sm-12 col-12 main-section">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info" data-toggle="dropdown">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <div class="row total-header-section">
                                                <div class="col-lg-6 col-sm-6 col-6">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                                </div>
                                                @php $total = 0 @endphp
                                                @foreach((array) session('cart') as $id => $details)
                                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                                @endforeach
                                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                                </div>
                                            </div>
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <div class="row cart-detail">
                                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                            <img src="{{ $details['image'] }}" />
                                                        </div>
                                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                            <p>{{ $details['name'] }}</p>
                                                            <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                    <div class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </div>
                </div>
            </div>

        </div>

                    </div>
                </nav>
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
            @endif
