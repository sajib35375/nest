@extends('frontend.front_master')

@section('frontend')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> User <span></span> Order Traking
            </div>
        </div>
    </div>

    <div class="page-content pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <article class="card my-5">
                        <header class="card-header"> My Orders / Tracking </header>
                        <div class="card-body">
                            <h6>Order Number: {{ $track->order_number }}</h6>
                            <article class="card">
                                <div class="card-body row">
                                    <div class="col"> <strong>Invoice Number:</strong> <br>{{ $track->invoice_no }}</div>
                                    <div class="col"> <strong>Order Date:</strong> <br> {{ $track->order_date }}</div>
                                    <div class="col"> <strong>Shipping By - {{ $track->name }}:</strong> <br>{{ $track->division->division_name }}/{{ $track->district->district_name }}</div>
                                    <div class="col"> <strong>User Mobile No.:</strong> <br> {{ $track->phone }}</div>
                                    <div class="col"> <strong>Payment Method:</strong> <br>{{ $track->payment_method }}</div>
                                    <div class="col"> <strong>Total Amount:</strong> <br>{{ $track->amount }}৳</div>
                                </div>
                            </article>
                            <div class="track">
                                @if($track->status == 'Pending')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirm</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                                @elseif($track->status == 'Confirmed')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirm</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                                @elseif($track->status == 'Processing')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirm</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                                @elseif($track->status == 'Picked')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirm</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                                @elseif($track->status == 'Shipped')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirm</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                                @elseif($track->status == 'Delivered')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirm</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                                @endif
                            </div>
                            <hr>
                            <hr>
                        </div>
                    </article>
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
