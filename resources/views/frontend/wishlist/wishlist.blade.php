@extends('frontend.front_master')
@section('frontend')



    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop <span></span> Fillter
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="mb-50">
                        <h1 class="heading-2 mb-10">Your Wishlist</h1>
                        <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>
                    </div>
                    <div class="table-responsive shopping-summery">




                        <table class="table table-wishlist">




                            <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                            </thead>

                            <tbody id="wishProduct">

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </main>


    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')

    <section class="section-padding mb-30">
        <div class="container">
            {{--                <div class="row">--}}
            {{--                    @include('frontend.layout.top_selling')--}}
            {{--                    @include('frontend.layout.trending_product')--}}
            {{--                    @include('frontend.layout.recet_product')--}}
            {{--                    @include('frontend.layout.top_rated_product')--}}
            {{--                </div>--}}
        </div>
    </section>

    <!--End 4 columns-->
    @include('frontend.layout.footer')

@endsection
