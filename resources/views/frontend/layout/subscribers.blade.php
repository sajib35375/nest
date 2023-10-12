<section class="newsletter mb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="position-relative newsletter-inner">
                    <div class="newsletter-content">
                        <h2 class="mb-20">
                            Stay home & get your daily <br />
                            needs from our shop
                        </h2>
                        <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest Mart</span></p>
                        @if (session('success'))
                            <div class="mb-4 font-medium text-sm bg-green p-1 rounded-sm">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-subcriber d-flex" action="{{ route('store.subscriber') }}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Your emaill address" />
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <img src="{{ URL::to('frontend/') }}/assets/imgs/banner/banner-13.png" alt="newsletter" />
                </div>
            </div>
        </div>
    </div>
</section>
