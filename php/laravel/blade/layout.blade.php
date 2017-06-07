<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ razorbacks\style\Manifest::cdn() }}/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    {!! razorbacks\style\Manifest::css() !!}

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    @yield('head')
</head>
<body>
    <div id="header-bg"></div>
    <div class="container" id="opener" role="banner">
        <a class="brand" href="https://www.uark.edu/">University of Arkansas</a>
        <span id="site-heading" class="walton-name"><a href="/">{{ config('app.name') }}</a></span>
        <span class="walton-sub-name"><a href="https://walton.uark.edu">The Sam M. Walton College of Business</a></span>
    </div><!-- /#opener banner -->

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <!-- Top Nav Toggle -->
                <button id='n' type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id='site_title_brand' class='navbar-brand' href='/'></a>
            </div><!-- /.navbar-header -->

            <div id="navbar" class="collapse navbar-collapse">

                <ul id='top_navigation_menu' class='top_nav nav navbar-nav navigation-menu'>

                    @yield('navbar')

                </ul>

                <div id='login_nav_div' class='top_nav navbar-right pull-right-md pull-left-xs'>
                    <ul class="nav navbar-nav navbar-right navigation-menu">

                        @yield('navbar-right')

                    </ul>
                </div>

            </div><!--/#navbar.nav-collapse -->
        </div><!--/.container -->
    </nav>

    <div id="page-content-container" class='container'>

        @yield('content')

    </div>

    <section class="gray" id="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-push-6 col-md-offset-3">
                    <p>
                        <a href="https://walton.uark.edu/directory/" class="btn navbar-btn btn-default">Walton Directory</a>
                        <span class="walton-social-media">
                            <a title="Facebook" href="https://www.facebook.com/WaltonCollege">
                                <i class="fa fa-3x fa-facebook-square"></i>
                            </a>
                            <a title="Twitter" href="https://twitter.com/uawaltoncollege">
                                <i class="fa fa-3x fa-twitter-square"></i>
                            </a>
                            <a title="LinkedIn" href="https://www.linkedin.com/grp/home?gid=108950">
                                <i class="fa fa-3x fa-linkedin-square"></i>
                            </a>
                            <a title="Instagram" href="https://instagram.com/uawaltoncollege/">
                                <i class="fa fa-3x fa-instagram"></i>
                            </a>
                        </span>
                    </p>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <a href="https://walton.uark.edu">
                        <img alt="Sam M. Walton College of Business: AACSB Accredited"
                            class="img img-responsive"
                            src="{{ razorbacks\style\Manifest::cdn() }}/images/wc-footer-logo.jpg"
                        >
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="footer-logo">
                        <a href="https://uark.edu">UNIVERSITY OF ARKANSAS</a>
                    </div>

                    <ul id="footer-global-links" class="list-unstyled">
                        <li><a href="https://www.uark.edu/admissions/index.php">Admissions</a></li>
                        <li><a href="https://www.uark.edu/academics/index.php">Academics</a></li>
                        <li><a href="https://www.uark.edu/campus-life/index.php">Campus Life</a></li>
                        <li><a href="https://www.uark.edu/research/index.php">Research</a></li>
                        <li><a href="https://www.uark.edu/athletics/index.php">Athletics</a></li>
                        <li><a href="https://www.uark.edu/about/index.php">About</a></li>
                    </ul>

                    <ul id="social-stack" class="nav clearfix list-unstyled">
                        <li>
                            <a href="https://www.facebook.com/UofArkansas">
                                <i class="fa fa-facebook"></i>
                                <span class="sr-only">Like us on Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/uarkansas">
                                <i class="fa fa-twitter"></i>
                                <span class="sr-only">Follow us on Twitter</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/UniversityArkansas">
                                <i class="fa fa-youtube"></i>
                                <span class="sr-only">Watch us on YouTube</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/uarkansas">
                                <i class="fa fa-instagram"></i>
                                <span class="sr-only">See us on Instagram</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/104159281704656057709" rel="publisher">
                                <i class="fa fa-google-plus"></i>
                                <span class="sr-only">Connect with us on Google+</span>
                            </a>
                        </li>	
                        <li>
                            <a href="https://pinterest.com/uofaadmissions/">
                                <i class="fa fa-pinterest"></i>
                                <span class="sr-only">Join us on Pinterest</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/university-of-arkansas">
                                <i class="fa fa-linkedin"></i>
                                <span class="sr-only">Connect with us on LinkedIn</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://foursquare.com/uarkansas">
                                <i class="fa fa-foursquare"></i>
                                <span class="sr-only">Find us on FourSquare</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        $(".top_nav").find("a").each(function(){
            if ( $(this).attr("href") == "{{ Request::fullUrl() }}") {
                $(this).parent().addClass("active");
            }
        });
    </script>

    {!! razorbacks\style\Manifest::script() !!}

    @yield('scripts')

</body>
</html>
