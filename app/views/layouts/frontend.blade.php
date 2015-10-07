<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<?php

if (Sentry::check())

{

  $user_id = Sentry::getuser()->id;

  $perfil = User::find($user_id)->empresas->first();
  $usuario = User::find($user_id)->first();

  $avatar = Recursos::ImgAvatar($perfil);

  $empresa = User::find($user_id)->empresas->first();
  $perfil2  = Empresa::find($empresa->id)->perfil->first();

  $PerfilEmpresa  = PerfilEmpresa::find($perfil2->pivot->id);

  $perfilpoint = 30;

  if (!$usuario->cargo == null ) {

    $progreso = 1;
  }else
  {
    $progreso = 0;
  }

  if (!$empresa->nombre == null ) {$progreso =$progreso + 1;}
  if (!$empresa->descripcion == null ) {$progreso =$progreso + 1;}
  if (!$empresa->email == null ) {$progreso =$progreso + 1;}
  if (!$empresa->web == null ) {$progreso =$progreso + 1;}
  if (!$empresa->direccion == null ) {$progreso =$progreso + 1;}
  if (!$empresa->telefono == null ) {$progreso =$progreso + 1;}
  if (!$empresa->postal == null ) {$progreso =$progreso + 1;}
  if (!$empresa->ciudad == null ) {$progreso =$progreso + 1;}
  if (!$empresa->personacontacto == null ) {$progreso =$progreso + 1;}


  $progreso = $progreso * 4;


  $empresapoint = 0;

  if (!$empresa->FOB == null or !$empresa->CFR == null or !$empresa->CIF == null or !$empresa->EXW == null or !$empresa->FAS == null or !$empresa->CIP == null or !$empresa->FCA == null or !$empresa->CPT == null or !$empresa->DEQ == null or !$empresa->DDP == null or !$empresa->DDU == null or !$empresa->DAF == null or !$empresa->DES == null or !$empresa->Expres == null) {$empresapoint =  10;}

  if (!$empresa->COP == null or !$empresa->USD == null or !$empresa->EUR == null or !$empresa->CAD == null or !$empresa->AUD == null or !$empresa->HKD == null or !$empresa->GBP == null or !$empresa->CNY == null or !$empresa->CHF == null) {$empresapoint = $empresapoint +  10;}

  if (!$empresa->TT == null or !$empresa->LC == null or !$empresa->DP == null or !$empresa->DA == null) {$empresapoint = $empresapoint +  5;}

  if (!$empresa->aleman == null or !$empresa->arabe == null or !$empresa->frances == null or !$empresa->ruso == null or !$empresa->koreano == null or !$empresa->hindu == null or !$empresa->italiano == null  or !$empresa->espanol == null  or !$empresa->chino == null  or !$empresa->japones == null  or !$empresa->portugues == null) {$empresapoint = $empresapoint +  5;}

  if (!$perfil->imagen == null ) {$progreso_imagen =100;}else{$progreso_imagen =0;}

  $tareaspendientes = 0;

  if ($progreso_imagen != 100 ) {$tareaspendientes = $tareaspendientes +1;}


  $totalpoint = 0; 

  $totalpoint =   $empresapoint  +   $progreso + $perfilpoint;
  if ($totalpoint != 100) {$tareaspendientes = $tareaspendientes +1;}

}

else{

  $avatar = Recursos::ImgAvatar($perfil);

}





$socials = SocialRelation::where('empresa_id',$empresa->id)->get();
$socialrelations = SocialRelation::where('empresa_id_related', $empresa->id)->get();



?>
<html>
  <head>
  <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  

<title> @section('title') @show </title>  

<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta name="description" content="">
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="../favicon.ico">


   @include('includes.head-backend')

   <style>
.navbar-nav>.notifications-menu>.dropdown-menu>li .menu>li>a {
    color: #444444;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding: 3px;
    font-size: 11px;
}

.content-wrapper{

  margin-left: 0px;
}
   </style>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-blue sidebar-mini">
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
          <!-- Sidebar toggle button-->


