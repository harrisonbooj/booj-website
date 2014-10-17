<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="@yield('page_keywords')">
        <meta name="description" content="@yield('page_description')">
        <meta name="robots" content="index,follow">
        <meta name="google-site-verification" content="phSnk9YeCZCEuzy9AaIECmpP06UO73xh6BRHwCd22wY">
        @yield('opengraph')
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/blog/rss">
        <link href='https://plus.google.com/107717391600262472445' rel="publisher" title='booj on Google+'>
        <link rel="canonical" href="http://www.booj.com/">
        <title>booj | web development &amp; technology blog @yield('page_title')</title>
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,300italic' rel='stylesheet' type='text/css'>
        <link href="/css/filters.<? if(!empty($build_version)) echo $build_version . '.';?>css" rel="stylesheet">
        <link href="/dist/style.min.<? if(!empty($build_version)) echo $build_version . '.';?>css" rel="stylesheet">
		{{-- Syntax Highlighting CSS --}}
		<link href="/dist/google-code-prettify/sons-of-obsidian.css" rel="stylesheet">

        {{ Asset::styles() }}
        @yield('styles')
    </head>
    <body class="blog-layout">
        <header class="site-header">
            <div class="container">
                <div class="row-fluid">
                    <div class="span7">
                        <div class="navbar">
                            <div class="navbar-inner clearfix">
                                <a href="/" class="brand"><img src="/img/booj-flame.png" alt="Booj Logo"></a>
                                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    Main Menu
                                </button>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <li><a href="/"><span>home</span></a></li>
                                        <li><a href="/blog"><span>blog</span></a></li>
                                        <li class="active"><a href="#"><span>wm</span></a></li>
                                        <li class="hidden-desktop"><a href="/contact" title="Contact us"><span>Contact Us</span></a></li>
                                        <li class="hidden-desktop clearfix">
                                            <a href="https://www.youtube.com/boojvideo" title="Booj YouTube Page" target="_blank" style="float:left;"><i class="bicon-white-youtube">&nbsp;</i></a>
                                            <a href="https://www.facebook.com/boojers" title="Booj Facebook Page" target="_blank" style="float:left;"><i class="bicon-white-facebook">&nbsp;</i></a>
                                            <a href="https://plus.google.com/107717391600262472445" title="Booj Google Plus Page" target="_blank" style="float:left;"><i class="bicon-white-google-plus">&nbsp;</i></a>
                                            <a href="http://www.twitter.com/boojers" title="Booj Twitter Page" target="_blank" style="float:left;"><i class="bicon-white-twitter">&nbsp;</i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span3 header-social-networks visible-desktop">
                        <a href="https://www.youtube.com/boojvideo" title="Booj YouTube Page" target="_blank"><i class="bicon-white-youtube">&nbsp;</i></a>
                        <a href="https://www.facebook.com/boojers" title="Booj Facebook Page" target="_blank"><i class="bicon-white-facebook">&nbsp;</i></a>
                        <a href="https://plus.google.com/107717391600262472445" title="Booj Google Plus Page" target="_blank"><i class="bicon-white-google-plus">&nbsp;</i></a>
                        <a href="http://www.twitter.com/boojers" title="Booj Twitter Page" target="_blank"><i class="bicon-white-twitter">&nbsp;</i></a>
                    </div>
                    <div class="span2 header-contact visible-desktop">
                        <a href="/contact" title="Contact us">Contact Us</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="content-container">
            <div class="container">
                @yield('content')
            </div>
        </div>

        @include('content::footers.footer')

        <script src="/dist/app.min.<? if(!empty($build_version)) echo $build_version . '.';?>js"></script>

        {{ Asset::scripts() }}
        @yield('scripts')


        <!-- AddThis Button BEGIN -->
        <script async="async" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4db83ad024813ea2"></script>
        <!-- AddThis Button END -->

        <script>
            var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-244849-36']); _gaq.push(['_trackPageview']); (function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();
        </script>

    </body>
</html>
