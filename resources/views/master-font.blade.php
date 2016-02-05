<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title') | Tweet-a-Matic</title>
    <meta name="description" content="Shedule your twitter posts, LinkedIn post sheduling.">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?=asset('theme/front/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=asset('theme/front/css/bootstrap-responsive.min.css')?>">
    <link rel="stylesheet" href="<?=asset('theme/front/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=asset('theme/front/css/main.css')?>">
    <link rel="stylesheet" href="<?=asset('theme/front/css/sl-slide.css')?>">

    <script src="<?=asset('theme/front/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?=asset('theme/front/images/ico/favicon.ico')?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=asset('theme/front/images/ico/apple-touch-icon-144-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=asset('theme/front/images/ico/apple-touch-icon-114-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=asset('theme/front/images/ico/apple-touch-icon-72-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" href="<?=asset('theme/front/images/ico/apple-touch-icon-57-precomposed.png')?>">
</head>

<body>

    <!--Header-->
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.html"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="about-us.html">About</a></li>
                        <li><a href="services.html">Pricing</a></li>
                        <li><a href="Register">Register</a></li>
                        <li><a href="contact-us">Contact</a></li>
                        <li class="login">
                            <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->

<div class="con">
  @yield('content')
</div>

<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
            </div>
            <!--/Copyright-->

            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-tumblr"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                </ul>
            </div>

            <div class="span1">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <form class="form-inline" action="auth/login" method="post" id="form-login">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" name="email" class="input-small" placeholder="Email">
          <input type="password" name="password" class="input-small" placeholder="Password">
          <label class="checkbox">
              <input type="checkbox"> Remember me
          </label>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        <a href="#">Forgot your password?</a>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->

<script src="<?=asset('theme/front/js/vendor/jquery-1.9.1.min.js')?>"></script>
<script src="<?=asset('theme/front/js/vendor/bootstrap.min.js')?>"></script>
<script src="<?=asset('theme/front/js/main.js')?>"></script>
<!-- Required javascript files for Slider -->
<script src="<?=asset('theme/front/js/jquery.ba-cond.min.js')?>"></script>
<script src="<?=asset('theme/front/js/jquery.slitslider.js')?>"></script>
<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type="text/javascript">
$(function() {
    var Page = (function() {

        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});
</script>
<!-- /SL Slider -->
</body>
</html>
