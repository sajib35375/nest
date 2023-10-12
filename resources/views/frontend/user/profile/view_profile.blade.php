@extends('frontend.front_master')

@section('frontend')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>

    <div class="container userimage__container">
        <img src="{{ (!empty($user->profile_photo_path))? URL::to('upload/userImages/'.$user->profile_photo_path) : URL::to('upload/no_image.jpg') }}" alt="" class="user_image">
    </div>
    <div class="page-content pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="return_orders-tab" data-bs-toggle="tab" href="#return_orders" role="tab" aria-controls="return_orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Return Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancel_orders-tab" data-bs-toggle="tab" href="#cancel_orders" role="tab" aria-controls="cancel_orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Cancel Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details Edit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="fi-rs-password mr-10"></i>Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Hello {{ $user->name }}!</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                                manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $orders = \App\Models\Order::where('user_id', Auth::id())->latest()->get();
                                    // dd($orders);
                                @endphp
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Transaction ID:</th>
                                                            <th>Invoice</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orders as $order)
                                                        <tr>
                                                            <td>#{{ $loop->index + 1 }}</td>
                                                            <td>{{ $order->order_date }}</td>
                                                            <td>{{ $order->amount }}৳</td>
                                                            <td>{{ $order->transaction_id }}</td>
                                                            <td>{{ $order->invoice_no }}</td>
                                                            <td>
                                                                @if($order->status == 'Pending')
                                                                    <span class="badge rounded-sm  pending"> Pending </span>
                                                                @elseif($order->status == 'Confirmed')
                                                                    <span class="badge rounded-sm  confirm"> Confirm </span>

                                                                @elseif($order->status == 'Processing')
                                                                    <span class="badge rounded-sm  processing"> Processing </span>

                                                                @elseif($order->status == 'Picked')
                                                                    <span class="badge rounded-sm  picked"> Picked </span>

                                                                @elseif($order->status == 'Shipped')
                                                                    <span class="badge rounded-sm  shipped"> Shipped </span>

                                                                @elseif($order->status == 'Delivered')
                                                                    <span class="badge rounded-sm  delivered"> Delivered </span>

                                                                        @if($order->return_order == 1)
                                                                        <span class="badge rounded-sm  return-request">Return Requested </span>

                                                                        @endif

                                                                @else
                                                                        <span class="badge rounded-sm  cancel"> Cancel </span>

                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a title="View" href="{{ url('/user/order-details/'.$order->id) }}" class="btn-small" target="_blank"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                                <a title="Invoice" href="{{ url('/user/invoice-download/'.$order->id) }}" class="btn-small" target="_blank"><i class="fa fa-download"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $return_orders = \App\Models\Order::where('user_id', Auth::id())->where('return_reason','!=', NULL)->latest()->get();
                                    // dd($orders);
                                @endphp
                                <div class="tab-pane fade" id="return_orders" role="tabpanel" aria-labelledby="return_orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Return Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Transaction ID:</th>
                                                            <th>Invoice</th>
                                                            <th>Order Number</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($return_orders as $order)
                                                        <tr>
                                                            <td>#{{ $loop->index + 1 }}</td>
                                                            <td>{{ $order->order_date }}</td>
                                                            <td>{{ $order->amount }}৳</td>
                                                            <td>{{ $order->transaction_id }}</td>
                                                            <td>{{ $order->invoice_no }}</td>
                                                            <td>{{ $order->order_number }}</td>
                                                            <td>
                                                                @if($order->return_order == 0)
                                                                <span class="badge rounded-pill r_r"> No Return Request </span>
                                                                @elseif($order->return_order == 1)
                                                                <span class="badge rounded-pill rr_pending"> Pedding </span>
                                                                <span class="badge rounded-pill return-request">Return Requested </span>

                                                                @elseif($order->return_order == 2)
                                                                 <span class="badge rounded-pill rr_success">Success </span>
                                                                 @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $cancel_orders = \App\Models\Order::where('user_id', Auth::id())->where('status', 'Cancel')->latest()->get();
                                    // dd($orders);
                                @endphp
                                <div class="tab-pane fade" id="cancel_orders" role="tabpanel" aria-labelledby="cancel_orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Cancel Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Transaction ID:</th>
                                                            <th>Invoice</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($cancel_orders as $order)
                                                        <tr>
                                                            <td>#{{ $loop->index + 1 }}</td>
                                                            <td>{{ $order->order_date }}</td>
                                                            <td>{{ $order->amount }}৳</td>
                                                            <td>{{ $order->transaction_id }}</td>
                                                            <td>{{ $order->invoice_no }}</td>
                                                            <td class="badge rounded-pill bg-info text-dark">{{ $order->status }}</td>
                                                            <td>
                                                                <a title="View" href="{{ url('/user/order-details/'.$order->id) }}" class="btn-small" target="_blank"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                                <a title="Invoice" href="{{ url('/user/invoice-download/'.$order->id) }}" class="btn-small" target="_blank"><i class="fa fa-download"></i></a>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <p class="text-danger">Order not found!</p>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Orders tracking</h3>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your Invoice Number in the box below and press "Track" button.</p>
                                            @if (session('error'))
                                                <div class="font-medium text-sm text-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="{{ route('order.traking') }}" method="post">
                                                        @csrf
                                                        <div class="input-style mb-20">
                                                            <label>Invoice No.</label>
                                                            <input name="code" placeholder="Invoice Number" type="text" />
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Billing Address</h3>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        3522 Interstate<br />
                                                        75 Business Spur,<br />
                                                        Sault Ste. <br />Marie, MI 49783
                                                    </address>
                                                    <p>New York</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        4299 Express Lane<br />
                                                        Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                                    </address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details Change</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="name" type="text" value="{{ $user->name }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="email" type="email" value="{{ $user->email }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Profile Photo <span class="required">*</span></label>
                                                        <input class="form-control" name="profile_photo_path" type="file" name="profile_photo_path" id="user_image" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <img id="showImage" src="{{ (!empty($user->profile_photo_path)) ? URL::to('upload/userImages/'.$user->profile_photo_path) : URL::to('upload/no_image.jpg') }}" alt="" class="edit_image">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Change Password</h5>
                                        </div>
                                        <x-jet-validation-errors class="mb-4 text-danger" />
                                        @if (session('status'))
                                            <div class="mb-4 font-medium text-sm text-green-600">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <form action="{{ route('password.update') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Current Password</label>
                                                    <input id="current_password" type="password" name="current_password" class="form-control">
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">New Password</label>
                                                    <input id="password" type="password" name="password" class="form-control">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
