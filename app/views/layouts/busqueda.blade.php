<!doctype html>
<?php

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    $perfil = User::find($user_id)->empresas->first();
    $usuario = User::find($user_id)->first();
    $empresa = User::find($user_id)->empresas->first();

    $avatar = Recursos::ImgAvatar($perfil);
      

  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>
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



 {{HTML::style('css/AdminLTE.min.css')}}
     {{HTML::style('css/skin-blue.min.css')}}

     {{HTML::style('css/bootstrap.min.css')}}
	 {{--HTML::style('css/non-responsive.css')--}}
	 {{--HTML::style('css/flat-ui.css')--}}
	 {{HTML::style('css/font-awesome.min.css')}}
	 {{HTML::style('css/validationEngine.jquery.css')}}
	 {{HTML::style('css/validationEngine.jquery.css')}}
	 {{HTML::style('css/font-awesome.css')}}
	  {{HTML::style('css/infinitycarrusel.css')}}
	   {{HTML::style('css/toastr.css')}}
	 

	 
	 	
	 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>





</head>
<body>

<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
  @if (Sentry::check())
		<body class="skin-blue sidebar-collapse">

    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>M</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Supply</b>Me</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>-->  


<a href="/"> 
<div style="float:left; margin-right:20px; color:#fff; margin-top: 14px; padding-left: 5px;" > <i class="fa fa-home"></i> Inicio   </div></a>
<a href="/{{$empresa->slug}}/"> 
<div style="float:left; margin-right:20px; color:#fff; margin-top: 14px; padding-left: 5px;">  <i class="fa fa-user"></i> Perfil </div> 
</a>
<a href="/{{$empresa->slug}}/admin/producto/add">
<div style="float:left; margin-right:20px; color:#fff; margin-top: 14px; padding-left: 5px;">   <i class="fa fa-plus-circle"></i> Agregar Productos   </div> </a>
<div style="float:left; margin-right:20px; color:#fff; margin-top: 14px; padding-left: 5px;">  <i class="fa fa-search"></i>Buscar Productos  </div> 

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tienes 4 Mensajes </li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="../images/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                           Grupo soporte
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Tienes caraotas disponibles?</p>
                        </a>
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">Ver todos los mensajes</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tienes 10 Notificaciones</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 Nuevos Usuarios Te Siguen 
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver Todos</a></li>
                </ul>
              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tienes 9 Tareas</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                           Completar Perfil
                            <small class="pull-right">20%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Completado</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">Ver todas las tareas</a>
                  </li>
                </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                @if($perfil->imagen == Null) 
        @else 
    <img id="imagen" height="20" width="20" class="img-circle" alt="Image" src="/uploads/{{$perfil->imagen}}"/>              
        @endif
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{$perfil->nombre}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    @if($perfil->imagen == Null) 
        @else 
    <img id="imagen" height="40" width="40" class="img-circle" alt="Image" src="/uploads/{{$perfil->imagen}}"/>              
        @endif
                    <p>
                      Empresa : {{$perfil->nombre}} <br>
                      Usuario : {{$usuario->first_name}} <br>
                      <small>Email: {{$usuario->email}} </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Seguidores</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">xxx</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Amigos</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Deslogeo</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
  		@yield('content-header') 
        </section>

        <!-- Main content -->
        <section class="content">

          @yield('content') 

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
         xxx
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Supplyme</a>.</strong> All rights reserved.
      </footer>
      
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Actividad Reciente</h3>
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Pinturas Monaca</h4>
                    <p>Envio un mensaje </p>
                  </div>
                </a>
              </li>              
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Progreso Tarea</h3> 
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Compra caraota
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>                                    
                </a>
              </li>                         
            </ul><!-- /.control-sidebar-menu -->         

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">            
            <form method="post">
              <h3 class="control-sidebar-heading">General </h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Reporte
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
               
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
 
  @endif

 {{-- @include('includes.header') --}}

<!--********** Contenido ***************-->


<!--********** Fin contenido ***********-->

</body>
</html>