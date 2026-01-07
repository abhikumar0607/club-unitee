@extends('layouts.customer-frontend')

@section('content')
    <!-- ====================== BLOG DETAIL WRAPPER ====================== -->
    <div class="blog-detail-page pt-5">

        <!-- <div class="container">
            

        </div> -->

        <!-- ================= CONTENT SECTION ================= -->
        <section class="blog-detail-content container mb-5">
            <!-- ================= HERO BANNER ================= -->
            <div class="blog-detail-hero">
                @if ($blog_detail->image)
                    <img src="{{ asset('assets/admin/uploads/blogs/' . $blog_detail->image) }}" class="blog-detail-hero-img"
                        alt="">
                @else
                    No Image found
                @endif
                <div class="blog-detail-hero-overlay"></div>

                <div class="blog-detail-hero-content container">

                    <div class="d-flex align-items-center gap-2 mb-2">
                        @foreach ($blog_detail['category_details'] as $cat)
                            <span class="badge blog-badge-category">{{ $cat['name'] }}</span>
                        @endforeach
                        <span
                            class="blog-detail-date">{{ \Carbon\Carbon::parse($blog_detail['publish_date'])->format('d M Y') }}</span>
                    </div>
                    <h1 class="blog-detail-title">{{ $blog_detail->title }}</h1>
                    <div class="blog-detail-author d-flex align-items-center gap-2 mt-3">
                        @if ($blog_detail->author_image)
                            <img src="{{ asset('assets/admin/uploads/blogs/' . $blog_detail->author_image) }}"
                                class="author-photo">
                        @else
                            No Image found
                        @endif
                        <div>
                            <p class="author-name">{{ $blog_detail->author_name }}</p>
                            <p class="author-role">{{ $blog_detail->author_type }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- ARTICLE SECTION -->
                <div class="col-lg-8 blog-detail-article">

                    {!! $blog_detail->description !!}

                </div>

                <!-- ================= SIDEBAR ================= -->
                @if($blogs->count() > 0)  
                <div class="col-lg-4 blog-detail-sidebar">
                    <div class="sidebar-box">
                        <h4 class="sidebar-title">Latest Posts</h4>
                        @foreach($blogs as $blog)
                            <div class="sidebar-product-card">
                               @if ($blog->image)
                                    <img src="{{ asset('assets/admin/uploads/blogs/' . $blog->image) }}" class="product-img"
                                        alt="">
                                @else
                                    No Image found
                                @endif
                                <p class="product-title">{{ $blog->title }}</p>
                                <a href="{{ url('blog-detail/' . $blog['slug']) }}">
                                          View Detail
                                </a>
                            </div>
                        @endforeach    
                    </div>
                </div>
                @endif 

            </div>

        </section>
    </div>
@endsection
