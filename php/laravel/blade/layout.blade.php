<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"></link>
    <link rel="stylesheet" href="{{ razorbacks\style\Manifest::css() }}"></link>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header-bg"></div>
    <div class="container" id="opener" role="banner">
        <a class="brand" href="http://www.uark.edu/">University of Arkansas</a>
        <span id="site-heading" class="walton-name"><a href="/">{{ config('app.name') }}</a></span>
        <span class="walton-sub-name"><a href="//walton.uark.edu">The Sam M. Walton College of Business</a></span>
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
                    @if (Auth::guest())
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @endif
                </ul>

                <div id='login_nav_div' class='top_nav navbar-right pull-right-md pull-left-xs'>
                    <ul class="nav navbar-nav navbar-right navigation-menu">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout {{ Auth::user()->first_name }}
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
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
            <div class="row" style="padding-top: 30px; padding-bottom: 40px;">
                <div class="col-md-3 col-md-push-6 col-md-offset-3">
                    <p style="margin-bottom: 35px; margin-top: 50px;">
                        <a href="//walton.uark.edu/directory/" class="btn navbar-btn btn-default" style="margin-top: -15px;">Walton Directory</a>
                        <a href="https://intranet.waltoncollege.uark.edu:8001" class="btn navbar-btn btn-default" style="margin-top: -15px; margin-right: 10px;">Walton Intranet</a>
                        <span style="display:inline-block;">
                            <a style="color: #b7b7b7" title="facebook" href="https://www.facebook.com/WaltonCollege">
                                <i class="fa fa-3x fa-facebook-square"><!-- content --></i>
                            </a>
                            <a style="color: #b7b7b7" title="twitter" href="https://twitter.com/uawaltoncollege">
                                <i class="fa fa-3x fa-twitter-square"><!-- content --></i>
                            </a>
                            <a style="color: #b7b7b7" title="Linkedin" href="https://www.linkedin.com/grp/home?gid=108950">
                                <i class="fa fa-3x fa-fa fa-linkedin-square"><!-- content --></i>
                            </a>
                            <a style="color: #b7b7b7" title="instagram" href="https://instagram.com/uawaltoncollege/">
                                <i class="fa fa-3x fa-instagram"><!-- content --></i>
                            </a>
                        </span>
                    </p>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <a href="//walton.uark.edu"><img alt="Sam M. Walton College of Business: AACSB Accredited" src="{{ razorbacks\style\Manifest::cdn() }}/images/wc-footer-logo.jpg" style="margin-top: 18px;"></a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="footer-logo">
                        <a href="http://uark.edu">UNIVERSITY OF ARKANSAS</a>
                    </div>

                    <ul id="footer-global-links" class="list-unstyled">
                        <li><a href="http://www.uark.edu/admissions/index.php">Admissions</a></li>
                        <li><a href="http://www.uark.edu/academics/index.php">Academics</a></li>
                        <li><a href="http://www.uark.edu/campus-life/index.php">Campus Life</a></li>
                        <li><a href="http://www.uark.edu/research/index.php">Research</a></li>
                        <li><a href="http://www.uark.edu/athletics/index.php">Athletics</a></li>
                        <li><a href="http://www.uark.edu/about/index.php">About</a></li>
                    </ul>

                    <ul id="social-stack" class="nav clearfix list-unstyled">
                        <li>
                            <a href="https://www.facebook.com/UofArkansas">
                                <i class="fa fa-facebook"></i>
                                <span class="sr-only">Like us on Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://twitter.com/uarkansas">
                                <i class="fa fa-twitter"></i>
                                <span class="sr-only">Follow us on Twitter</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.youtube.com/user/UniversityArkansas">
                                <i class="fa fa-youtube"></i>
                                <span class="sr-only">Watch us on YouTube</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://instagram.com/uarkansas">
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
                            <a href="http://pinterest.com/uofaadmissions/">
                                <i class="fa fa-pinterest"></i>
                                <span class="sr-only">Join us on Pinterest</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.linkedin.com/company/university-of-arkansas">
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

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
    <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        function auto_expand_textarea( ta ){ ta.keyup(function(e) {
            while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css('borderTopWidth')) + parseFloat($(this).css('borderBottomWidth'))) {
                $(this).height($(this).height()+1);
            };
        })}

        $(function(){
            $('textarea').each(function(){
                var ta = $(this);
                auto_expand_textarea( ta );
            });
        });

        $(".top_nav").find("a").each(function(){
            if ( $(this).attr("href") == "<?php echo $_SERVER['SCRIPT_NAME'];?>" || $(this).attr("href") == "<?php echo dirname($_SERVER['SCRIPT_NAME'])."/";?>" )
            $(this).parent().addClass("active");
        });

        $(document).ready(function(){
            $('.datatable').DataTable({
                "order": [[ 1, "desc" ]]
            });
        });
    </script>
</body>
</html>