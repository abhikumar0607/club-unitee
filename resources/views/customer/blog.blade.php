@extends('layouts.customer-frontend')

@section('content')
    <!-- MAIN CONTENT -->
    <section class="blog-hero container my-5">
        <div class="hero-wrapper p-4 p-md-5">

            <h2 class="section-label mb-3 text-black">Featured</h2>

            <div class="featured-card">
                <img src="{{ asset('customer/images/photo-golf-scorecard.avif') }}" alt="Featured Blog Banner" class="featured-img">

                <div class="featured-content">
                    <h1 class="featured-title">
                        Ryder Cup Golf Tournaments <br>
                        Now on Buddies on the Green
                    </h1>

                    <p class="featured-desc">
                        Create epic Ryder Cup-style golf tournaments with team pairings,
                        live scoring, strategic captain play, and real-time commentary—
                        all now possible on Buddies on the Green!
                    </p>

                    <div class="featured-author d-flex align-items-center gap-2 mt-4">
                        <img src="{{ asset('customer/images/author.webp') }}" alt="Author" class="author-img">
                        <div>
                            <p class="author-name mb-0">Chad Comstock</p>
                            <p class="author-date mb-0">11/5/2025</p>
                        </div>
                    </div>

                    <div class="hero-tags mt-4">
                        <span class="tag">Site Features</span>
                        <span class="featured">Featured</span>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- next section  -->

    <section class="blog-tabs-section container my-5">

        <div class="tabs-wrapper p-4 p-md-5">

            <!-- TAB BUTTONS -->
            <ul class="nav nav-pills-1 justify-content-center gap-2 mb-4" id="blogTabs" role="tablist">

                <li class="nav-item-1">
                    <button class="nav-link active blog-tab-btn" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                        type="button" role="tab">
                        All Posts
                    </button>
                </li>

                <li class="nav-item-1">
                    <button class="nav-link blog-tab-btn" id="beginner-tab" data-bs-toggle="tab" data-bs-target="#beginner"
                        type="button" role="tab">
                        Beginner Tips
                    </button>
                </li>

                <li class="nav-item-1">
                    <button class="nav-link blog-tab-btn" id="improvement-tab" data-bs-toggle="tab"
                        data-bs-target="#improvement" type="button" role="tab">
                        Game Improvement
                    </button>
                </li>

                <li class="nav-item-1">
                    <button class="nav-link blog-tab-btn" id="community-tab" data-bs-toggle="tab"
                        data-bs-target="#community" type="button" role="tab">
                        Community
                    </button>
                </li>

                <li class="nav-item-1">
                    <button class="nav-link blog-tab-btn" id="sidegames-tab" data-bs-toggle="tab"
                        data-bs-target="#sidegames" type="button" role="tab">
                        Side Games
                    </button>
                </li>

            </ul>

            <!-- TAB CONTENT -->
            <div class="tab-content mt-4" id="blogTabsContent">

                <!-- TAB 1 -->
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <div class="row g-4">

                        <!-- POST CARD 1 -->
                        <div class="col-md-4">
                            <a href="blog-detail.html" class="text-decoration-none text-black">
                                <div class="post-card card-uni h-100">

                                    <div class="mid-post-card">
                                        <img src="{{ asset('customer/images/Golf Blog.jpg') }}" class="post-img">
                                    </div>
                                    <div class="post-body pt-4">

                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <span class="post-date">11/20/2025</span>
                                            <span class="tag tag-green">Side Games</span>
                                        </div>

                                        <h5 class="post-title">
                                            Snake: The Three-Putt Penalty Golf Game Explained
                                        </h5>

                                        <p class="post-desc">
                                            Learn how to play Snake, the putting-focused penalty game where
                                            the last player to three-putt loses and pays everyone else.
                                        </p>

                                        <hr>

                                        <div class="d-flex align-items-center gap-2 mt-3">
                                            <img src="images/01.png" class="author-img">
                                            <div>
                                                <p class="author-name mb-0">Chad Comstock</p>
                                                <p class="author-role mb-0">Author</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- CARD 2 -->
                        <div class="col-md-4">
                            <a href="blog-detail.html" class="text-decoration-none text-black">
                                <div class="post-card card-uni h-100">

                                    <div class="mid-post-card">
                                        <img src="{{ asset('customer/images/A Women Golfer.jpg') }}" class="post-img">
                                    </div>

                                    <div class="post-body pt-4">

                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <span class="post-date">11/20/2025</span>
                                            <span class="tag tag-green">Side Games</span>
                                        </div>

                                        <h5 class="post-title">
                                            Skins: Winner Takes All Golf Game Explained
                                        </h5>

                                        <p class="post-desc">
                                            Learn how to play Skins, the exciting winner-takes-all golf game
                                            where every hole matters and carryovers create dramatic moments.
                                        </p>

                                        <hr>

                                        <div class="d-flex align-items-center gap-2 mt-3">
                                            <img src="images/02.png" class="author-img">
                                            <div>
                                                <p class="author-name mb-0">Chad Comstock</p>
                                                <p class="author-role mb-0">Author</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- CARD 3 -->
                        <div class="col-md-4">
                            <a href="blog-detail.html" class="text-decoration-none text-black">
                                <div class="post-card card-uni h-100">

                                    <div class="mid-post-card">
                                        <img src="{{ asset('customer/images/B Woman Golfer.jpg') }}" class="post-img">
                                    </div>

                                    <div class="post-body pt-4">

                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <span class="post-date">11/20/2025</span>
                                            <span class="tag tag-green">Side Games</span>
                                        </div>

                                        <h5 class="post-title">
                                            Nassau: The Classic Golf Betting Game Explained
                                        </h5>

                                        <p class="post-desc">
                                            Learn how to play Nassau, the most popular golf betting game.
                                            Discover strategies, scoring rules, and how payouts are calculated.
                                        </p>

                                        <hr>

                                        <div class="d-flex align-items-center gap-2 mt-3">
                                            <img src="{{ asset('customer/images/03.png') }}" class="author-img">
                                            <div>
                                                <p class="author-name mb-0">Chad Comstock</p>
                                                <p class="author-role mb-0">Author</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TAB 2 -->
                <div class="tab-pane fade" id="beginner" role="tabpanel">
                    <p class="tab-text">Beginner Tips: Dummy post content goes here.</p>
                </div>

                <!-- TAB 3 -->
                <div class="tab-pane fade" id="improvement" role="tabpanel">
                    <p class="tab-text">Game Improvement posts will be shown here.</p>
                </div>

                <!-- TAB 4 -->
                <div class="tab-pane fade" id="community" role="tabpanel">
                    <p class="tab-text">Community stories and golf experiences.</p>
                </div>

                <!-- TAB 5 -->
                <div class="tab-pane fade" id="sidegames" role="tabpanel">
                    <p class="tab-text">Side Games category posts appear here.</p>
                </div>

            </div>

        </div>

    </section>
@endsection
