@extends('manager.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2>Manager Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. End Content-header -->
            <!-- if user from limited company show more statistics -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Accountents Number-->
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-arrow-down"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Rejected Payments</span>
                            <span class="info-box-number text-center font-num-size">{{ $rejectedPayment }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- Company Special Count -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-clock-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pending Payments</span>
                            <span class="info-box-number text-center font-num-size">{{ $pendingPayment }}</span>
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
                        <span class="info-box-icon bg-green elevation-1"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Accepted Payments</span>
                            <span class="info-box-number text-center font-num-size">{{ $acceptedPayment }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-blue elevation-1"><i class="fa fa-credit-card"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Receivables</span>
                            <span class="info-box-number text-center font-num-size">{{ $debt == null ? 'None' : $debt }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            @if(auth()->user()->type == 2)
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Accountents Number-->
                    <div class="info-box">
                        <span class="info-box-icon bg-purple elevation-1"><i class="fa fa-euro"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Capital</span>
                            <span class="info-box-number text-center font-num-size">{{ $capital }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- Company Special Count -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-cyan elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Company Managers Total</span>
                            <span class="info-box-number text-center font-num-size">{{ $companyManagers }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            @endif
        </div>
    </div>

@endsection
