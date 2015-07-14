
<?php

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;

  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>





@extends('layouts/frontend')



@section('content-header')


<style>

.title-productos-vistos{
	color: #000;
	  
  font-size: 21px;
  line-height: 1.5;
}

.titulo-productos-precio{

	color:#c00;
}

.producto-titulo{
font-size: 14px;
	color:#666;
	font-weight: bold;
}

.producto-categoria{
color:#666;

}


.m-region {
	  width: 100%;
  border: 1px solid #ededed;
  margin-top: -1px;
  padding: 20px;
  height: 71px;
  background-color: #fafafa;
}
.item-flat{


	  position: relative;
  display: inline-block;
  float: left;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
}

.box.home-information{

	height:150px;
	  margin-top: 10px;
}

.home-information-borde{
  border-left: 1px solid #e6e6e6;
  padding-left: 20px;
  height:150px;

}

.information-title{
font-weight: bold;
font-size: 16px;
  margin-top: 5px;

}

.home-fondo-carrusel{

	background-color: #fff;
	  margin-top: 20px;
}
.skin-blue .sidebar-form {
	margin: 0px !important;

}
.users-list>li img {
  border-radius: 0%;
 
 width: 80px;
 height: 80px;
}

</style>



  
            <small> Inicio</small>
       <h1>   </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li class="active">Productos</li>
          </ol>
@stop



@section('content')

<div class="row">
            <!-- Left col -->
            <div class="col-md-8">
            
              <div class="row">
             

                <div class="col-md-6">
                  <!-- USERS LIST -->
                  
                </div><!-- /.col -->
              </div><!-- /.row -->

              <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>

<div  class="home-fondo-carrusel">
<div class="title-productos-vistos">Productos mas vistos</div>
<div class="infinite-carousel">

  <div class="carousel-viewport">
  <a href="http://supply.jenimakeup.com/demo/lista">
      <div class="slide slide-current"><img src="{{asset('uploads/productos/thumbnail/demo1.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto </div><div class="producto-categoria"><b>Categoria:</b> Alimentos </div><div class="titulo-productos-precio"><b>Precio:</b> 150  $ </div></div>
      <div class="slide"> 	<img src="{{asset('uploads/productos/thumbnail/demo2.jpg')}}" width="150" height="100" alt="dfgdgdfgd"><div class="producto-titulo"> Producto 2 </div><div class="producto-categoria"><b>Categoria:</b> Electronica </div><div class="titulo-productos-precio"><b>Precio:</b> 300  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo3.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 3 </div><div class="producto-categoria"><b>Categoria:</b> Industria </div><div class="titulo-productos-precio"><b>Precio:</b> 150  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo4.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 4 </div><div class="producto-categoria"><b>Categoria:</b> Hogar </div><div class="titulo-productos-precio"><b>Precio:</b> 300  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo5.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 5 </div><div class="producto-categoria"><b>Categoria:</b> Infantil </div><div class="titulo-productos-precio"><b>Precio:</b> 250  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo6.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 6 </div><div class="producto-categoria"><b>Categoria:</b> Juegos </div><div class="titulo-productos-precio"><b>Precio:</b> 400  $ </div></div>
</a>
  </div><!--.carousel-viewport-->

  <a class="carousel-control-previous"><</a>
  <a class="carousel-control-next">></a>
  
</div><!--.infinite-carousel-->
</div>


<div class="box home-information">


      <div class="col-xs-6 col-sm-4  home-information-borde">
        <div class="information-title"><span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-users fa-stack-1x fa-inverse"></i>
</span> Identifica tu Negocio</div>
          <div class="sub-title">Consigue verificado, Construir Confianza</div>
          <div class="description">

            <br>
           Respuestas mas rapidas a los proveedores cuando se verifican
          </div>
   
      </div>
      <div class="col-xs-6 col-sm-4 home-information-borde">
     
    


        <div class="information-title"><span class="fa-stack fa-lg ">
  <i class="fa fa-circle fa-stack-2x "></i>
  <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
