@php
    $all_cat = \App\Models\Category::withCount('posts')->latest()->get();
    // dd($all_cat);
@endphp
<div class="sidebar-widget widget-category-2 mb-50">
    <h5 class="section-title style-1 mb-30">Category</h5>
    <ul>
        @foreach ($all_cat as $cat)
            @if($cat->posts_count > 0)
            <li>
                <a href="{{ route('categroy.wise.blog', $cat->slug) }}"> <img src="{{ URL::to('upload/posts/category/'.$cat->icon) }}" alt="" />{{ $cat->name }}</a><span class="count">{{ $cat->posts_count }}</span>
            </li>
            @endif
        @endforeach
    </ul>
</div>
