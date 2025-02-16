
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Accountant</title>

    <!-- Theme style -->
    <link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pace.css') }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"  rel="stylesheet" type="text/css">
</head>

<style>
    .progress {
        display: block;
        text-align: center;
        width: 0;
        height: 3px;
        background: red;
        transition: width .3s;
        z-index: 999;
    }
    .progress.hide {
        opacity: 0;
        transition: opacity 1.3s;
    }
    .notifications-menu .menu >  a  {
        white-space: normal!important;
    }

</style>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('accountent.home') }}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <div class="main-notification">
                @include('accountent.inc.notifications')
            </div>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdweown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ auth()->user()->accountent[0]->name}}
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('accountent.home') }}" class="brand-link">
            {{--                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
            {{--                     style="opacity: .8">--}}
            <span class="brand-text font-weight-light">Accountant Company</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('img/avatar.png') }}" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block profileName">  </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
{{--                        {{ request()->is('accountent/home') ? 'active' : '' }}--}}
                        <a href="{{ route('accountent.home') }}" class="nav-link ">
                            <i class="nav-icon  fa fa-th"></i>
                            <p>
                                Statistics
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="" id="accountentManageAll" class="nav-link">
                            <i class="nav-icon  fa fa-users"></i>
                            <p>Manage Companies</p>
                        </a> -->
                        <a href=""  class="nav-link" data-toggle="modal" data-target="#addManager">
                        <i class="nav-icon  fa fa-plus"></i>
                        <p>Add Company</p>
                        </a>
                    </li>
                    <li class="nav-item">
{{--                        {{ route('accountent.show-profile') }}--}}
                        <a href="" id="accountentProfile" class="nav-link {{ request()->is('accountent/accountent_profile') ? 'active' : '' }}">
                            <i class="nav-icon  fa fa-user"></i>
                            <p>My Profile</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon  fa fa-cog"></i>
                            <p class="text-sm">
                                Manage Public Companies
                                <i class="right  fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                        <li class="nav-item">
                                <a href=""  class="nav-link" id="activecompanies">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Active Companies</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=""  class="nav-link" id="inactivecompanies">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Inactive Companies</p>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href=""  class="nav-link" id="PublicManager">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Add Manager</p>
                                </a>
                            </li>

                        </ul>


                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon  fa fa-cog"></i>
                            <p class="text-sm">
                                Manage Special Companies
                                <i class="right  fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                        <li class="nav-item">
                                <a href=""  class="nav-link" id="activescompanies">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Active Companies</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=""  class="nav-link" id="inactivescompanies">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Inactive Companies</p>
                                </a>
                            </li>
                        </ul>


                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon  fa fa-eye"></i>
                            <p class="text-sm">
                                View Payments Companies
                                <i class="right  fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul id="payment" class="nav nav-treeview">

                        <li class="nav-item">
                                <a href=""  class="nav-link" id="specialpaymentcompanies">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Special Companies</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=""  class="nav-link" id="publicpaymentcompanies">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Public Companies</p>
                                </a>
                            </li>

                        </ul>


                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="main-content">
        @yield('content')
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">

        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <!-- Anything you want -->
        </div>
        <!-- Default to the left -->
        <!-- <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
    </footer>
</div>
@include('accountent.inc.add_manager_model')


    <!-- REQUIRED SCRIPTS -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('datatables/jquery.dataTables.min.js')}}" type="text/javascript" ></script>
    <!-- Get Accountant Name -->
    <script src="{{ asset('js/accountant/getUsername.js') }}"></script>
    <script src="{{ asset('js/accountant/jquery.MultiFile.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/accountant/pace.min.js') }}"></script>
    <script src="{{ asset('js/accountant/getAddPublicManagerPartialView.js') }}"></script>
    <script src="{{ asset('js/accountant/getProfilePartialPage.js') }}"></script>
    <script src="{{ asset('js/accountant/getCompaniesManagePartialView.js') }}"></script>
    <script src="{{ asset('js/accountant/getPublicCompaniesActivatePartialView.js') }}"></script>
    <script src="{{ asset('js/accountant/getPublicCompaniesInactivatePartialView.js') }}"></script>
    <!-- Send Payment request and return payment partial view -->
    <script src="{{ asset('js/accountant/getPaymentPartialView.js') }}"></script>

    <script src="{{ asset('js/accountant/getSpecialCompaniesActivatePartialView.js') }}"></script>
    <script src="{{ asset('js/accountant/getSpecialCompaniesInactivatePartialView.js') }}"></script>
    <script src="{{ asset('js/accountant/getPaymentSpecialPartialView.js') }}"></script>
    <script src="{{ asset('js/accountant/getPaymentPublicPartialView.js') }}"></script>

    <script>
        $(function () {
            $('#managerType').change(function() {
                let id = $(this).children("option:selected").val();
                console.log(id);

                $.ajax({
                    url : '{{ route( 'accountent.add-partial-manager' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( response )
                    {
                        $('.manager-content').html(response.html);
                        window.history.pushState("", "", "/");

                    },
                    error: function()
                    {
                        alert('error...');
                    }
                });
            });

        });
    </script>
{{--    // Clear add manager model after closing--}}
    <script>
        $(document).ready(function() {
            $('.modal .close').on('click', function () {
                $('#managerType').val(0);
                $('.manager-content').empty();
            })
        });
    </script>
    @yield('scripts')

</body>


</html>




