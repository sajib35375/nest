@php
    $posts = \App\Models\Post::where('views', '>', 0)->latest()->limit(5)->get();
    // dd($posts);
@endphp
<div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
    <h5 class="section-title style-1 mb-30">Popular Post</h5>
    @foreach($posts as $post)
    <div class="single-post clearfix">
        <div class="image">
            <img src="{{ URL::to('upload/posts/'.$post->image) }}" alt="#" style="width: 100%; height: 100%" />
        </div>
        <div class="content pt-10">
            <h5><a href="{{ route('single.blog', $post->slug) }}">{{ Str::words($post->title, 5, '...') }}</a></h5>
        </div>
    </div>
    @endforeach
</div>
