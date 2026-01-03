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
            @if($blog_detail->image)
            <img src="{{ asset('assets/admin/uploads/blogs/'.$blog_detail->image) }}" class="blog-detail-hero-img"
                alt="">
            @else
            No Image found
            @endif
            <div class="blog-detail-hero-overlay"></div>

            <div class="blog-detail-hero-content container">

                <div class="d-flex align-items-center gap-2 mb-2">
                    @foreach($blog_detail['category_details'] as $cat)
                    <span class="badge blog-badge-category">{{ $cat['name'] }}</span>
                    @endforeach
                    <span
                        class="blog-detail-date">{{ \Carbon\Carbon::parse($blog_detail['publish_date'])->format('d M Y') }}</span>
                </div>

                <h1 class="blog-detail-title">{{ $blog_detail->title }}</h1>

                <div class="blog-detail-author d-flex align-items-center gap-2 mt-3">
                    <img src="{{ asset('assets/customer/images/playing-golf.jpg') }}" class="author-photo">
                    <div>
                        <p class="author-name">{{ $blog_detail->author_name }}</p>
                        <p class="author-role">{{ $blog_detail->author_type }}</p>
                    </div>
                </div>

                    <h1 class="blog-detail-title">{{ $blog_detail->title }}</h1>

                    <div class="blog-detail-author d-flex align-items-center gap-2 mt-3">
                        @if($blog_detail->author_image)
                            <img src="{{ asset('assets/admin/uploads/blogs/' .$blog_detail->author_image) }}" class="author-photo">
                        @else
                            No Image found
                        @endif  
                        <div>
                            <p class="author-name">{{ $blog_detail->author_name }}</p>
                            <p class="author-role">{{ $blog_detail->author_type }}</p>
                        </div>
                    </div>

                    <!-- <button class="btn btn-outline-light blog-detail-share-btn">
                        Share Post
                    </button> -->
            </div>
        </div>
        <div class="row">

            <!-- ARTICLE SECTION -->
            <div class="col-lg-8 blog-detail-article">

                {!! $blog_detail->description !!}

            </div>

            <!-- ================= SIDEBAR ================= -->
            <!-- <div class="col-lg-4 blog-detail-sidebar">

                    <div class="sidebar-box">
                        <h4 class="sidebar-title">Recommended Products</h4>

                        <div class="sidebar-product-card">
                            <img src="images/golf-glove.jpg" class="product-img">
                            <p class="product-title">Titleist Tour Soft</p>
                            <button class="btn btn-success w-100 btn-sm mt-2 mb-4">View on Amazon</button>
                        </div>

                        <div class="sidebar-product-card">
                            <img src="images/golf-club-outdoors.jpg" class="product-img">
                            <p class="product-title">Golf Alignment Aid</p>
                            <button class="btn btn-success w-100 btn-sm mt-2">View on Amazon</button>
                        </div>

                    </div>

                </div> -->

        </div>

    </section>
</div>

@endsection