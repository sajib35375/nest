@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Return Orders List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Return Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td>{{ $order->amount }}৳</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->return_reason }}</td>
                                    <td>
                                        @if($order->return_order == 1)
                                        <span class="badge rounded-pill bg-warning"> Pending </span>
                                        @elseif($order->return_order == 2)
                                            <span class="badge rounded-pill bg-success">Success </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('return.order.approve',$order->id) }}">Approve</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
