<!DOCTYPE html>
<!--[if lt IE 7]>      <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" lang="{{ App::getLocale() }}" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" lang="{{ App::getLocale() }}" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" lang="{{ App::getLocale() }}" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" lang="{{ App::getLocale() }}" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>{{ $title }} | GW2 Treasures</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

	<!-- styles -->
	<link rel="stylesheet" href="{{ Helper::cdn('assets/css/normalize.min.css') }}">
	<link rel="stylesheet" href="{{ Helper::cdn('assets/css/main.css') }}">
	@if( App::environment('production') )
		<link rel="stylesheet" href="{{ Helper::cdn('assets/css/style.css') }}">
	@else
		<link rel="stylesheet" href="//direct.darthmaim-cdn.de/gw2treasures/assets/css/style.css">
	@endif

	<!-- fonts -->
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300,700|Open+Sans:400,300,600,700|Open+Sans+Condensed:300|Droid+Sans+Mono|Droid+Serif' rel='stylesheet' type='text/css'>

	<!-- favicons -->
	<link rel="icon" href="{{ Helper::cdn('assets/img/favicon.png') }}" type="image/png" />
	<link rel="shortcut icon" href="/favicon.ico" />

	<!-- modernizr -->
	<script src="{{ Helper::cdn('assets/js/vendor/modernizr-2.6.2.min.js') }}"></script>

	<!-- alternate versions in different languages -->
	<link rel="alternate" hreflang="x-default" href="//{{    Config::get('app.domain') . Request::getRequestUri() }}" />
	<link rel="alternate" hreflang="de"        href="//de.{{ Config::get('app.domain') . Request::getRequestUri() }}" />
	<link rel="alternate" hreflang="en"        href="//en.{{ Config::get('app.domain') . Request::getRequestUri() }}" />
	<link rel="alternate" hreflang="es"        href="//es.{{ Config::get('app.domain') . Request::getRequestUri() }}" />
	<link rel="alternate" hreflang="fr"        href="//fr.{{ Config::get('app.domain') . Request::getRequestUri() }}" />
