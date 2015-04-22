<!-- Inclue JS  -->
@section('scripts') 
	 {{HTML::script('js/jquery-1.11.0.min.js')}}
	 {{HTML::script('js/bootstrap.min.js')}}
	 {{HTML::script('js/modernizr-2.6.2-respond-1.1.0.min.js')}}
	 {{HTML::script('js/main.js')}}
@show
<!-- Fin Inclue JS  -->

<!-- Inclue CSS  -->
@section('estilos') 
     {{HTML::style('css/normalize.css')}}
     {{HTML::style('css/bootstrap.min.css')}}
	 {{--HTML::style('css/non-responsive.css')--}}
	 {{--HTML::style('css/flat-ui.css')--}}
	 {{HTML::style('css/font-awesome.min.css')}}
	 {{HTML::style('css/main.css')}}
	 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
@show 
<!-- FIn Inclue CSS  -->
