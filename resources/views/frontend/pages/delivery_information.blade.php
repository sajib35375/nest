@extends('frontend.front_master')

@section('frontend')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> Delivery Information
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                <div class="single-header style-2">
                                    <h2>{{ $data->title }}</h2>
                                    <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
                                        <span class="post-by">By <a href="#">{{ $data->created_by }}</a></span>
                                        <span class="post-on has-dot">{{ date('d F Y'. strtotime($data->created_by)) }}</span>
                                    </div>
                                </div>
                                <div class="single-content mb-50">
                                    {!! htmlspecialchars_decode($data->description) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 primary-sidebar sticky-sidebar">
                            <div class="widget-area">
                                @include('frontend.layout.right_sidebar.search_form')
                                @include('frontend.layout.right_sidebar.category')
                                <!-- Product sidebar Widget -->
                                @include('frontend.layout.right_sidebar.tranding_now')
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
