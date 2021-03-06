<?php
    $avatar = Recursos::ImgAvatar($empresa);
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
      </ul>

      <ul class="nav navbar-nav navbar-right">
      <!--
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
      -->
      
        <li>
          <a href="{{URL::to($perfil->slug)}}">
          <img src="{{asset($avatar)}}" class="img-circle">
          </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

