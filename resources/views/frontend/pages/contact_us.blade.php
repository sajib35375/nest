@extends('frontend.front_master')

@section('frontend')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> Contact
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="row align-items-end mb-50">
                        <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                            <h4 class="mb-20 text-brand">How can help you ?</h4>
                            <h1 class="mb-30">{{ $data->main_title }}</h1>
                            <p class="mb-20">{!! htmlspecialchars_decode($data->main_description) !!}</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <h5 class="mb-20">01. {{ $data->sub_title_one }}</h5>
                                    <p>{!! htmlspecialchars_decode($data->sub_description_one) !!}</p>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <h5 class="mb-20">02. {{ $data->sub_title_two }}</h5>
                                    <p>{!! htmlspecialchars_decode($data->sub_description_two) !!}</p>
                                </div>
                                <div class="col-lg-6 mb-lg-0 mb-4">
                                    <h5 class="mb-20 text-brand">03. {{ $data->sub_title_three }}</h5>
                                    <p>{!! htmlspecialchars_decode($data->sub_description_three) !!}</p>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-20">04. {{ $data->sub_title_four }}</h5>
                                    <p>{!! htmlspecialchars_decode($data->sub_description_four) !!}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <section class="container mb-50 d-none d-md-block">
            <div class="border-radius-15 overflow-hidden">
                <div class="leaflet-map">
                    {!! htmlspecialchars_decode($data->embded_googlemap_link) !!}
                </div>
            </div>
        </section>
        <style>
            .leaflet-map iframe {
                display: block;
                margin: auto;
                width: 85%;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row mb-60">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <h4 class="mb-15 text-brand">Office</h4>
                                {!! htmlspecialchars_decode($data->office_address) !!}<br />
                                <abbr title="Phone">Phone:</abbr> {{ $data->office_phone }}<br />
                                <abbr title="Email">Email: </abbr>{{ $data->office_email }}<br />
                                <a target="_blank" class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up" href="{{ $data->office_googlemap_url }}"><i class="fi-rs-marker mr-5"></i>View map</a>
                            </div>
                            <div class="col-md-4 mb-4 mb-md-0">
                                <h4 class="mb-15 text-brand">Studio</h4>
                                {!! htmlspecialchars_decode($data->studio_address) !!}<br />
                                <abbr title="Phone">Phone:</abbr> {{ $data->studio_phone }}<br />
                                <abbr title="Email">Email: </abbr>{{ $data->studio_email }}<br />
                                <a target="_blank" class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up" href="{{ $data->studio_googlemap_url }}"><i class="fi-rs-marker mr-5"></i>View map</a>
                            </div>
                            <div class="col-md-4">
                                <h4 class="mb-15 text-brand">Shop</h4>
                                {!! htmlspecialchars_decode($data->shop_address) !!}<br />
                                <abbr title="Phone">Phone:</abbr> {{ $data->shop_phone }}<br />
                                <abbr title="Email">Email: </abbr>{{ $data->shop_email }}<br />
                                <a target="_blank" class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up" href="{{ $data->shop_googlemap_url }}"><i class="fi-rs-marker mr-5"></i>View map</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="contact-from-area padding-20-row-col">
                                    <h5 class="text-brand mb-10">Contact form</h5>
                                    <h2 class="mb-10">Drop Us a Line</h2>
                                    <p class="text-muted mb-30 font-sm">Your email address will not be published. Required fields are marked *</p>
                                    @if (session('success'))
                                        <div class="mb-4 font-medium text-sm bg-green p-1 rounded-sm">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form class="contact-form-style mt-30" id="contact-form" action="{{ route('store.contact-form') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="name" placeholder="Full Name *" type="text" />
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="email" placeholder="Your Email *" type="email" />
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="phone" placeholder="Your Phone *" type="tel" />
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="subject" placeholder="Subject *" type="text" />
                                                    @error('subject')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="textarea-style mb-30">
                                                    <textarea name="message" placeholder="Message *"></textarea>
                                                    @error('message')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button class="submit submit-auto-width" type="submit">Send message</button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                            <div class="col-lg-4 pl-50 d-lg-block d-none">
                                <img class="border-radius-15 mt-50" src="assets/imgs/page/contact-2.png" alt="" />
                            </div>
                        </div>
                    </section>
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
