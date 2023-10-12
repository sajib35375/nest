@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Details</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Shipping Name:</th>
                                <th>{{ $order->name }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Phone:</th>
                                <th>{{ $order->phone }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Email:</th>
                                <th>{{ $order->email }}</th>
                            </tr>
                            <tr>
                                <th>Division:</th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>
                            <tr>
                                <th>District:</th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>
                            <tr>
                                <th>State:</th>
                                <th>{{ $order->state->state_name }}</th>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <th>{{ $order->additional_information }}</th>
                            </tr>
                            <tr>
                                <th>Post Code:</th>
                                <th>{{ $order->post_code }}</th>
                            </tr>
                            <tr>
                                <th>Order Date:</th>
                                <th>{{ $order->order_date }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details: <span class="text-danger">Invoice: {{ $order->invoice_no }}</span></h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name:</th>
                                <th>{{ $order->name }}</th>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <th>{{ $order->phone }}</th>
                            </tr>
                            <tr>
                                <th>Payment Type:</th>
                                <th>{{ $order->payment_type }}</th>
                            </tr>
                            <tr>
                                <th>Transaction ID:</th>
                                <th>{{ $order->transaction_id }}</th>
                            </tr>
                            <tr>
                                <th>Invoice:</th>
                                <th class="text-danger">{{ $order->invoice_no }}</th>
                            </tr>
                            <tr>
                                <th>Order Total:</th>
                                <th>{{ $order->amount }}৳</th>
                            </tr>
                            <tr>
                                <th>Order Status:</th>
                                <th class="badge rounded-sm bg-info text-dark">{{ $order->status }}</th>
                            </tr>
                            @if($order->status == 'Pending')
                            <tr>
                                <th></th>
                                <th><a id="confirm" href="{{ route('pending-to-confirm', $order->id) }}" class="btn btn-success text-white">Confirm Order</a></th>
                            </tr>
                            @elseif($order->status == 'Confirmed')
                            <tr>
                                <th></th>
                                <th><a id="processing" href="{{ route('confirm-to-processing', $order->id) }}" class="btn btn-success text-white">Processing Order</a></th>
                            </tr>
                            @elseif($order->status == 'Processing')
                            <tr>
                                <th></th>
                                <th><a id="picked" href="{{ route('processing-to-picked', $order->id) }}" class="btn btn-success text-white">Picked Order</a></th>
                            </tr>
                            @elseif($order->status == 'Picked')
                            <tr>
                                <th></th>
                                <th><a id="shipped" href="{{ route('picked-to-shipped', $order->id) }}" class="btn btn-success text-white">Shipped Order</a></th>
                            </tr>
                            @elseif($order->status == 'Shipped')
                            <tr>
                                <th></th>
                                <th><a id="delivered" href="{{ route('shipped-to-delivered', $order->id) }}" class="btn btn-success text-white">Delivered Order</a></th>
                            </tr>
                            @elseif($order->status == 'Delivered')
                            <tr>
                                <th></th>
                                <th><a id="cancel" href="{{ route('delivered-to-cancel', $order->id) }}" class="btn btn-success text-white">Cancel Order</a></th>
                            </tr>
                            @endif

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Items</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Weight</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItem as $item)
                                <tr>
                                    <td><img class="default-img" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $item->product->thumbnail }}" alt="" width="50px" height="50px" /></td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ $item->product->SKU }}</td>
                                    <td>{{ $item->weight }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price }}৳</td>
                                    <td>( {{ $item->price }} * {{ $item->qty }} = {{ $item->price * $item->qty }})৳</td>
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
