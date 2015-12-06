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
$tareaspendientesoff = 1;
}

else{
$tareaspendientesoff = 0;
  $avatar = Recursos::ImgAvatar($perfil);

}


$mensajes = Mensajes::where('empresa_id',$empresa->id)->get();
$mensajesrelations = Mensajes::where('empresa_mensaje', $empresa->id)->get();


$busquedas = Busquedas::where('producto_id', $empresa->id)->get();
 
  $productos = Busquedas::where('empresa_id','=',$empresa->id)->get();



      $productosbyempresas = Empresa::find($empresa->id)->productos;
      $interesesbyempresas = Empresa::find($empresa->id)->intersesImportador;
      $transportadorbyempresas = Empresa::find($empresa->id)->intersesTransportador;
      $siasbyempresas = Empresa::find($empresa->id)->intersesSias;

      





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



          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

    <li class="dropdown messages-menu">
   <input style="width: 200px; margin-top:13px;" type="text" id="testinputx" value="" />  

          <button style="display:none;" type="button"  id="testid" 
          onclick="updateInput(this.value)" 
          value=""  title="Aceptar">Aceptar</button>

          

<input style="width: 200px" type="hidden" id="valoroculto" value="" />  
<input style="width: 200px" type="hidden" id="slug" value="" />  

              </li> 

            <li class="dropdown messages-menu">
                <!-- INICIO -->
                <a href="/" class="dropdown-toggle">
                  <i class="fa fa-home"></i>
                
                </a>
            
              </li><!-- /.INICIO -->





            <li class="dropdown messages-menu">
                <!-- perfil -->
                <a href="/{{$empresa->slug}}/" class="dropdown-toggle">
                  <i class="fa fa-user"></i>
                
                </a>
            
              </li><!-- /.perfil -->


               <li class="dropdown messages-menu">
                <!-- Agregar producto -->
                <a href="/{{$empresa->slug}}/admin/producto/add" class="dropdown-toggle">
                  <i class="fa fa-plus-circle"></i>
             
                </a>
            
              </li><!-- /.Agregar producto -->

                   <li class="dropdown messages-menu">
                <!-- Buscar -->
                <a href="/api/buscar_cadena?perfil=2&categoria=&productohidden=&selectProducto=producto&producto=&country=&origen=&destino=" class="dropdown-toggle">
                  <i class="fa fa-search"></i>
                 
                </a>
            
              </li><!-- /.Buscar -->



 @if (!$tareaspendientesoff == 0)





              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>


  <?php 


                    if(!$mensajesrelations->count() == null){

                      $valmensajes = 0;
                      $valmensajesrelations = 0;
                      $valtotalmensajes = 0;

                      $valmensajes = $mensajes->count();
                      $valmensajesrelations = $mensajesrelations->count();

                      $valtotalmensajes = $mensajesrelations->count();
                    }else{

                       $valmensajes = null;
                      $valmensajesrelations = null;
                      $valtotalmensajes = null;
                    }

                     
                  ?>

                
                      @if(!$valtotalmensajes == null)
                  <span class="label label-success">{{$valtotalmensajes}} </span>
                @endif







                </a>
                <ul class="dropdown-menu">
                   @if(!$valtotalmensajes == null)
                  <li class="header">Tienes  {{$valtotalmensajes}} Notificaciones</li>
                  @else

            <li class="header">Tienes 0  Notificaciones</li>
                  @endif


                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                       @foreach($mensajesrelations as $mensajesrelation)<li><!-- start message -->
                         <a  href="/{{$empresa->slug}}/mensajes" >

                          



                      
<?php
$perfilmensaje = User::find($mensajesrelation->empresa_id)->empresas->first();
?>




                        
                          <div class="pull-left">
                            <!-- User Image -->
                           @if(empty($perfilmensaje->imagen))

 <img id="imagen" height="100" width="100" style="float:left; " class="img-circle" alt="Image" src="/images/producto.png"/>    

@else
 <img id="imagen" height="40" width="40" class="img-circle" alt="Image" src="/uploads/{{$perfilmensaje->imagen}}"/>      
 @endif
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            {{$mensajesrelation->empresasmensaje->nombre}}
                          
                           
                          </h4>
                          <!-- The message -->
                          <p>

                        

                              @if(@$mensajesrelation->mensaje) {{Str::words(@$mensajesrelation->mensaje,5,$separator = '...')}} @endif

                          </p>




                        </a>
                      </li>@endforeach<!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#"></a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->



              <!-- Notifications BUSQUEDA -->





  <li class="dropdown notifications-menu">

                
                <!-- Menu toggle button -->
              

                @if ($PerfilEmpresa->perfil_id == 1)
                <a href="#" class="dropdown-toggle" onclick="viewProductos({{$empresa->id}})"  data-toggle="dropdown">
                @endif

                  @if ($PerfilEmpresa->perfil_id == 2)
                <a href="#" class="dropdown-toggle" onclick="viewInteres({{$empresa->id}})"  data-toggle="dropdown">
                @endif

                  @if ($PerfilEmpresa->perfil_id == 3)
                <a href="#" class="dropdown-toggle" onclick="viewTransportadores({{$empresa->id}})"  data-toggle="dropdown">
                @endif

                  @if ($PerfilEmpresa->perfil_id == 4)
                <a href="#" class="dropdown-toggle" onclick="viewSias({{$empresa->id}})"  data-toggle="dropdown">
                @endif



                  <i class="fa fa-globe"></i>
              


<!--EMPRESA CON PRODUCTOS -->
  <?php $contadorPRODUCTOS=0 ?>
                @foreach($productosbyempresas as $productosbyempresa)

                @foreach (Busquedas::where('producto_id',$productosbyempresa->id)->where('view','=',Null)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorPRODUCTOS++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorPRODUCTOS ==0)

       
                    <span class="label label-warning">{{$contadorPRODUCTOS}}</span>
                  @endif
                  
<!--EMPRESA CON PRODUCTOS  END-->


<!--INTERES CONTADOR-->

            <?php $contadorINTERES=0 ?>
                @foreach($interesesbyempresas as $interesesbyempresa)

                @foreach (Busquedas::where('interes_id',$interesesbyempresa->id)->where('view','=',Null)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorINTERES++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorINTERES ==0)

              

                    <span class="label label-warning">{{$contadorINTERES}} </span>
                  @endif
                  
<!--INTERES CONTADOR END--> 



<!--TRANSPORTADOR CONTADOR-->

            <?php $contadorTRANSPORTE=0 ?>
                @foreach($transportadorbyempresas as $transportadorbyempresa)

                @foreach (Busquedas::where('transporte_id',$transportadorbyempresa->id)->where('view','=',Null)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorTRANSPORTE++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorTRANSPORTE ==0)

                 
                     <span class="label label-warning">{{$contadorTRANSPORTE}}  </span>
                  @endif
                  
<!--TRANSPORTADOR CONTADOR END--> 


          
<!--SIAS CONTADOR-->

            <?php $contadorSIAS=0 ?>
                @foreach($siasbyempresas as $siasbyempresa)

                @foreach (Busquedas::where('sias_id',$siasbyempresa->id)->where('view','=',Null)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorSIAS++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorSIAS ==0)

<span class="label label-warning">{{$contadorSIAS}}</span>
           
                  @endif
                  
<!--SIAS CONTADOR END--> 





           

                </a>
                   

                <ul class="dropdown-menu">










