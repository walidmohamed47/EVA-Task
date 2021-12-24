@extends('layouts.app')
@section('title')
    View Commissions
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Commissions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Commissions</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('container-fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View My Commissions</h3>
                    </div>
                <!-- /.card-header -->

                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped"
                               data-order='[[ 0, "desc" ]]'>
                            <thead>
                            <tr>
                                <th>
                                    Commission ID
                                </th>
                                <th>
                                    Order ID
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>Value of commission</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($commissions as $commission)
                                <tr>
                                    <td>{{$commission->id}}</td>
                                    <td>{{$commission->order_id}}</td>
                                    <td>{{number_format((float)$commission->order->amount, 4, '.', '')}}</td>
                                    <td>{{$commission->ownerOfCommission->username}}</td>
                                    <td>{{number_format((float)$commission->value_of_commission, 4, '.', '')}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    Commission ID
                                </th>
                                <th>
                                    Order ID
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>Value of commission</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection

