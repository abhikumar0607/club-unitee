@extends('layouts.customer-frontend')
@section('content')
    <!--FEATURED BLOG-->
    <section class="blog-hero container my-5">
        <div class="hero-wrapper p-4 p-md-5">
            @if ($featuredBlog)
                <h2 class="section-label mb-3 text-black">Featured</h2>
                <div class="featured-card">
                    @if ($featuredBlog->image)
                        <a href="{{ url('blog-detail/' . $featuredBlog->slug) }}">
                            <img src="{{ asset('assets/admin/uploads/blogs/' . $featuredBlog->image) }}" class="featured-img"
                                alt="Featured">
                        @else
                            No image found
                    @endif
                    </a>
                    <div class="featured-content">
                        <h1 class="featured-title">{{ $featuredBlog->title }}</h1>
                        <p class="featured-desc">{!! $featuredBlog->short_description !!}</p>
                        <div class="featured-author d-flex align-items-center gap-2 mt-4">
                            @if ($featuredBlog->author_image)
                                <img src="{{ asset('assets/admin/uploads/blogs/' . $featuredBlog->author_image) }}"
                                    class="author-img">
                            @endif
                            <div>
                                <p class="author-name mb-0">{{ $featuredBlog->author_name }}</p>
                                <p class="author-date mb-0">
                                    {{ \Carbon\Carbon::parse($featuredBlog->publish_date)->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="hero-tags mt-4">
                            <span class="tag">Site Features</span>
                            <span class="featured">Featured</span>
                        </div>
                    </div>
                </div>
            @else
                <h2 class="section-label mb-3 text-black">No Featured Blog Found</h2>
            @endif
        </div>
    </section>
    <!-- ================= BLOG TABS ================= -->
    <section class="blog-tabs-section container my-5">
        <div class="tabs-wrapper p-4 p-md-5">
            <!-- ===== TAB BUTTONS ===== -->
            <ul class="nav nav-pills-1 justify-content-center gap-2 mb-4" role="tablist">
                <li class="nav-item-1">
                    <a href="{{ url()->current() }}"
                        class="nav-link blog-tab-btn {{ !request('category') ? 'active' : '' }}">
                        All Posts
                    </a>
                </li>
                @foreach ($categories as $category)
                    <a href="{{ request()->fullUrlWithQuery(['category' => $category->slug, 'page' => 1]) }}"
                        class="nav-link blog-tab-btn {{ request('category') == $category->slug ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </ul>
            <!-- ===== TAB CONTENT ===== -->
            <div class="tab-content mt-4">
                <!-- ===== ALL POSTS ===== -->
                <div class="tab-pane fade show active" id="all">
                    <div class="row g-4">

                        @forelse ($blogs as $blog)
                            <div class="col-md-4">
                                <div class="post-card card-uni">
                                    <div class="mid-post-card">
                                        <a href="{{ url('blog-detail/' . $blog['slug']) }}">
                                            <img src="{{ asset('assets/admin/uploads/blogs/' . $blog['image']) }}"
                                                class="post-img">
                                        </a>
                                    </div>

                                    <div class="post-body pt-4">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <span class="post-date">
                                                {{ \Carbon\Carbon::parse($blog['publish_date'])->format('d M Y') }}
                                            </span>
                                            @foreach ($blog['category_details'] as $cat)
                                                <span class="tag tag-green">{{ $cat['name'] }}</span>
                                            @endforeach
                                        </div>

                                        <h5 class="post-title">
                                            <a href="{{ url('blog-detail/' . $blog['slug']) }}"
                                                class="text-decoration-none text-reset">
                                                {{ $blog['title'] }}
                                            </a>
                                        </h5>

                                        <p class="post-desc">
                                            {!! $blog['short_description'] !!}
                                        </p>

                                        <hr>

                                        <div class="d-flex align-items-center gap-2 mt-3">
                                            <img src="{{ asset('assets/admin/uploads/blogs/' . $blog['author_image']) }}"
                                                class="author-img">
                                            <div>
                                                <p class="author-name mb-0">{{ $blog['author_name'] }}</p>
                                                <p class="author-role mb-0">{{ $blog['author_type'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <!-- NO POSTS FOUND (ALL POSTS) -->
                            <div class="col-12 text-center">
                                <p class="text-muted fw-semibold blog-empty-msg">
                                    No blog posts found.
                                </p>
                            </div>
                        @endforelse

                    </div>
                </div>

                <!-- ===== CATEGORY WISE POSTS ===== -->
                @foreach ($categories as $category)
                    <div class="tab-pane fade" id="cat-{{ $category->id }}">
                        <div class="row g-4">
                            @php
                                $hasBlog = false;
                            @endphp
                            @foreach ($blogs as $blog)
                                @foreach ($blog['category_details'] as $cat)
                                    @if ($cat['id'] == $category->id)
                                        @php $hasBlog = true; @endphp
                                        <div class="col-md-4">
                                            <div class="post-card card-uni">
                                                <div class="mid-post-card">
                                                    <a href="{{ url('blog-detail/' . $blog['slug']) }}">
                                                        <img src="{{ asset('assets/admin/uploads/blogs/' . $blog['image']) }}"
                                                            class="post-img">
                                                    </a>
                                                </div>
                                                <div class="post-body pt-4">
                                                    <div class="d-flex align-items-center gap-3 mb-2">
                                                        <span class="post-date">
                                                            {{ \Carbon\Carbon::parse($blog['publish_date'])->format('d M Y') }}
                                                        </span>
                                                        <span class="tag tag-green">
                                                            {{ $category->name }}
                                                        </span>
                                                    </div>
                                                    <h5 class="post-title">
                                                        <a href="{{ url('blog-detail/' . $blog['slug']) }}"
                                                            class="text-decoration-none text-reset">
                                                            {{ \Illuminate\Support\Str::words(strip_tags($blog->title), 20) }}
                                                        </a>
                                                    </h5>
                                                    <p class="post-desc">
                                                        {!! \Illuminate\Support\Str::words(strip_tags($blog->short_description), 20) !!}
                                                    </p>
                                                    <hr>
                                                    <div class="d-flex align-items-center gap-2 mt-3">
                                                        <img src="{{ asset('assets/admin/uploads/blogs/' . $blog['author_image']) }}"
                                                            class="author-img">
                                                        <div>
                                                            <p class="author-name mb-0">{{ $blog['author_name'] }}</p>
                                                            <p class="author-role mb-0">{{ $blog['author_type'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endforeach
                @if ($blogs->count())
                    <div class="mt-4">
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    </div>
                @endif
                {{-- @if (request('category') && $blogs->count() === 0)
                    <div class="col-12 text-center">
                        <p class="text-muted fw-semibold blog-empty-msg">
                            No blogs were found in the
                            <strong>
                                {{ $categories->firstWhere('slug', request('category'))->name ?? request('category') }}
                            </strong>
                            category.
                        </p>
                    </div>
                @endif --}}
            </div>
        </div>
    </section>
@endsection