<!--PRODUCTOS CONTADOR-->

            <?php $contadorPRODUCTOS=0 ?>
                @foreach($productosbyempresas as $productosbyempresa)

                @foreach (Busquedas::where('producto_id',$productosbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorPRODUCTOS++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorPRODUCTOS ==0)

                   <li class="header">Tienes {{$contadorPRODUCTOS}} Notificaciones</li>
                  @endif
                  
<!--PRODUCTOS CONTADOR END--> 





<!--TRANSPORTADOR CONTADOR-->

            <?php $contadorTRANSPORTE=0 ?>
                @foreach($transportadorbyempresas as $transportadorbyempresa)

                @foreach (Busquedas::where('transporte_id',$transportadorbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorTRANSPORTE++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorTRANSPORTE ==0)

                   <li class="header">Tienes {{$contadorTRANSPORTE}} Notificaciones</li>
                  @endif
                  
<!--TRANSPORTADOR CONTADOR END--> 


<!--INTERES CONTADOR-->

            <?php $contadorINTERES=0 ?>
                @foreach($interesesbyempresas as $interesesbyempresa)

                @foreach (Busquedas::where('interes_id',$interesesbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorINTERES++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorINTERES ==0)

                   <li class="header">Tienes {{$contadorINTERES}} Notificaciones</li>
                  @endif
                  
<!--INTERES CONTADOR END--> 




<!--SIAS CONTADOR-->

            <?php $contadorSIAS=0 ?>
                @foreach($siasbyempresas as $siasbyempresa)

                @foreach (Busquedas::where('sias_id',$siasbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)
 
                <?php $contadorSIAS++ ?>
               
                   @endforeach
                   @endforeach

                   @if (!$contadorSIAS ==0)

                   <li class="header">Tienes {{$contadorSIAS}} Notificaciones</li>
                  @endif
                  
<!--SIAS CONTADOR END--> 





          


                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->

                    <!--

                          @foreach($productos as $producto)
           <a href="/">
                          <i class="fa fa-user text-aqua"></i> tu empresa {{Empresa::find($producto->empresa_id)->nombre}} ha agredo una nueva cadena  <b> </b> 

                        </a>

                        @endforeach
-->


<!--EMPRESA CON PRODUCTOS-->

                        @foreach($productosbyempresas as $productosbyempresa)

                          @foreach (Busquedas::where('producto_id',$productosbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)

                        <a href="/">     <i class="fa fa-user text-aqua"></i> La empresa  <b>{{Empresa::find($empresainvolucrada->empresa_id)->nombre }}</b> lo a agregado a una de sus cadenas.  </a>
                           @endforeach

                         @endforeach


<!--EMPRESA CON PRODUCTOS END-->


<!--EMPRESA CON INTERES-->

        @foreach($interesesbyempresas as $interesesbyempresa)

                          @foreach (Busquedas::where('interes_id',$interesesbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)

                        <a href="/">     <i class="fa fa-user text-aqua"></i> La empresa  <b>{{Empresa::find($empresainvolucrada->empresa_id)->nombre }}</b> lo a agregado a una de sus cadenas.  </a>
                           @endforeach

                         @endforeach

<!--EMPRESA CON INTERES END-->




<!--EMPRESA CON TRANSPORTADOR-->

        @foreach($transportadorbyempresas as $transportadorbyempresa)

                          @foreach (Busquedas::where('transporte_id',$transportadorbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)

                        <a href="/">     <i class="fa fa-user text-aqua"></i> La empresa  <b>{{Empresa::find($empresainvolucrada->empresa_id)->nombre }}</b> lo a agregado a una de sus cadenas.  </a>
                           @endforeach

                         @endforeach

<!--EMPRESA CON TRANSPORTADOR END-->



<!--EMPRESA CON SIAS-->

        @foreach($siasbyempresas as $siasbyempresa)

                          @foreach (Busquedas::where('sias_id',$siasbyempresa->id)->select('empresa_id')->get() as $empresainvolucrada)

                        <a href="/">     <i class="fa fa-user text-aqua"></i> La empresa  <b>{{Empresa::find($empresainvolucrada->empresa_id)->nombre }}</b> lo a agregado a una de sus cadenas.  </a>
                           @endforeach

                         @endforeach

<!--EMPRESA CON SIAS END-->






                       


                      </li><!-- end notification -->


<li>

                     
</li>

                    </ul>
                  </li>
                 <!-- <li class="footer"><a href="#">Ver Todos</a></li>-->
                </ul>

               
              </li>


     <!-- Notifications BUSQUEDA FIN -->

              <li class="dropdown notifications-menu">

                
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
              


                  <?php 







                    if(!$socials->count() == null or !$socialrelations->count() == null ){

                      $valsocial = 0;
                      $valsocialrelations = 0;
                      $valtotal = 0;
                      $valcontactoProducto = 0;


                   
                      $valsocial = $socials->count();
                      $valsocialrelations = $socialrelations->count();

                      $valtotal = $valsocial +$valsocialrelations;
                    }else{

                       $valsocial = null;
                      $valsocialrelations = null;
                      $valtotal = null;
                      $valcontactoProducto = null;
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

               
              </li> @endif
              <!-- Tasks Menu --> @if (!$tareaspendientesoff == 0)
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
              </li>@endif
              <!-- User Account Menu --> 
              @if (!$tareaspendientesoff == 0)
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
                <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
                <a href="/{{$empresa->slug}}/admin/backend"><i class="fa fa-gears"></i></a>
              </li>  @endif
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
           
     @if($perfil->imagen == Null) 
        @else 
    <img id="imagen" height="40" width="40" class="img-circle" alt="Image" src="/uploads/{{$perfil->imagen}}"/>              
        @endif

            </div>
            <div class="pull-left info">
              <p>{{$perfil->nombre}}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
     


            @if($PerfilEmpresa->perfil_id == 1)
            <li class="treeview">
              <a href="#"><i class='fa fa-link'></i> <span>Productos </span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="/{{$empresa->slug}}/admin/producto/lista">Lista</a></li>
                <li><a href="/{{$empresa->slug}}/admin/producto/add">Agregar Producto</a></li>
              </ul>
            </li>


            @endif
  @if($PerfilEmpresa->perfil_id == 2)
        
            <li class="treeview">
              <a href="/{{$empresa->slug}}/interes_importador"><i class='fa fa-link'></i> <span>Intereses </span> <i class="fa fa-angle-left pull-right"></i></a>
              <!--<ul class="treeview-menu">
                <li><a href="/{{$empresa->slug}}/interes_importador">Lista</a></li>
           
              </ul>-->
            </li>


            @endif


  @if($PerfilEmpresa->perfil_id == 4)
        
            <li class="treeview">
              <a href="/{{$empresa->slug}}/info_sias"><i class='fa fa-link'></i> <span>Intereses </span> <i class="fa fa-angle-left pull-right"></i></a>
              <!--<ul class="treeview-menu">
                <li><a href="/{{$empresa->slug}}/interes_importador">Lista</a></li>
           
              </ul>-->
            </li>


            @endif


              @if($PerfilEmpresa->perfil_id == 3)
        
            <li class="treeview">
              <a href="/{{$empresa->slug}}/interes_transportador"><i class='fa fa-link'></i> <span>Intereses </span> <i class="fa fa-angle-left pull-right"></i></a>
             
            </li>


            @endif




              <li >
              <a href="/{{$empresa->slug}}/admin/perfil/empresa#datos-basicos"><i class='fa fa-link'></i> <span>Perfil</span> <i class="fa fa-user-left pull-right"></i></a>
             
            </li>

              <li class="treeview">
              <a href="/{{$empresa->slug}}/cadenas/lista"><i class='fa fa-link'></i> <span>Cadenas </span> <i class="fa fa-angle-left pull-right"></i></a>
              <!--<ul class="treeview-menu">
                <li><a href="/{{$empresa->slug}}/interes_importador">Lista</a></li>
           
              </ul>-->
            </li>



          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

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
   {{HTML::script('js/bootstrap.min.js')}}
   {{HTML::script('js/app.min.js')}}
   {{HTML::script('js/toastr.js')}}
   {{HTML::script('js/ckeditor/ckeditor.js')}}




{{HTML::script('js/jquery.fancybox.js')}}

    

{{HTML::script('/api/tree/jquery.optionTree.js')}}

{{HTML::script('/js/autocomplete.js')}}
{{HTML::script('js/bootstrap-multiselect.js')}}

<link rel="stylesheet" href="/css/autocomplete.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



<script type="text/javascript">

  var options = {
    script:"/json/busqueda",
    varname:"?term",
    json:true,
    maxresults: 10,
    callback: function (obj) { 
      document.getElementById('testid').value = obj.id; 
      var valor = document.getElementById("valoroculto").value = obj.id;
       var slug2 = document.getElementById("slug").value = obj.info;

     var search_empresa = document.getElementById("testinputx").value;


//window.location.href = "/coyote22/producto/" + valor + slug;



function string_to_slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  
  // remove accents, swap ñ for n, etc
  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  var to   = "aaaaeeeeiiiioooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
}
$(document).ready(function() {
    $('#test').submit(function(){
        var val = string_to_slug($('#t').val());
        alert(val);
        return false;
    });
});



          switch (slug2) {

    case 1:
         window.location.href = "/coyote22/producto/" + valor;
        break;
    case 2:
          window.location.href = "/" + string_to_slug(search_empresa);
        break;
}



      if (!valor==null ){
         
              var valor =  valor;

      }else{
       var valor= 0;
     }


   }
 };
 var as_json = new AutoSuggest('testinputx', options);


 var options_xml = {
  script:"test.php?",
  varname:"input"
};
var as_xml = new AutoSuggest('testinput_xml', options_xml);




</script>

<script>
function viewProductos(id) {
   $.get('/viewconterProductos/'+ id,
    {
        name: "busqueda"
     
    },
    function(data, status){
    
    });

}


function viewSias(id) {
   $.get('/viewconterSias/'+ id,
    {
        name: "busqueda"
     
    },
    function(data, status){
    
    });

}

function viewTransportadores(id) {
   $.get('/viewconterTransportadores/'+ id,
    {
        name: "busqueda"
     
    },
    function(data, status){
    
    });

}

function viewInteres(id) {
   $.get('/viewconterInteres/'+ id,
    {
        name: "busqueda"
     
    },
    function(data, status){
    
    });

}








</script>
  


@show
  </body>
</html>