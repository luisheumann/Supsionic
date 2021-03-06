<!doctype html>
<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	

<title> @section('title') @show </title>  

<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta name="description" content="">
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="../favicon.ico">

<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<head>
<!--********** HEAD *************-->
	@include('includes.head')
</head>
<body>

<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
  @if (Sentry::check())
		@include('includes.header')  
  @endif

 {{-- @include('includes.header') --}}

<!--********** Contenido ***************-->
  @yield('content') 
<!--********** Fin contenido ***********-->

</body>
</html>