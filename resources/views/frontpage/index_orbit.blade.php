<!DOCTYPE html>
<html lang="en">
<head>
    <title>Orbit - Bootstrap 5 Resume/CV Template for Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS-->
	<script defer src="{{asset('frontpage')}}/assets/fontawesome/js/all.min.js"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{asset('frontpage')}}/assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('frontpage')}}/assets/css/orbit-2.css">
</head> 

<body>
    <div class="wrapper mt-lg-5">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="{{asset('photo')."/".get_meta_value('photo')}}" alt="" width="100px" height="125px" />
                <h1 class="name">{{$about->title}}</h1>
                <h3 class="tagline">{{get_meta_value('city')}}, {{get_meta_value('province')}}</h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa-solid fa-envelope"></i><a href="mailto: yourname@email.com">{{get_meta_value('email')}}</a></li>
                    <li class="phone"><i class="fa-solid fa-phone"></i><a href="tel:0123 456 789">{{get_meta_value('phonenum')}}</a></li>
                    <li class="linkedin"><i class="fa-brands fa-facebook-f"></i><a href="#" target="_blank">{{get_meta_value('facebook')}}</a></li>
                    <li class="linkedin"><i class="fa-brands fa-linkedin-in"></i><a href="#" target="_blank">{{get_meta_value('linkedin')}}</a></li>
                    <li class="github"><i class="fa-brands fa-github"></i><a href="#" target="_blank">{{get_meta_value('github')}}</a></li>
                    <li class="twitter"><i class="fa-brands fa-twitter"></i><a href="https://twitter.com/3rdwave_themes" target="_blank">{{get_meta_value('twitter')}}</a></li>
                </ul>
            </div><!--//contact-container-->
            
            <!--//interests-->
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <li>{!! $interest->content !!}</li>
                </ul>
            </div><!--//interests-->

            <div class="awards-container container-block">
                <h2 class="container-block-title">Awards</h2>
                <ul class="list-unstyled awards-list">
                    <li>{!! $award->content !!}</li>
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-user"></i></span>Career Profile</h2>
                <div class="summary">
                    <div>{!! $about->content !!}</div>
                </div><!--//summary-->
            </section><!--//section-->
            
            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-briefcase"></i></span>Experiences</h2>
                @foreach ($experience as $item)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$item->title}}</h3>
                            <div class="time">{{$item->start}} - {{$item->end}}</div>
                        </div><!--//upper-row-->
                        <div class="company">{{$item->info1}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        {!! $item->content !!}
                    </div><!--//details-->
                </div>
                @endforeach
            </section><!--//section-->

            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-briefcase"></i></span>Education</h2>
                @foreach ($education as $item)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$item->title}}</h3>
                            <div class="time">{{$item->start}} - {{$item->end}}</div>
                        </div><!--//upper-row-->
                        <div class="company">{{$item->info1}}</div>
                        <div class="company">{{$item->info2}}</div>
                    </div><!--//meta-->
                    <div class="details">GPA : 
                        {!! $item->info3 !!}
                    </div><!--//details-->
                </div>
                @endforeach
            </section><!--//section-->
            
            <section class="skills-section section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-rocket"></i></span>Skills & Workflow</h2>
                <div class="skillset">
                    <div class="item">
                        <div class="summary"><strong>Skill : {!! get_meta_value('language') !!}</strong></div>                            
                    </div>
                    <div class="item">
                        <div class="summary"><strong>Workflow : {!! get_meta_value('workflow') !!}</strong></div>                            
                    </div>
                </div>  
            </section><!--//skills-section-->
            
        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <i class="fa-solid fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->
        
</body>
</html> 

