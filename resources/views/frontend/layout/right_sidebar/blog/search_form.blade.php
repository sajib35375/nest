<div class="sidebar-widget-2 widget_search mb-50">
    <div class="search-form">
        <form action="{{ route('blog-search-form') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search…" />
            <button type="submit"><i class="fi-rs-search"></i></button>
        </form>
    </div>
</div>
