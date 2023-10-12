@extends('frontend.front_master')

@section('frontend')
<main class="main">
    <div class="page-header mt-30 mb-75">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Blog & News</h1>
                        <div class="breadcrumb">
                            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> {{ $categories->name }}
                        </div>
                    </div>
                    <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            @foreach($all_cat as $cat)
                            <li class="hover-up">
                                <a href="{{ route('categroy.wise.blog', $cat->slug) }}"><i class="fi-rs-cross mr-10"></i>{{ $cat->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="loop-grid pr-30">
                        <div class="row">
                            @foreach($posts as $post)
                            <article class="col-xl-4 col-lg-6 col-md-6 text-center hover-up mb-30 animated">
                                <div class="post-thumb">
                                    <a href="{{ route('single.blog', $post->slug) }}">
                                        <img class="border-radius-15" src="{{ URL::to('upload/posts/'.$post->image) }}" alt="" />
                                    </a>
                                </div>
                                <div class="entry-content-2">
                                    <h6 class="mb-10 font-sm">
                                        @foreach($post->categories as $cat)
                                        <a class="entry-meta text-muted" href="{{ route('categroy.wise.blog', $cat->slug) }}">{{ $cat->name }}</a>,
                                        @endforeach
                                    </h6>
                                    <h4 class="post-title mb-15">
                                        <a href="{{ route('single.blog', $post->slug) }}">{{ Str::words($post->title, 5, '...') }}</a>
                                    </h4>
                                    <div class="entry-meta font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on mr-10">{{ date('d F Y', strtotime($post->created_at)) }}</span>
                                            <span class="hit-count has-dot mr-10">{{ $post->views }} Views</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{ $posts->links('vendor.pagination.default') }}
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
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
</main>

<footer class="main">
    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')
    <!--End 4 columns-->
    @include('frontend.layout.footer')
</footer>
@endsection
