@extends('frontend.front_master')

@section('frontend')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> About us
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="row align-items-center mb-50">
                        <div class="col-lg-6">
                            <img src="{{ URL::to('upload/about/'.$data->welcome_image) }}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                        </div>
                        <div class="col-lg-6">
                            <div class="pl-25">
                                <h2 class="mb-30">{{ $data->welcome_title }}</h2>
                                <p class="mb-25">{!! htmlspecialchars_decode($data->welcome_description) !!}</p>
                                <div class="carausel-3-columns-cover position-relative">
                                    <div id="carausel-3-columns-arrows"></div>
                                    <div class="carausel-3-columns" id="carausel-3-columns">
                                        @php
                                             $gallery_one = json_decode($data->welcome_gallery);
                                        @endphp
                                        @foreach ($gallery_one as $gal)
                                            <img src="{{ URL::to('upload/about/'.$gal) }}" alt="" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="text-center mb-50">
                        <h2 class="title style-3 mb-40">What We Provide?</h2>
                        <div class="row">
                            @php
                                $provide = json_decode($data->provide);
                            @endphp
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ URL::to('upload/about/'.$provide->provide_logo[0]) }}" alt="" />
                                    <h4>{{ $provide->provide_title[0] }}</h4>
                                    <p>{{ $provide->provide_description[0] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ URL::to('upload/about/'.$provide->provide_logo[1]) }}" alt="" />
                                    <h4>{{ $provide->provide_title[1] }}</h4>
                                    <p>{{ $provide->provide_description[1] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ URL::to('upload/about/'.$provide->provide_logo[2]) }}" alt="" />
                                    <h4>{{ $provide->provide_title[2] }}</h4>
                                    <p>{{ $provide->provide_description[2] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ URL::to('upload/about/'.$provide->provide_logo[3]) }}" alt="" />
                                    <h4>{{ $provide->provide_title[3] }}</h4>
                                    <p>{{ $provide->provide_description[3] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ URL::to('upload/about/'.$provide->provide_logo[4]) }}" alt="" />
                                    <h4>{{ $provide->provide_title[4] }}</h4>
                                    <p>{{ $provide->provide_description[4] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ URL::to('upload/about/'.$provide->provide_logo[5]) }}" alt="" />
                                    <h4>{{ $provide->provide_title[5] }}</h4>
                                    <p>{{ $provide->provide_description[5] }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="row align-items-center mb-50">
                        <div class="row mb-50 align-items-center">
                            <div class="col-lg-7 pr-30">
                                <img src="{{ URL::to('upload/about/'.$data->performance_image_one) }}" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" />
                            </div>
                            <div class="col-lg-5">
                                <h4 class="mb-20 text-muted">Our performance</h4>
                                <h1 class="heading-1 mb-40">{{ $data->performance_title }}</h1>
                                <p class="mb-30">{!! htmlspecialchars_decode($data->performance_description) !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Who we are</h3>
                                <p>{!! htmlspecialchars_decode($data->who_we_are_description) !!}</p>
                            </div>
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Our history</h3>
                                <p>{!! htmlspecialchars_decode($data->our_history_description) !!}</p>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="mb-30">Our mission</h3>
                                <p>{!! htmlspecialchars_decode($data->our_mission_description) !!}</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <section class="container mb-50 d-none d-md-block">
            <div class="row about-count">
                <div class="col-lg-1-5 col-md-6 text-center mb-lg-0 mb-md-5">
                    <h1 class="heading-1"><span class="count">{{ $data->glorious_years }}</span>+</h1>
                    <h4>Glorious years</h4>
                </div>
                <div class="col-lg-1-5 col-md-6 text-center">
                    <h1 class="heading-1"><span class="count">{{ $data->happy_clients }}</span>+</h1>
                    <h4>Happy clients</h4>
                </div>
                <div class="col-lg-1-5 col-md-6 text-center">
                    <h1 class="heading-1"><span class="count">{{ $data->projects_complate }}</span>+</h1>
                    <h4>Projects complete</h4>
                </div>
                <div class="col-lg-1-5 col-md-6 text-center">
                    <h1 class="heading-1"><span class="count">{{ $data->team_advisor }}</span>+</h1>
                    <h4>Team advisor</h4>
                </div>
                <div class="col-lg-1-5 text-center d-none d-lg-block">
                    <h1 class="heading-1"><span class="count">{{ $data->products_sale }}</span>+</h1>
                    <h4>Products Sale</h4>
                </div>
            </div>
        </section>
    </div>
</main>

<footer class="main">
    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')
    <!--End 4 columns-->
    @include('frontend.layout.footer')
</footer>
@endsection
