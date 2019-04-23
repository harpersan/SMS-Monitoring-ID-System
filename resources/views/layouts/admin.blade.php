<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    
    <!-- Bootstrap Core CSS -->
{{--     <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/tap.css')}}" rel="stylesheet">

{{--     <style type="text/css">
    .bs-example {
        margin: 20px;
    }
    .form-control:focus {
        border-color: #ff80ff;
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);
    }
    </style> --}}

    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>

<body id="admin-page" style="padding-top: 0">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- /.navbar-header -->



        <ul class="nav navbar-top-links navbar-right">


            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> 

                    @if (Auth::check())
                        {{ Auth::user()->name }}

                    @else 
                        {{""}}    
                    @endif

                     <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->


        </ul>






        {{--<ul class="nav navbar-nav navbar-right">--}}
        {{--@if(auth()->guest())--}}
        {{--@if(!Request::is('auth/login'))--}}
        {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
        {{--@endif--}}
        {{--@if(!Request::is('auth/register'))--}}
        {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
        {{--@endif--}}
        {{--@else--}}
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
        {{--<li><a href="{{ url('/auth/logout') }}">Logout</a></li>--}}

        {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}
        {{--</ul>--}}





        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Administrator<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">+ Admin User</a>
                            </li>

                            <li>
                                <a href="">View Admin User</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Yearlevel-Section<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">


                          <li>
                                <a href="#"><i class="fa fa-users "></i> Grade 1<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{ route('student.show', $id = '11') }}"><i class="fa fa-user"></i> Section 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.show', $id = '12') }}"><i class="fa fa-user"></i> Section 2</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                         </li>
                          <li>
                                <a href="#"><i class="fa fa-users"></i> Grade 2<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{ route('student.show', $id = '21') }}"><i class="fa fa-user"></i> Section 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.show', $id = '22') }}"><i class="fa fa-user"></i> Section 2</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                         </li>                    
                          <li>
                                <a href="#"><i class="fa fa-users"></i> Grade 3<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{ route('student.show', $id = '31') }}"><i class="fa fa-user"></i> Section 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.show', $id = '32') }}"><i class="fa fa-user"></i> Section 2</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                         </li>
                          <li>
                                <a href="#"><i class="fa fa-users"></i> Grade 4<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{ route('student.show', $id = '41') }}"><i class="fa fa-user"></i> Section 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.show', $id = '42') }}"><i class="fa fa-user"></i> Section 2</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                         </li>
                          <li>
                                <a href="#"><i class="fa fa-users"></i> Grade 5<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{ route('student.show', $id = '51') }}"><i class="fa fa-user"></i> Section 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.show', $id = '52') }}"><i class="fa fa-user"></i> Section 2</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                         </li>
                          <li>
                                <a href="#"><i class="fa fa-users"></i> Grade 6<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{ route('student.show', $id = '61') }}"><i class="fa fa-user"></i> Section 1</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.show', $id = '62') }}"><i class="fa fa-user"></i> Section 2</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                         </li>                                                                           
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>





    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                </li>







            </ul>

        </div>

    </div>

</div>






<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small></small>
                </h1>


                        <!-- DASHBOARD HEADER START -->

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-sign-in fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                          <div class='huge'>12</div>
                                                <div>Login</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('index.index') }}">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-comments fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                             <div><h3>Logs</h3></div>
                                              <div>Delivered Message</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('index.show', $id = 'logs') }}">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                            <div><h3>Student</h3></div>
                                                <div>Registration</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('student.create') }}">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'>13</div>
                                                 <div>Categories</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="categories.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> 

                        <!-- DASHBOARD HEADER END -->


                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>


@yield('footer')





</body>

</html>
