@extends('frontend.front_master')

@section('frontend')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> {{ $post->title }}
            </div>
        </div>
    </div>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-page pt-50 pr-30">
                                <div class="single-header style-2">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 m-auto">
                                            <h6 class="mb-10">
                                                @foreach($post->categories as $cat)
                                                    <a href="{{ route('categroy.wise.blog', $cat->slug) }}">{{ $cat->name }}</a>,
                                                @endforeach
                                            </h6>
                                            <h2 class="mb-10"><span></span> {{ $post->title }}</h2>
                                            <div class="single-header-meta">
                                                <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                                    <a class="author-avatar" href="#">
                                                        <img class="img-circle" style="border-radius: 50%;" src="{{ URL::to('upload/admin_images/'.$post->user->profile_photo_path) }}" alt="" />
                                                    </a>
                                                    <span class="post-by">By <a href="#">{{ $post->user->name }}</a></span>
                                                    <span class="post-on has-dot">{{ $post->created_at->diffForHumans(); }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <figure class="single-thumbnail">
                                    <img src="{{ URL::to('upload/posts/'.$post->image) }}" alt="" />
                                </figure>
                                <div class="single-content">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 m-auto">
                                            <p class="single-excerpt">{!! htmlspecialchars_decode($post->description) !!}</p>

                                            <!--Entry bottom-->
                                            <div class="entry-bottom mt-50 mb-30">
                                                <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                            </div>
                                            <!--Author box-->
                                            <!--Comment form-->
                                            <div class="comment-form">
                                                <h3 class="mb-15">Leave a Comment</h3>
                                                <div class="row">
                                                    <div class="col-lg-9 col-md-12">
                                                        <div id="disqus_thread"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50">
                            <div class="widget-area">
                                @include('frontend.layout.right_sidebar.blog.search_form')
                                @include('frontend.layout.right_sidebar.blog.category')
                                @include('frontend.layout.right_sidebar.blog.popular_post')
                                @include('frontend.layout.right_sidebar.blog.tag')
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
