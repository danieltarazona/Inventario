<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  @include('layouts.links')

  <!-- Scripts -->
  <script>
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
  ]); ?>
  </script>
</head>

<body>
  <div id="app">
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
            {{ config('app.name', 'Laravel') }}
          </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            @if(Auth::check())
              @if(Auth::user()->role_id != 2)
                <li><a href="{{ url('products') }}">{{trans('strings.products')}}</a></li>
                <li><a href="{{ url('categories') }}">{{trans('strings.categories')}}</a></li>
              @endif
              @if(Auth::user()->role_id == 1 or Auth::user()->role_id > 2)
                <li><a href="{{ url('orders') }}">{{trans('strings.orders')}}</a></li>
                <li><a href="{{ url('sales') }}">{{trans('strings.sales')}}</a></li>
                <li><a href="{{ url('events') }}">{{trans('strings.events')}}</a></li>
              @endif
              @if (Auth::check() && Auth::user()->role_id > 1)
                <li><a href="{{ url('repairs') }}">{{trans('strings.repairs')}}</a></li>
                @if (Auth::user()->role_id > 3)
                  <li><a href="{{ url('stores') }}">{{trans('strings.stores')}}</a></li>
                  <li><a href="{{ url('cities') }}">{{trans('strings.cities')}}</a></li>
                  <li><a href="{{ url('regions') }}">{{trans('strings.regions')}}</a></li>
                  <li><a href="{{ url('users') }}">{{trans('strings.users')}}</a></li>
                  <li><a href="{{ url('states') }}">{{trans('strings.states')}}</a></li>
                  <li><a href="{{ url('roles') }}">{{trans('strings.roles')}}</a></li>
                @endif
              @endif
            @endif
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>
            @endif
            @if(Auth::user()->role_id < 3)
              <li>
                <a href="{{ url('/cart/' . Auth::user()->id) }}" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i>
                  <span class="label label-success">{{App\Cart::find(Auth::id())->product->count()}}</span>
                </a>
              </li>
            @endif

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{Auth::user()->photo}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->username }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{Auth::user()->photo}}" class="img-circle" alt="User Image">

                  <p style="color:gray;">
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    <small>Member since Nov. 2016</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ url('/users/' . Auth::id() . '/edit') }}" class="btn btn-default btn-flat">Profile</a>
                  </div>

                  <div class="pull-right">
                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ trans('strings.logout') }}
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </li>
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
</div>

<!-- Scripts -->
<script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
