<!DOCTYPE html>
<html lang="pt-BR">
<!--[if lt IE 7]>      <html lang="{{ Config::get('application.language') }}" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="{{ Config::get('application.language') }}" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="{{ Config::get('application.language') }}" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="{{ Config::get('application.language') }}" class="no-js"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <!--[if ie]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>{{$title}}</title>	
	{{ HTML::script('comum/js/jquery.min.js');}}
	{{ HTML::script('comum/js/main.js') }}
	{{ HTML::script('comum/js/jquery.masked.input.js') }}	
	{{ HTML::script('comum/js/jquery.prettyPhoto.js') }}
	{{ HTML::script('comum/js/jNice.js') }}
	{{ HTML::script('comum/js/my_validate.js') }}	
	{{ HTML::script('comum/js/jquery.placeholder.min.js') }}	
	{{ HTML::script('comum/js/chosen.jquery.min.js') }}	
	{{ HTML::style('comum/css/reset.css') }}
	{{ HTML::style('comum/css/main.css') }}	
	{{ HTML::style('comum/css/chosen.css') }}	
	{{ HTML::style('comum/css/prettyPhoto.css') }}	
	{{ Asset::setDomain(URL::to('/').'/')}}

	<link rel="shortcut icon" href="favicon.ico">

	{{ Asset::css() }}
	<!--Script para que o IE interprete adequadamente os CSS3,CSS2 PSEUDO SELECTORES:-->
    <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <![endif]-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
	<div id="container">
		<header>
		</header>
		<section class="conteudo_site">
			<div class="conteudo">
				{{$content}}	
			</div>
		</section>
		<footer>
		</footer>
	</div>
	{{ Asset::js() }}
</body>
</html>