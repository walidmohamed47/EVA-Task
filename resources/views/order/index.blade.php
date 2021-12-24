@extends('layouts.app')
@section('title')
    View Orders
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Orders</li>
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
                        <h3 class="card-title">View My Orders</h3>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert @if(session()->get('message')[0]['type'] == "Added") alert-success @endif
                        @if(session()->get('message')[0]['type'] == "Deleted") alert-danger @endif
                        @if(session()->get('message')[0]['type'] == "Restore") alert-warning @endif alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas
                                    @if(session()->get('message')[0]['type'] == "Added")  fa-check @endif
                                @if(session()->get('message')[0]['type'] == "Deleted") fa-ban @endif
                                @if(session()->get('message')[0]['type'] == "Restore") fa-exclamation-triangle @endif
                                    "></i>Alert!</h5>
                            {{ session()->get('message')[0]['message'] }}
                            {{ session()->forget('message')}}
                        </div>
                @endif
                <!-- /.card-header -->

                    <!-- /.card-header -->

                    <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped"
                                   data-order='[[ 0, "desc" ]]'>
                                <thead>
                                <tr role="row">
                                    <th>
                                        Order ID
                                    </th>
                                    <th>
                                        Username
                                    </th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->ownerOfOrder->username}} </td>
                                        <td>{{number_format((float)$order->amount, 4, '.', '')}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr role="row">
                                    <th>
                                        Order ID
                                    </th>
                                    <th>
                                        Username
                                    </th>
                                    <th>Amount</th>
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

