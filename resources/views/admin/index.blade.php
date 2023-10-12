@extends('admin.admin_master')
@section('admin')
@php
	$date = date('Y-m-d');
	$today = App\Models\Order::where('order_date',$date)->sum('amount');
	$month = date('F');
	$month = App\Models\Order::where('order_month',$month)->sum('amount');
    $year = date('Y');
	$year = App\Models\Order::where('order_year',$year)->sum('amount');
    $pending = App\Models\Order::where('status','pending')->get();
@endphp
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Dashboard</h2>
            <p>Whole data about your business here</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Today's Sale</h6>
                        <span>{{ $today  }}৳</span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-info material-icons md-shopping_basket"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Monthly Sale</h6>
                        <span>{{ $month }}৳</span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Yearly Sale</h6>
                        <span>{{ $year }}৳</span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Pending Orders</h6>
                        <span>{{ count($pending) }}</span>
                    </div>
                </article>
            </div>
        </div>
    </div>
    @php
        $orders = App\Models\Order::where('status','Pending')->orderBy('id','DESC')->get();
	@endphp
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle" scope="col">Date</th>
                                <th class="align-middle" scope="col">Invoice</th>
                                <th class="align-middle" scope="col">Amount</th>
                                <th class="align-middle" scope="col">Payment</th>
                                <th class="align-middle" scope="col">Status</th>
                                <th class="align-middle" scope="col">Process</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                            <tr>
                                <td class="pl-0 py-8">
                                        <span>
                                            {{ $item->order_date  }}
                                        </span>
                                </td>

                                <td>

                                        <span>
                                            {{ $item->invoice_no }}
                                        </span>
                                    </td>

                                    <td>
                                        <span>
                                            {{ $item->amount }}৳
                                        </span>

                                    </td>

                                    <td>

                                        <span>
                                            {{ $item->payment_method }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary badge-lg">{{ $item->status }}</span>
                                    </td>

                                    <td class="text-right">
                                        <a href="{{ route('order.pending.details', $item->id) }}" class="btn btn-info btn-circle mx-5">Details</a>
                                    </td>
                                </tr>
                             @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- table-responsive end// -->
        </div>
    </div>
</section>
@endsection
