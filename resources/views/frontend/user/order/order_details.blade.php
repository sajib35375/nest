@extends('frontend.front_master')

@section('frontend')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> User <span></span> Order Details
            </div>
        </div>
    </div>

    <div class="page-content pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tab-content account dashboard-content pl-50">
                                <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Shipping Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tab-content account dashboard-content pl-50">
                                <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Order Details: <span class="text-danger">Invoice: {{ $order->invoice_no }}</span></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
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
                                                        <th class="badge rounded-pill bg-info text-dark">{{ $order->status }}</th>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content account dashboard-content pl-50">
                                <div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
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
                        </div>
                        @if($order->status == "Delivered")
                        @php
                            $return_order = \App\Models\Order::where('user_id', Auth::id())->where('id', $order->id)->where('return_reason', '=', NULL)->first();
                        @endphp
                        @if($return_order)
                        <form action="{{ route('return.order', $order->id) }}" method="POST">
                            @csrf
                            <div class="com-md-12">
                                <div class="form-group">
                                    <label for="label">Order Return Reason</label>
                                    <textarea name="return_reason" id="" class="form-control" class="30" cols="30" rows="05">Return Reason</textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-warning">Order Return</button>
                            </div>
                        </form>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="main">
    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')
    <!--End 4 columns-->
    @include('frontend.layout.footer')
</footer>
@endsection
