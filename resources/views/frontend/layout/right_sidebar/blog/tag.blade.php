@php
    $all_tag = \App\Models\Tag::withCount('posts')->latest()->get();
    // dd($all_tag);
@endphp
<div class="sidebar-widget widget-tags mb-50 pb-10">
    <h5 class="section-title style-1 mb-30">Popular Tags</h5>
    <ul class="tags-list">
        @foreach($all_tag as $tag)
        <li class="hover-up">
            <a href="{{ route('tag.wise.blog', $tag->slug) }}"><i class="fi-rs-cross mr-10"></i>{{ $tag->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
