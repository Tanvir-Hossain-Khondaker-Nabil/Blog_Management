@extends('backend.layouts.master')

@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-12">
                    <h3 class="m-0">Admin Panel</h3>
                </div><!-- /col -->

                </div><!-- /row -->
            </div><!-- /container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <!-- /col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">CPU Traffic</span>
                                    <span class="info-box-number">
                                    10
                                    <small>%</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <!-- /col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    <!-- /col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number">760</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    <!-- /col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Members</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    <!-- /col -->
                    </div>
                <!-- /.Info boxes -->


                <!-- Main row -->
                <div class="row mt-3">

                    <!-- Left col -->
                    <div class="col-md-9">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Orders</h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                        <th>Order ID</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Popularity</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                
                                        <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                            </div>
                        </div>
                        <!-- /.TABLE: LATEST ORDERS -->
                    </div>
                    <!-- /.Left col -->

                    <!-- Right Col -->
                    <div class="col-md-3">
                        <!-- Info Boxes Style 2 -->
                        <div class="info-box mb-3 bg-warning">
                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Inventory</span>
                            <span class="info-box-number">5,200</span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /info-box -->
                        <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="far fa-heart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Mentions</span>
                            <span class="info-box-number">92,050</span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /info-box -->
                        <div class="info-box mb-3 bg-danger">
                        <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Downloads</span>
                            <span class="info-box-number">114,381</span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /info-box -->
                        <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="far fa-comment"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Direct Messages</span>
                            <span class="info-box-number">163,921</span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /info-box -->
                    </div>
                    <!-- /.Right Col -->

                </div>
                <!-- /.Main row -->


            </div>
        </section>
        <!-- /.Main content -->
    </div>
@endsection