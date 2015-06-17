<?php

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    $perfil = User::find($user_id)->empresas->first();

    $avatar = Recursos::ImgAvatar($perfil);
      

  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>

<nav class="navbar navbar-supply navbar-fixed-top">

  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

    <!--

      <button type="button" class="navbar-toggl collapsed" data-target="#bs-example-navbar-collapse-1">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

      </button>

      -->

      <a class="navbar-brand" href="{{URL::to('/')}}">

        <img src="{{asset('images/logob.png')}}">

      </a>

    </div>



    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse">

      <ul class="nav navbar-nav">

        <li>

          <a href="#">

            <img src="{{asset('images/msg.png')}}">

          </a>

        </li>

        <li>

          <a href="#">

            <img src="{{asset('images/conec.png')}}">

          </a>

        </li>

      </ul>



      <ul class="nav navbar-nav navbar-right">

      

      <form class="navbar-form navbar-left" role="search">

        <div class="form-group">

          <div class="input-group">

            <input type="search" class="form-control buscar" placeholder="BUSCAR" name="q">

            <div class="input-group-btn">

                <button class="btn btn-default lupa" type="submit"><i class="glyphicon glyphicon-search"></i></button>

            </div>

          </div>

        </div>

      </form>   

      <li class="separa-menu"></li>

      

        <li>

          <a href="{{URL::to($perfil->slug)}}">

     <!--     <img src="{{asset($avatar)}}" >-->

     @if($perfil->imagen == Null) 

        @else 
    <img id="imagen" height="40" width="40" class="img-circle" alt="Image" src="/uploads/{{$perfil->imagen}}"/>              
        @endif



  


          </a>

        </li>



        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

          <img src="{{asset('images/config.png')}}" class="iconfig">

           </a>

          <ul class="dropdown-menu" role="menu">

            <li> 

              <a href="{{URL::to($perfil->slug)}}"><i class="fa fa-user"></i>

               Mi Perfil</a>

            </li>

            <li> 

              <a href="{{URL::to($perfil->slug.'/registro')}}"><i class="fa fa-refresh"></i></i>

               Modificar Perfil</a>

            </li>   

               <li> 

              <a href="{{URL::to('/admin/backend')}}"><i class="fa fa-cog"></i></i>

               BackEnd</a>

            </li>    



            <li> 

              <a href="{{URL::to('salir')}}"><i class="fa fa-power-off"></i>

               Salir</a>

            </li>            

          </ul>

        </li>      

      </ul>

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->

</nav>



<div class="col-xs-12 mt">

  <ul class="menu-top" >

    <li><a href="{{URL::to('/')}}">INICIO</a></li>

    <li><a href="{{URL::to($perfil->slug)}}">PERFIL</a></li>

  <!--  <li><a href="{{URL::to($perfil->slug.'/registro#info_comercial')}}">AGREGAR PRODUCTOS</a></li>-->
      <li><a href="{{URL::to('/productos/add')}}">AGREGAR PRODUCTOS</a></li>

    <li><a href="/busqueda?categoria=&amp;region=&amp;destino=&amp;origen=&amp;perfil=&amp;country=">BUSCAR NEGOCIOS</a></li>


    @if(Request::segment(1)=='busqueda')

      <li style="position: absolute; left: 50%;">

        <a href="#"> 

          <i class="fa fa-angle-double-down"></i> 

            ESTA ES SU CADENA DE ABASTECIMIENTO 

          <i class="fa fa-angle-double-down"></i>

        </a>

      </li>

    @endif

    

  </ul>

</div>



  