<!--
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>-->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">



            <li class="dropdown messages-menu">
                <!-- INICIO -->
                <a href="/{{$empresa->slug}}/" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-home"></i>
                
                </a>
            
              </li><!-- /.INICIO -->



            <li class="dropdown messages-menu">
                <!-- perfil -->
                <a href="/{{$empresa->slug}}/" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                
                </a>
            
              </li><!-- /.perfil -->


               <li class="dropdown messages-menu">
                <!-- Agregar producto -->
                <a href="/{{$empresa->slug}}/admin/producto/add" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-plus-circle"></i>
             
                </a>
            
              </li><!-- /.Agregar producto -->

                   <li class="dropdown messages-menu">
                <!-- Buscar -->
                <a href="/{{$empresa->slug}}/admin/producto/add" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-search"></i>
                 
                </a>
            
              </li><!-- /.Buscar -->





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
              
                  
                  <?php 


                    if(!$socials->count() == null or !$socialrelations->count() == null){

                      $valsocial = 0;
                      $valsocialrelations = 0;
                      $valtotal = 0;

                      $valsocial = $socials->count();
                      $valsocialrelations = $socialrelations->count();

                      $valtotal = $valsocial +$valsocialrelations;
                    }

                  ?>

                
                  @if(!$valtotal == 0)
                  <span class="label label-warning">{{$valtotal}} </span>
                @endif





                </a>
                <ul class="dropdown-menu">
                   @if(!$socials->count() == null or !$socialrelations->count() == null)
                  <li class="header">Tienes {{$valtotal}}  Notificaciones</li>
                  @endif



                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->

                         @foreach($socials as $social)
                        <a href="/{{$social->empresas->slug}}">
                          <i class="fa fa-user text-aqua"></i>Has empezado a seguir a  <b>  {{$social->empresas->nombre}} </b> 

                        </a>


                        @endforeach



                       


                      </li><!-- end notification -->


<li>

                       @foreach($socialrelations as $socialrelation)
                        <a href="/{{$socialrelation->empresas->slug}}">
                          <i class="fa fa-user text-aqua"></i> <b>  {{$socialrelation->empresasrelated->nombre}} </b> Te ha seguido.
                       

                        </a>


                        @endforeach
</li>

                    </ul>
                  </li>
                 <!-- <li class="footer"><a href="#">Ver Todos</a></li>-->
                </ul>
              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  @if($tareaspendientes > 0)
                  <span class="label label-danger">{{$tareaspendientes}}</span>
                  @endif
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tienes {{$tareaspendientes}} Tareas</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                          Imagen Perfil
                            <small class="pull-right">{{$progreso_imagen}}%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->


                            <div class="progress-bar progress-bar-aqua" style="width: {{$progreso_imagen}}%" role="progressbar" aria-valuenow="{{$progreso_imagen}}" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">{{$progreso_imagen}}% Completado</span>
                
                            </div>
                          </div>
                        </a>


                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                           Perfil Completado
                            <small class="pull-right">{{$totalpoint}}%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->


                            <div class="progress-bar progress-bar-aqua" style="width: {{$totalpoint}}%" role="progressbar" aria-valuenow="{{$progreso}}" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">{{$totalpoint}}% Completado</span>
                
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                  <!--  <a href="#">Ver todas las tareas</a>-->
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




   @section('scripts') 

	 {{HTML::script('js/jquery-1.11.0.min.js')}}
	 <!--	 {{HTML::script('js/infinitycarrusel.js')}}	-->

{{HTML::script('js/jquery.fancybox.js')}}




<script type="text/javascript">







  $(document).ready(function(){


     var showChar = 250;
    var ellipsestext = "...";
    var moretext = "Ver m&#225;s";
    var lesstext = "Ver menos";
    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });





    $('.teco').click(function(){
      var largeImage = $(this).attr('data-full');
      $('.selected').removeClass();
      $(this).addClass('selected');
      $('.full img').hide();
      $('.full img').attr('src', largeImage);
      $('.full img').fadeIn();


    }); // closing the listening on a click
    $('.full img').on('click', function(){
      var modalImage = $(this).attr('src');
      $.fancybox.open(modalImage);
    });
  }); //closing our doc ready
  </script>



   {{HTML::script('js/lory.min.js')}}
	 {{HTML::script('js/bootstrap.min.js')}}
	 	 {{HTML::script('js/app.min.js')}}

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>


<script type="text/javascript">
   $(document).ready(function() {      
  
 $('.carousel').carousel('pause');


  
});




</script>


  



@show
  </body>
</html>