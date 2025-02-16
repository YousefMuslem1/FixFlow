@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="container">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            Super Admin Dashboard
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <!-- Accountents Number-->
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-handshake-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Accountents Members</span>
                                <span class="info-box-number text-center font-num-size">{{ $accountents }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- Company Special Count -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Special Companies</span>
                                <span class="info-box-number text-center font-num-size">{{ $specialManagers }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-navy elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Limited Companies</span>
                                <span class="info-box-number text-center font-num-size">{{ $limitedCompanies }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Limited Managers</span>
                                <span class="info-box-number text-center font-num-size">{{ $limitedManagers }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <!-- Accountents Number-->
                        <div class="info-box">
                            <span class="info-box-icon bg-gradient-green elevation-1"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Accepted Payments</span>
                                <span class="info-box-number text-center font-num-size">{{ $acceptedPayments }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- Company Special Count -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-gradient-red elevation-1"><i class="fa fa-arrow-down"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Rejected Payments</span>
                                <span class="info-box-number text-center font-num-size">{{ $rejectedPayments }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-gradient-lightblue elevation-1"><i class="fa fa-clock-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pending Payments</span>
                                <span class="info-box-number text-center font-num-size">{{ $pendingPayments }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection


