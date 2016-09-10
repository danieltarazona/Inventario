<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SAPEIM</title>

  @include('layouts.links')

</head>
<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          SAPEIM
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->

        <ul class="nav navbar-nav">
          <li><a href="{{ url('categories') }}">Categories</a></li>
          <li><a href="{{ url('products') }}">Products</a></li>
          @if (Auth::check())
            <li><a href="{{ url('orders') }}">Orders</a></li>
            <li><a href="{{ url('sales') }}">Sales</a></li>
            <li><a href="{{ url('issues') }}">Issues</a></li>
            @if (Auth::user()->role_id > 1)
              <li><a href="{{ url('maintenances') }}">Maintenances</a></li>
              <li><a href="{{ url('providers') }}">Providers</a></li>
              <li><a href="{{ url('roles') }}">Roles</a></li>
              <li><a href="{{ url('states') }}">States</a></li>
              <li><a href="{{ url('regions') }}">Regions</a></li>
              <li><a href="{{ url('cities') }}">Cities</a></li>
              <li><a href="{{ url('stores') }}">Stores</a></li>
              <li><a href="{{ url('users') }}">Users</a></li>
            @endif
          @endif
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>

          @else
            <li><a href="{{ url('/cart/' . Auth::id()) }}"><i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-btn fa-user fa-lg"></i>
                {{ Auth::user()->username }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/users/' . Auth::id() . '/edit') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
              </ul>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<div class="container">

  @if (session()->has('message'))
    <div class="alert alert-{{ session('level') }}">
      {{ session('message') }}
    </div>
  @endif

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @yield('content')
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
