@extends('layouts.customer-frontend')
@section('content')
  <!-- HERO SECTION -->
  <section class="py-5 hero-section">
    <div class="container text-center py-5 play-together-rise-together">
      <h1 class="display-4 fw-bold font-with-2 text-white mb-3">Play Together. <br> Rise Together.</h1>
      <p class="lead mb-4 text-white" style="max-width:700px;margin:auto;">
        Join a joyful community of women supporting one another and shaping a better world—on and off the
        course. Find your next golf buddies here.
      </p>
      <a href="apply.html" class="btn btn-lg px-5 join-apply">Apply to Join</a>
    </div>
  </section>

  <!-- VALUE PROPS -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title text-center">Why Join?</h2>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card-uni-1 text-center">
            <h5 class="fw-bold">Supportive Community</h5>
            <p>Great Community: Connect with women who share your interests.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card-uni1 text-center">
            <h5 class="fw-bold">All Skill Levels Welcome</h5>
            <p>Beginner or intermediate — everyone belongs.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card-uni2 text-center">
            <h5 class="fw-bold">Invitation-Only Events</h5>
            <p>Join member activities on and off the greens.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="features-section py-5">
    <div class="container text-center">

      <!-- Small Tag -->
      <div class="small-tag mx-auto mb-2"> ACCESSIBLE RESOURCES</div>

      <!-- Title -->
      <h2 class="features-title mb-2">The Club Unitee Platform</h2>

      <!-- Subtitle -->
      <p class="features-subtitle mb-5">
        We're working to make it easier for you to find new golf buddies and opportunities to improve your game.
      </p>

      <!-- 1st Row -->
      <div class="row g-4">

        <!-- CARD 1 -->
        <div class="col-md-4">
          <div class="feature-card">
           <div class="feature-img" style="background-image:url('{{ asset('customer/images/golf-buddies.avif') }}');"></div>
            <div class="feature-body">
              <h4>Track & Share Rounds</h4>
              <p>Connect with golfers of all skill levels in your area. Never play alone again.</p>
              <ul>
                <li>Skill-based matching</li>
                <li>Location discovery</li>
                <li>Direct messaging</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-img" style="background-image:url('{{ asset('customer/images/Golf Blog.jpg') }}');"></div>
            <div class="feature-body">
              <h4>Discover Courses</h4>
              <p>Record rounds, track progress, and share achievements.</p>
              <ul>
                <li>Score tracking</li>
                <li>Progress stats</li>
                <li>Social sharing</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-img" style="background-image:url('{{ asset('customer/images/A Women Golfer.jpg') }}');"></div>
            <div class="feature-body">
              <h4>Leagues</h4>
              <p>Find courses, save favorites, view scorecards & directions.</p>
              <ul>
                <li>Detailed course info</li>
                <li>Interactive scorecards</li>
                <li>Save favorites</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- CARD 4 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-img" style="background-image:url('{{ asset('customer/images/golf-1208900_1280.jpg') }}');"></div>
            <div class="feature-body">
              <h4>Complete Challenges</h4>
              <p>Create & join golf events, tournaments, and gatherings.</p>
              <ul>
                <li>RSVP management</li>
                <li>Invite buddies</li>
                <li>Event updates</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- CARD 5 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-img" style="background-image:url('{{ asset('customer/images/B Woman Golfer.jpg') }}');"></div>
            <div class="feature-body">
              <h4>Adaptive Golf</h4>
              <p>Create leagues, track standings, compete together.</p>
              <ul>
                <li>Public & private leagues</li>
                <li>Leaderboard tracking</li>
                <li>Season organization</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- SAMPLE PROFILES -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title text-center">Meet Some Members</h2>

      <div class="row g-4">

        <div class="col-md-4">
          <div class="card-uni01">
            <img src="{{ asset('customer/images/01.png') }}" class="avatar mb-3" alt="">
            <h5>Priya Sharma</h5>
            <p class="text-muted">Program Manager (Beginner)</p>
            <p class="small">“New to LA and excited to connect with mission-driven women.”</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card-uni01">
            <img src="{{ asset('customer/images/02.png') }}" class="avatar mb-3" alt="">
            <h5>Maya Rodriguez</h5>
            <p class="text-muted">Director of Development (Intermediate)</p>
            <p class="small">“Love the strategy and connection golf brings.”</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card-uni01">
            <img src="{{ asset('customer/images/03.png') }}" class="avatar mb-3" alt="">
            <h5>Zara Chen</h5>
            <p class="text-muted">Tech Founder (Beginner)</p>
            <p class="small">“Trying golf for the first time; looking for community.”</p>
          </div>
        </div>



      </div>
    </div>
  </section>


  <!-- upper footer section -->
  <section class="hero-section1 d-flex justify-content-center align-items-center">
    <div class="hero-box text-center">

      <!-- Top Tag -->
      <div class="hero-tag mx-auto">
        ⭐ Your Golf Community Starts Here
      </div>

      <!-- Heading -->
      <h1 class="hero-title">
        Ready to find your<br>
        <span>next golf buddy?</span>
      </h1>

      <!-- Subtitle -->
      <p class="hero-subtitle">
        Join our community and start connecting today. Free for a limited time.
      </p>

      <!-- Icons Row -->
      <div class="hero-features d-flex justify-content-center gap-4 mt-3">
        <div><i class="bi bi-people-fill me-1"></i> Active Community</div>
        <div><i class="bi bi-check-circle-fill me-1"></i> Free Trial</div>
        <div><i class="bi bi-lightning-fill me-1"></i> Quick Setup</div>
      </div>

      <!-- Buttons -->
      <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
        <a href="apply.html" class="btn btn-dark hero-btn-primary">Start Free Trial →</a>
        <a href="login.html" class="btn hero-btn-secondary">Sign In ↦</a>
      </div>

      <!-- Bottom Text -->
      <p class="hero-small mt-4">
        No credit card required • Cancel anytime
      </p>

    </div>
  </section>
@endsection