</span>   Identifica tu Negocio</div>
          <div class="sub-title"> Comercio con confianza</div>
          <div class="description">
			
            <br>
			En tiempos de envío y la calidad del producto
          </div>
      
      </div>      
      <div class="col-xs-6 col-sm-4 home-information-borde">
     
     

        <div class="information-title"> <span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-trophy fa-stack-1x fa-inverse"></i>
</span> Identifica tu Negocio</div>
          <div class="sub-title">Busque su producto</div>
          <div class="description">
           
            <br>
          Rentabilidad probada
            <br>
           Simple proceso, transparente
          </div>
     
      </div>
   
	
</div>

<div  class="home-fondo-carrusel">

<div class="title-productos-vistos">Proveedores verificados seleccionados en  todo el mundo.</div>


<div class="infinite-carousel">

  <div class="carousel-viewport">
      <div class="slide slide-current"><img src="{{asset('uploads/productos/thumbnail/demo1.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto </div><div class="producto-categoria"><b>Categoria:</b> Alimentos </div><div class="titulo-productos-precio"><b>Precio:</b> 150  $ </div></div>
      <div class="slide"> 	<img src="{{asset('uploads/productos/thumbnail/demo2.jpg')}}" width="150" height="100" alt="dfgdgdfgd"><div class="producto-titulo"> Producto 2 </div><div class="producto-categoria"><b>Categoria:</b> Electronica </div><div class="titulo-productos-precio"><b>Precio:</b> 300  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo3.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 3 </div><div class="producto-categoria"><b>Categoria:</b> Industria </div><div class="titulo-productos-precio"><b>Precio:</b> 150  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo4.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 4 </div><div class="producto-categoria"><b>Categoria:</b> Hogar </div><div class="titulo-productos-precio"><b>Precio:</b> 300  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo5.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 5 </div><div class="producto-categoria"><b>Categoria:</b> Infantil </div><div class="titulo-productos-precio"><b>Precio:</b> 250  $ </div></div>
      <div class="slide"><img src="{{asset('uploads/productos/thumbnail/demo6.jpg')}}" width="150" height="100" alt=""><div class="producto-titulo"> Producto 6 </div><div class="producto-categoria"><b>Categoria:</b> Juegos </div><div class="titulo-productos-precio"><b>Precio:</b> 400  $ </div></div>

  </div><!--.carousel-viewport-->

  <a class="carousel-control-previous"><</a>
  <a class="carousel-control-next">></a>
  
</div><!--.infinite-carousel-->

</div>

<br>
<br>
   


      <!-- TABLE: LATEST ORDERS -->
           
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
             
<div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Ultimas Empresas</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src="{{asset('uploads/57763.jpeg')}}" alt="User Image" width="100px" height="100px">
                          <a class="product-img" href="#">Alexander </a>
                          <span class="users-list-date">Today</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/69034.jpeg')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Norman</a>
                          <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/58711.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Jane</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/69034.jpeg')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">John</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                
                        <li>
                          <img src="{{asset('uploads/38579.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/38579.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/38579.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/38579.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/38579.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/38579.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="{{asset('uploads/38579.png')}}" alt="User Image"  width="100px" height="100px">
                          <a class="product-img" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>

                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">Ver todas las empresas</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->

              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevos Productos Agregados </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Samsung TV <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="{{asset('uploads/productos/thumbnail/57465.jpeg')}}" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Bicycle <span class="label label-info pull-right">$700</span></a>
                        <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="{{asset('uploads/productos/thumbnail/56334.jpeg')}}" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                        <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <img src="{{asset('uploads/productos/thumbnail/77778.jpeg')}}" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">PlayStation 4 <span class="label label-success pull-right">$399</span></a>
                        <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">Ver todos los productos</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
@stop





<!-- Finaliza el render de la pagina -->

@stop