</head>
<body>
	<div id="wrapper">
		<header id="header" class="clearfix">
			<div class="pageWidth">
				<h1 class="floatLeft"><a href="/">GW2 Treasures</a></h1>
				{{ Form::open( array( 'method' => 'GET', 'route' => array('search', App::getLocale() )) ) }}
					{{ Form::text( 'q', null, array('placeholder' => 'Search' )) }}
				{{ Form::close() }}
			</div>
		</header>

		<!-- notifications -->
		<ul id="notifications">
			@if( in_array( App::getLocale(), array( 'es', 'fr' )))
				<li class="notification"><div class="pageWidth clearfix"><div class="notificationContent">
					@if( App::getLocale() == 'es' )
						You <strong>speak spanish</strong> and want to support this project? <a href="{{ URL::route('contact', App::getLocale()) }}">Contact me now</a> to <strong>help translating</strong>!
					@else
						You <strong>speak french</strong> and want to support this project? <a href="{{ URL::route('contact', App::getLocale()) }}">Contact me now</a> to <strong>help translating</strong>!
					@endif
				</div></div></li>
			@endif
			@foreach( Notification::Notifications() as $n )
				@include( 'notification', array( 'notification' => $n ) )
			@endforeach
		</ul>

		<!-- content -->
		<div id="content">
			<div class="pageWidth">{{ $content }}</div>
		</div>

		<!-- footer -->
		<footer id="footerBar"><div class="pageWidth"><a href="{{ URL::route('contact', App::getLocale()) }}">darthmaim</a> &copy; 2014</div></footer>
	</div>

	<footer id="footer" class="clearfix">
		<nav><ul id="footerList" class="pageWidth">
			<li><a href="#">{{ trans('footer.itemlists') }}</a>
				<ul>
					<li><a href="#">{{ trans('footer.recentlyAddedItems') }}</a>
					<li><a href="#">{{ trans('footer.recentlyChangedItems') }}</a>
					<li><a href="#">{{ trans('footer.weaponSets') }}</a>
					<li><a href="#">{{ trans('footer.armorSets') }}</a>
				</ul>
			<li><a href="#">{{ trans('footer.RSSFeeds') }}</a>
				<ul>
					<li><a href="#">{{ trans('footer.newItems') }}</a>
					<li><a href="#">{{ trans('footer.changedItems') }}</a>
				</ul>
			<li><a href="#">{{ trans('footer.developer') }}</a>
				<ul>
					<li><a href="#">{{ trans('footer.APIDocumentation') }}</a>
				</ul>
			<li><a href="#">{{ trans('footer.about') }}</a>
				<ul>
					<li><a href="#">{{ trans('footer.statistics') }}</a>
					<li><a href="#">{{ trans('footer.changelog') }}</a>
					<li><a href="#">{{ trans('footer.terms') }}</a>
					<li><a href="{{ URL::route('contact', App::getLocale()) }}">{{ trans('footer.contact') }}</a>
				</ul>
			<li>{{ trans('footer.language') }}
				<ul>
					<li><a hreflang="de" rel="alternate" href="//de.{{ Config::get('app.domain') . Request::getRequestUri() }}">{{ trans('footer.german') }}</a>
					<li><a hreflang="en" rel="alternate" href="//en.{{ Config::get('app.domain') . Request::getRequestUri() }}">{{ trans('footer.english') }}</a>
					<li><a hreflang="es" rel="alternate" href="//es.{{ Config::get('app.domain') . Request::getRequestUri() }}">{{ trans('footer.spanish') }}</a>
					<li><a hreflang="fr" rel="alternate" href="//fr.{{ Config::get('app.domain') . Request::getRequestUri() }}">{{ trans('footer.french') }}</a>
				</ul>
		</ul></nav>
		<p class="pageWidth legalNotice">{{ trans('footer.legalNotice1') }}</p>
		<p class="pageWidth legalNotice">{{ trans('footer.legalNotice2') }}</p>
		<p class="pageWidth legalNotice" style="text-align: right; margin-top: 2em">
			<span title="<?php 
				echo 'Runtime: ' . round(( STARTTIME + microtime( true ) ) * 1000, 2 ) . 'ms' . "\n";
				echo 'Memory usage: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MiB' . "\n";
				echo 'DB queries: ' . count(DB::getQueryLog()) . "\n";
				if( isset( $cached ) && $cached ) {
					echo 'cached' . "\n";
				}
				if( isset( $_SERVER['HTTP_CF_CONNECTING_IP'] )) {
					echo 'via cloudflare';
				}
			?>">
				generated @ <?= date(DATE_RFC822) ?>
			</span>
		</p>

		@if( isset($_GET['debug']) && !App::environment('production') )
			<pre class="pageWidth">
				{{ print_r(DB::getQueryLog()) }}
			</pre>
		@endif
	</footer>
	</div>
	<div id="scripts">
		@if( App::environment('production') )
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', '{{ Config::get('app.trackingCode') }}', '{{ Config::get('app.domain') }}');
				ga('send', 'pageview');
			</script>
		@endif

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ Helper::cdn('assets/js/vendor/jquery-1.10.1.min.js') }}"><\/script>')</script>

		@if( App::environment('production') )
        	<script src="{{ Helper::cdn('assets/js/plugins.js') }}"></script>
			<script src="{{ Helper::cdn('assets/js/main.js') }}"></script>
			<script src="{{ Helper::cdn('assets/js/vendor/opentip-jquery.min.js') }}"></script>
		@else
       		<script src="//direct.darthmaim-cdn.de/gw2treasures/assets/js/plugins.js"></script>
			<script src="//direct.darthmaim-cdn.de/gw2treasures/assets/js/main.js"></script>
			<script src="//direct.darthmaim-cdn.de/gw2treasures/assets/js/vendor/opentip-jquery.min.js"></script>
		@endif

		<script src=""></script>
	</div>
</body>
</html>
