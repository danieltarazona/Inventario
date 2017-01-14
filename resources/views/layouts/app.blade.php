<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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

<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="/home" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              @if (Auth::guest())
                <div class="pull-left">
                  <li><a href="{{ url('/login') }}" class="btn btn-default btn-flat">Login</a></li>
                  <li><a href="{{ url('/register') }}" class="btn btn-default btn-flat">Register</a></li>
                </div>
              @endif

              @if (Auth::check())

                @if(Auth::user()->role_id < 3)
                <a href="{{ url('/cart/' . Auth::user()->id) }}">
                  <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i>
                  <span class="label label-success">{{App\Cart::find(Auth::id())->product->count()}}</span> Carrito
                </a>
                @endif

              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="{{Auth::user()->photo}}" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <!--<span class="label label-warning">10</span>-->
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <!--<span class="label label-danger">9</span>-->
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="{{ url('/users/' . Auth::id() . '/edit') }}" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ URL::asset(Auth::user()->photo)}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->username }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{ URL::asset(Auth::user()->photo)}}" class="circle-image" alt="User Image">

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
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->


        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ URL::asset(Auth::user()->photo)}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->username }}</p>
            <!-- Status -->
            <i class="fa fa-circle text-success"></i> Online
          </div>
        </div>

        <!--Search-->
        <!--
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header">LINKS</li>
          <!-- Optionally, you can add icons to the links -->
          @if(Auth::check())
            @if(Auth::user()->role_id != 2)
              <li><a href="{{ url('products') }}"><i class="fa fa-link"></i><span>{{trans('strings.products')}}</span></a></li>
              <li><a href="{{ url('categories') }}"><i class="fa fa-link"></i><span>{{trans('strings.categories')}}</span></a></li>
            @endif
            @if(Auth::user()->role_id == 1 or Auth::user()->role_id > 2)
              <li><a href="{{ url('orders') }}"><i class="fa fa-link"></i><span>{{trans('strings.orders')}}</span></a></li>
              <li><a href="{{ url('sales') }}"><i class="fa fa-link"></i><span>{{trans('strings.sales')}}</span></a></li>
              <li><a href="{{ url('events') }}"><i class="fa fa-link"></i><span>{{trans('strings.events')}}</span></a></li>
            @endif
            @if (Auth::check() && Auth::user()->role_id > 1)
              <li><a href="{{ url('repairs') }}"><i class="fa fa-link"></i><span>{{trans('strings.repairs')}}</span></a></li>
              @if (Auth::user()->role_id > 3)
                <li><a href="{{ url('reports') }}"><i class="fa fa-link"></i><span>{{trans('strings.reports')}}</span></a></li>
                <li><a href="{{ url('stores') }}"><i class="fa fa-link"></i><span>{{trans('strings.stores')}}</span></a></li>
                <li><a href="{{ url('cities') }}"><i class="fa fa-link"></i><span>{{trans('strings.cities')}}</span></a></li>
                <li><a href="{{ url('regions') }}"><i class="fa fa-link"></i><span>{{trans('strings.regions')}}</span></a></li>
                <li><a href="{{ url('users') }}"><i class="fa fa-link"></i><span>{{trans('strings.users')}}</span></a></li>
                <li><a href="{{ url('states') }}"><i class="fa fa-link"></i><span>{{trans('strings.states')}}</span></a></li>
                <li><a href="{{ url('roles') }}"><i class="fa fa-link"></i><span>{{trans('strings.roles')}}</span></a></li>
              @endif
            @endif
          @endif


          <!--
          <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Link in level 2</a></li>
              <li><a href="#">Link in level 2</a></li>
            </ul>
          </li>
          -->
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    @endif


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->

      <section class="content">
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
      </section>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        
      </div>
      <!-- Default to the left -->
      Copyright &copy; 2017 <a href="#">CODEAPPS</a>. All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdons Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebars background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>

  <script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap-3.3.7/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('js/AdminLTE/AdminLTE.min.js') }}"></script>

  </body>
</html>
