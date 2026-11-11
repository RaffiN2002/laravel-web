<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $about->title ?? 'Portfolio' }} - Personal CV &amp; Portfolio</title>
  <meta content="{{ strip_tags($about->content ?? '') }}" name="description">
  <meta content="{{ get_meta_value('language') }}" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('iPortfolio/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('iPortfolio/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('iPortfolio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('iPortfolio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('iPortfolio/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('iPortfolio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('iPortfolio/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('iPortfolio/assets/css/main.css') }}?v=20261111" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="{{ get_meta_value('photo') ? asset('photo/' . get_meta_value('photo')) : asset('iPortfolio/assets/img/my-profile-img.jpg') }}" alt="{{ $about->title ?? 'Profile' }}" class="img-fluid rounded-circle">
    </div>

    <a href="{{ url('/') }}" class="logo d-flex align-items-center justify-content-center">
      <h1 class="sitename">{{ $about->title ?? 'Portfolio' }}</h1>
    </a>

    <div class="social-links text-center">
      @if(get_meta_value('twitter'))
        <a href="{{ get_meta_value('twitter') }}" target="_blank" class="twitter" title="Twitter / X"><i class="bi bi-twitter-x"></i></a>
      @endif
      @if(get_meta_value('facebook'))
        <a href="{{ get_meta_value('facebook') }}" target="_blank" class="facebook" title="Facebook"><i class="bi bi-facebook"></i></a>
      @endif
      @if(get_meta_value('linkedin'))
        <a href="{{ get_meta_value('linkedin') }}" target="_blank" class="linkedin" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
      @endif
      @if(get_meta_value('github'))
        <a href="{{ get_meta_value('github') }}" target="_blank" class="github" title="GitHub"><i class="bi bi-github"></i></a>
      @endif
      @if(get_meta_value('email'))
        <a href="mailto:{{ get_meta_value('email') }}" class="email" title="Email"><i class="bi bi-envelope"></i></a>
      @endif
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="#skills"><i class="bi bi-tools navicon"></i> Skills &amp; Workflow</a></li>
        <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
        @if($projects->count())
        <li><a href="#projects"><i class="bi bi-folder2-open navicon"></i> Projects</a></li>
        @endif
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
      </ul>
    </nav>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="{{ asset('photo/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>{{ $about->title ?? 'Portfolio' }}</h2>
        <p>I'm <span class="typed" data-typed-items="Web Developer, Software Engineer, Laravel Developer">Developer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>{{ strip_tags($about->content ?? '') }}</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="{{ get_meta_value('photo') ? asset('photo/' . get_meta_value('photo')) : asset('iPortfolio/assets/img/my-profile-img.jpg') }}" class="img-fluid" alt="{{ $about->title ?? 'Profile' }}">
          </div>
          <div class="col-lg-8 content">
            <h2>{{ $experience->first()->title ?? 'UI/UX Designer & Web Developer' }}.</h2>
            <p class="fst-italic py-3">
              {{ strip_tags($about->content ?? '') }}
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ get_meta_value('birthday') ?: '1 May 1995' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ get_meta_value('phonenum') ?: '+123 456 7890' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ get_meta_value('city') ? get_meta_value('city') . ', ' . get_meta_value('province') : 'New York, USA' }}</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ get_meta_value('age') ?: '30' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{ $education->first()->info2 ?? ($education->first()->info1 ?? 'Master') }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ get_meta_value('email') ?: 'email@example.com' }}</span></li>
                </ul>
              </div>
            </div>
            <div class="py-3">
              {!! $about->content ?? '' !!}
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Skills & Workflow Section -->
    @php
        $rawLanguage = get_meta_value('language');
        $skillsList = [];
        if ($rawLanguage) {
            $decoded = json_decode($rawLanguage, true);
            if (is_array($decoded)) {
                $skillsList = array_map(function ($skill) {
                    return [
                        'name' => $skill['name'] ?? $skill['value'] ?? '',
                        'percentage' => min(100, max(0, (int) ($skill['percentage'] ?? 75))),
                    ];
                }, $decoded);
            } else {
                $skillsList = array_map(function ($skill) {
                    return ['name' => trim($skill), 'percentage' => 75];
                }, explode(',', $rawLanguage));
            }
        }
        $rawWorkflow = strip_tags(get_meta_value('workflow'));
    @endphp
    <section id="skills" class="skills section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Skills</h2>
        <p>{{ $rawWorkflow ?: 'Technologies, tools, and best practices applied in my work.' }}</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          @if(count($skillsList) > 0)
            @foreach(array_chunk($skillsList, ceil(count($skillsList) / 2)) as $column)
              <div class="col-lg-6">
                @foreach($column as $skill)
                  @if(!empty($skill['name']))
                    <div class="progress">
                      <span class="skill">{{ $skill['name'] }} <i class="val">{{ $skill['percentage'] }}%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill['percentage'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill['percentage'] }}%"></div>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
            @endforeach
          @else
            <div class="col-12"><p class="text-muted">No skills listed yet.</p></div>
          @endif

        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p>A comprehensive overview of my experience, education, and career milestones.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <!-- Left Column: Professional Experience -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>

            @forelse ($experience as $item)
              <div class="resume-item">
                <h4>{{ $item->title }}</h4>
                <h5>{{ $item->start_id ?? $item->start }} - {{ $item->end_id ?? $item->end }}</h5>
                @if($item->info1)
                  <p><em>{{ $item->info1 }}</em></p>
                @endif
                <div>
                  {!! $item->content !!}
                </div>
              </div><!-- End Resume Item -->
            @empty
              <div class="resume-item">
                <p class="text-muted">No professional experience records available.</p>
              </div>
            @endforelse

          </div>

          <!-- Right Column: Education -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h3 class="resume-title">Education</h3>

            @forelse ($education as $item)
              <div class="resume-item">
                <h4>{{ $item->info2 ?: $item->title }}</h4>
                <h5>{{ $item->start_id ?? $item->start }} - {{ $item->end_id ?? $item->end }}</h5>
                <p>
                  <em>
                    {{ $item->title }}
                    @if($item->info1) &bull; {{ $item->info1 }} @endif
                  </em>
                </p>
                @if($item->info3)
                  <p class="mb-2"><strong>GPA:</strong> {{ $item->info3 }}</p>
                @endif
                @if($item->content)
                  <div class="resume-achievements mt-2">
                    {!! $item->content !!}
                  </div>
                @endif
              </div><!-- End Resume Item -->
            @empty
              <div class="resume-item">
                <p class="text-muted">No education records available.</p>
              </div>
            @endforelse

          </div>

        </div>

      </div>

    </section><!-- /Resume Section -->

    <!-- Projects Section -->
    @if($projects->count())
    <section id="projects" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Projects</h2>
        <p>A selection of projects I have built or contributed to.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          @foreach($projects as $project)
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 + 100 }}">
            <div class="service-item d-flex p-4 bg-white rounded shadow-sm h-100">
              <div class="icon flex-shrink-0 me-3 text-primary fs-2">
                <i class="bi bi-folder2-open"></i>
              </div>
              <div class="w-100">
                <h4 class="title mb-1">{{ $project->title }}</h4>
                @if($project->info1)
                  <p class="text-muted small mb-1"><i class="bi bi-code-slash me-1"></i>{{ $project->info1 }}</p>
                @endif
                @if($project->start)
                  <p class="text-muted small mb-2">
                    <i class="bi bi-calendar me-1"></i>
                    {{ \Carbon\Carbon::parse($project->start)->format('Y') }}
                    @if($project->end) – {{ \Carbon\Carbon::parse($project->end)->format('Y') }} @endif
                  </p>
                @endif
                <div class="description text-secondary">
                  {!! $project->content !!}
                </div>
                @if($project->info2)
                  <a href="{{ $project->info2 }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="bi bi-box-arrow-up-right me-1"></i> View Project
                  </a>
                @endif
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>

    </section><!-- /Projects Section -->
    @endif

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Reach out for inquiries, partnerships, or project collaborations.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>{{ get_meta_value('city') ? get_meta_value('city') . ', ' : '' }}{{ get_meta_value('province') ?: 'Jakarta, Indonesia' }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>{{ get_meta_value('phonenum') ?: '+62 812-3456-7890' }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>{{ get_meta_value('email') ?: 'info@example.com' }}</p>
                </div>
              </div><!-- End Info Item -->

              @php
                $mapLocation = urlencode((get_meta_value('city') ?: 'Jakarta') . ', ' . (get_meta_value('province') ?: 'Indonesia'));
              @endphp
              <iframe src="https://maps.google.com/maps?q={{ $mapLocation }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="{{ route('contact.send') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center">
        <p>&copy; {{ date('Y') }} <strong class="px-1 sitename">{{ $about->title ?? 'Portfolio' }}</strong>. All Rights Reserved.</p>
      </div>
      <div class="credits text-center">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('iPortfolio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('iPortfolio/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('iPortfolio/assets/js/main.js') }}"></script>

</body>

</html>
