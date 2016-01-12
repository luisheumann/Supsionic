
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


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=118934128444501";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


@extends('layouts/busqueda')



@section('content-header')


<style>



.bodyWrap
{
width: 900px;
margin: 5% auto;
}

.main, .content{
  float: left;
 
}

.breadCrumbs{
  float: left;
  padding: 5px 0 5px 10px;
  letter-spacing: 1px;
  line-height: 2em;
  color: #fff;
}

.breadCrumbs>a{
  text-decoration: none; 
  color: #fff;
}

.breadCrumbs>a:hover{
  text-decoration: underline;
}



.content
{
overflow: hidden;
background: #fff;
}

.content p
{
padding: 0 0 0 10px;
}

.bottom
{
width: 100%;
height: 2.5em;
border-top: 1px solid #B6B6AB;
background: #EAEAEA;
}

.bd
{
border: 1px solid #B6B6AB;
border-radius: 4px;
}

.clearFix:after
{
content: " ";
display: block;
height: 0;
clear: both;
}

.productStage, .productImage, .overview
{
  float: left;
}

.overview h1, .overview h2, .overview h3
{
  padding: 0;
  margin: 0 0 10px 0;
}

.productStage
{
  background: #fff;
  width: 700px;
  margin-right: 20px;
}

.productImage
{
  padding-left: 10px;
    

  margin-bottom: 20px;
}

.productImage span{
  float: right;
  padding-right: 30px;
}

span a{
  text-decoration: none;
}

.overview
{
  float: left;
  width: 320px;
}


.button
{
display: block;
color: #fff;
border-radius: 4px;
padding: 5px;
margin: auto;
margin-bottom: 10px;
text-decoration: none;
border-radius:3px;
text-align: center;
cursor: pointer;
}

.button a:hover
{
text-decoration: none;
}

.add{
  width: 150px;
  line-height: 2em;
  background: #59A80F;
}

.add:hover{
  background: #4B8E0D;
}

.wish{
  width: 150px;
  background: #45ADA8;
}

.wish:hover{
  background: #388B87;
}

.submit{
  background: #EAEAEA;
  color: #555;
  float: right;
  text-transform: uppercase;
  font: bold 10px Verdana;
}

.blueSubmit{
  background: #22697F;
  color: #fff;
  border: 1px solid #22697F;
}

.right{
  float: right;
}

.left{
  float: left;
}

.imageList { list-style: none; margin: 5px 0px 2px 0px; padding: 0; }
.imageList li { display: inline; padding: 0; margin: 0 2px;  }
.imageList a { text-decoration: none; }
.imageList img { border: 1px solid #D3D3D3; vertical-align: top; }

.prodSelect{
  width: 100%;
  border-radius: 4px;
  height: 2em;
  outline: none;
  margin-bottom: 15px;
}

.rating{
  color: #FC913A;
}

.info{
  float: left;
  width: 100%;
}

.info h3{
  background: #22697F;
  line-height: 36px;
  padding: 5px 0 5px 20px;
  border-radius: 4px;
  letter-spacing: 1px;
  color: #fff;
  text-shadow:1px 1px 3px rgba(0,0,0,0.5);
  font: 10pt Verdana;
  text-transform: uppercase;
}

.description{
  display: inline-block;
  margin: 10px 0 20px 0;
}

.specs{
  list-style-type: none;
  margin: 0;
  padding: 0 0 0 10px;
}

.specs li{
  padding: 0 0 5px 0;
}

.specs h5{
  display: inline;
  font: bold 10pt Verdana;
}


.product
{
width: 150px;
padding: 10px 0 0 10px;
display: inline-block;
text-align: center;
font-size: 11px;
line-height: 14px;
text-decoration: none;
margin-bottom: 20px;
overflow: hidden;
}

.product a{
  text-decoration: none;
}

.product a:hover{
  text-decoration: underline;
}

.product .smallBox
{
display: inline-block;
max-width: 92px;
max-height: 92px;
overflow: hidden;
}

.product span, .product div
{
display: block;
}

.soft
{
padding-left: 8px;
}

.hard
{
padding-left: 12px;
}

.slim
{
  padding: 0;
  margin: 0 0 10px 0;
  width: 100%;
  display: block;
}

.vtop
{
vertical-align: top;
}

.vbot
{
vertical-align: bottom;
}

.manuName
{
margin: 10px 0 5px 0;
font-weight: bold;
color: #464646;
}

.prodName
{
color: #464646;
margin: 0 0 5px 0;
}

.prodPrice
{
text-decoration: none;
}

.review{
  background: #E7F5FD;
  color: #555;
  padding: 10px;
  border-radius: 4px;
  margin-bottom: 15px;
  float: left;
}

.review span{
  float: left;
}

.review:hover .vote{
  opacity: 1;
}

.vote{
  opacity: 0;
  float: right;
  font-weight: bold;
  padding: 15px 0 0 0;
}

span.title{
  text-align: left;
  font-weight: bold;
  padding: 0 0 10px 0;
}

span.author{
  text-align: right;
  float: left;
  padding: 15px 0 0 0;
}

.stars{
  padding: 10px 0;
  display: inline-block;
}

.botBorder{
  padding: 10px;  
  border: 1px solid #B6B6AB;
  border-top: none;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  margin-bottom: 20px;
}

.folderTab {
background: #22697F;
text-shadow: 1px 1px 0 rgba(0,0,0, .8);
text-align: center;
color: #fff;
border-top-left-radius: 4px;
border-top-right-radius: 4px;
border: 1px solid #22697F;
}

.folderTab.sub{
  background: #5196A3;
  border: 1px solid #5196A3;
}

.folderTab h3{  
  margin: 0;
  padding: 5px 0 5px 20px;
  color: #fff;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
  letter-spacing: 1px;
  font: 10pt Verdana;
  line-height: 2em;
  max-width: 400px;
  text-transform: uppercase;
  text-align: left;
  float: left;
}

 .folderTab.sub h3{
   text-align: center;
   padding: 5px;
   float: none;
 }

.submit:hover{
  background: #D2D2D2;
}

.blueSubmit:hover{
  background: #184A5A;
  border: 1px solid #184A5A;
}

li.item {
  width: 150px !important;
  float: left !important;
}

select#moneda {
  width: 67px;
}

.imageList {
  width: 43px;
  float:left;


}

.imageList img {
  border: 1px solid #000;
  vertical-align: top;
  margin-bottom: 10px;
}

.a-size-large {
  font-size: 21px!important;
  line-height: 1.3!important;
  font-family: Arial,sans-serif;
  text-rendering: optimizeLegibility;
}

.a-color-price {
  color: #b12704!important;

  font-weight: bold;
}
.a-list-item-b{
font-weight: bold;
}


.list-item-descripcion{
  color: #CC6600;
  font-size: medium;
  margin: 0 0 0.25em;
  font-weight: bold;
}

.disclaim {
  margin-top: 3px;
  font-size: 13px;
  color: #888;

}


td.title-item-producto {
  width: 35%;
  background-color: #f5f5f5;
}

th.title-item-producto {
  width: 35%;
  background-color: #f5f5f5;
}


.table-bordered {
  border: 1px solid #ddd;
  font-size: 12px;
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
.pote{

  width: 142px;
  height: 300px;
  margin: 8px;
  overflow: hidden;
  /* background-color: #666; */
  /* overflow-wrap: normal; */
}





.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
  /* padding-left: 35px; */
  margin-left: 30px;
}


.row.clearfix.fondomiddle {
  background-color: #fff;
  margin-top: 2px;
  padding-top: 10px;
}


.row2 .row2 {
  width: auto;
  max-width: none;
  margin: 0 -16px;
}


.carousel-control {
 
  width: 8% !important;

  }




  li.floatleft {
  float: left;
  width: 200px;
}

.productImage {
    margin-right: 20px;
}

a.morelink {
    text-decoration:none;
    outline: none;
}
.morecontent span {
    display: none;
}
.comment {
    width: 100%;
   
    margin: 10px;
}



</style>



  
       
@stop



@section('content')

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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



        <div class="box box">
          <!--      <div class="box-header with-border">
                  <h3 class="box-title">Producto</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>--><!-- /.box-header -->
                <div class="box-body">
             

<div class="">    

  <div class="tele">




 <div class="container2">
      <div class="gallery">
<div style="width:380px">

     <ul class="imageList">
        
 <div class="previews">
          @foreach($imagenes as $imagen)
    <li><a href="#" id="teco" class="teco" data-full="/uploads/productos/{{$imagen->imagen}}"><img id="teco"  class="teco" height="40" width="40"  src="/uploads/productos/{{$imagen->imagen}}" /></a> </li>

            @endforeach
          </ul>
          </div>


      <div class="productImage">
     <div class="full"> 
        <img id="imagen2" title1="@if ($producto->imagen->count()>0){{$img= $imagenes[0]->imagen}} @else {{$img= 'producto.png'}} @endif"  style="float:right;"  alt="Image" src="/uploads/productos/{{$img}}"/> 
</div>
          </div>  
      </div>
     
      </div>
      </div>



      </div><!--COL MD6-->

      <div class="det">

<div><span class="a-list-item-empresa"><a href="/{{$empresa->slug}}">{{$empresa->nombre}}</a></span></div>
<span id="productTitle" class="a-size-large">{{$producto->nombre}}</span>
   <div><span class="rating ">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span></div>
        <!--<div class="row" style="border: 0; border-top: 1px solid #eee; width=100%"></div>--> <!---SEPARACION-->


        @if ($producto->precio == null)
        @else
        <span class="a-list-item-precio"> Precio : <span class="a-color-price">{{$producto->precio}}  {{$monedas->codigo}}</span>  
        @endif

        @if ($producto->produccion_mes == null)
        @else
        <div><span class="a-list-item"> <b>Produccion por mes : </b>{{$producto->color}}</span></div>
        @endif

        @if ($producto->venta_minima == null)
        @else
        <div><span class="a-list-item"> <b>Cantidad Minima : </b>{{$producto->venta_minima}}</span> </div>
        @endif

        @if ($producto->stock == null)
        @else
        <div><span class="a-list-item"> <b>Cantidad Disponible :</b> {{$producto->stock}}</span></div>
        @endif
             @if ($producto->puerto == null)
        @else
        <div><span class="a-list-item"> <b>Puerto de Origen :</b> {{$producto->puerto}}</span></div>
        @endif


      





<div id="feature-bullets" class="a-section a-spacing-medium a-spacing-top-small">
	
		
			<!--
				<ul class="a-vertical a-spacing-none">
					
						<li><span class="a-list-item"> Cantidad : {{$producto->stock}}</span></li>
					
						<li><span class="a-list-item"> Precio : {{$producto->precio}}</span></li>
					
						<li><span class="a-list-item"> Marca: {{$producto->marca}}</span></li>
					
						<li><span class="a-list-item"> Color :{{$producto->Color}}</span></li>
					
						<li><span class="a-list-item"> Peso: {{$producto->Peso}}</span></li>
					
					
					
				</ul>
			-->
			
</div>
        

    

                   
 <button class="btn btn-success" id="btn_import"><i class="fa fa-check"></i> Seleccionar</button>
        

       
</div>

   
</div>


                </div><!-- /.box-body -->
              

                <div class="box-footer clearfix">



                  <div><span class="list-item-descripcion">Descripcion del producto</span></div>


           <!--   <div class="disclaim">Peso: <strong>{{$producto->peso}}</strong>&nbsp;|&nbsp;Marca: <strong>{{$producto->marca}}</strong>&nbsp;|&nbsp;Color: <strong>{{$producto->color}}</strong></div>-->


                  <ul class="specs">

                  <div class="comment more">
                 {{$producto->descripcion}}
                 </div></li>
                   
                 </ul>  
               </div>
  

               <div class="box-footer clearfix">
                 <div><span class="list-item-descripcion">Informacion del producto</span></div>
              <!--    <div class="disclaim">Peso: <strong>{{$producto->peso}}</strong>&nbsp;|&nbsp;Marca: <strong>{{$producto->marca}}</strong>&nbsp;|&nbsp;Color: <strong>{{$producto->color}}</strong></div>-->

<table class="table table-bordered">
                    <tbody><tr>
                   
                      <th class="title-item-producto">Producto</th>
                      <th>{{$producto->nombre}}</th>
    
                    </tr>
                   
                <!--
                    <tr>

                      <td class="title-item-producto">Categoria</td>
                      <td>
                    
                     </td>

                   </tr>-->
               
                   @if ($producto->codigo == null)
                    @else
                   <tr>

                    <td class="title-item-producto">Codigo</td>
                    <td>
                      {{$producto->codigo}}
                    </td>
               
                    </tr>
                    @endif
                     @if ($producto->referencia == null)
                    @else
                    <tr>
                
                      <td class="title-item-producto">Referencia</td>
                      <td>
                        {{$producto->referencia}}
                      </td>
               
                    </tr>
                    @endif
                     @if ($producto->material == null)
                    @else
                    <tr>
        
                      <td class="title-item-producto">Material</td>
                      <td>
                      {{$producto->material}}
                      </td>
                     
                    </tr>
                    @endif

                     

                     @if ($producto->marca == null)
                    @else
                    <tr>
        
                      <td class="title-item-producto">Marca</td>
                      <td>
                      {{$producto->marca}}
                      </td>
                     
                    </tr>
                    @endif

                   @if ($producto->color == null)
                    @else
                    <tr>
        
                      <td class="title-item-producto">Color</td>
                      <td>
                      {{$producto->color}}
                      </td>
                     
                    </tr>
                    @endif



                     @if ($producto->partida == null)
                    @else
                    <tr>
                    
                      <td class="title-item-producto">Partida arancelaria</td>
                      <td>
                       {{$producto->partida}}
                      </td>
                   
                    </tr>
                    @endif

                    @if ($producto->peso == null)
                    @else
                    <tr>
                    
                      <td class="title-item-producto">peso</td>
                      <td>
                       {{$producto->peso}}  @if ($producto->peso_unidad =1) Kilos @else Libras @endif
                      </td>
                   
                    </tr>
                    @endif

                    

                     @if ($producto->alto == null)
                    @else
                    <tr>
                    
                      <td class="title-item-producto">Medidas</td>
                      <td>
                      {{$producto->alto}} @if ($producto->dimencion_unidad =1) Cm @else In @endif  Alto  x {{$producto->ancho}}  @if ($producto->dimencion_unidad =1) Cm @else In @endif Acho   x {{$producto->profundo}} @if ($producto->dimencion_unidad =1) Cm @else In @endif Profundo 
                      </td>
                   
                    </tr>
                    @endif



                      @if ($producto->altoc == null)
                    @else
                    <tr>
                    
                      <td class="title-item-producto">Medidas de caja</td>
                      <td>
                      {{$producto->altoc}} @if ($producto->unidad_prod =1) Cm @else In @endif  Alto  x {{$producto->anchoc}}  @if ($producto->unidad_prod =1) Cm @else In @endif Acho   x {{$producto->profundoc}} @if ($producto->unidad_prod =1) Cm @else In @endif Profundo 
                      </td>
                   
                    </tr>
                    @endif


            @if ($producto->peso_caja == null)
                    @else
                    <tr>
                    
                      <td class="title-item-producto">Peso de Envio</td>
                      <td>
                       {{$producto->peso_caja}}  @if ($producto->peso_caja_unidad =1) Kilos @else Libras @endif
                      </td>
                   
                    </tr>
                    @endif




                  </tbody></table>


               </div>
  


    <div class="box-footer clearfix">



                  <div><span class="list-item-descripcion">Terminos de pago</span></div>
<input title="Letter  of Credit  / Credito Documentario" type="checkbox" name="LC" disabled="1" id="LC" "@if($producto->LC==1) checked @else @endif" ><label class="ancho-checkbox" for="check1" title="Letter  of Credit  / Credito Documentario">L/C</label>
  <input title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido" type="checkbox" name="DA" disabled="1" id="DA" "@if($producto->DA==1) checked @else @endif" ><label title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido"  class="ancho-checkbox" for="check1">D/A</label>
       <input title="Documents Against Payment / Pago por anticipado
" type="checkbox" name="DP" disabled="1" id="DP" "@if($producto->DP==1) checked @else @endif" ><label title="Documents Against Payment / Pago por anticipado
" class="ancho-checkbox" for="check1">D/P</label>
    <input title="Telegraphic Transfer / Transferencia Bancaria" type="checkbox" name="TT" disabled="1"  id="TT" "@if($producto->TT==1) checked @else @endif"><label class="ancho-checkbox" for="check1" title="Telegraphic Transfer / Transferencia Bancaria">T/T</label>


</div>
    <div class="box-footer clearfix">



                  <div><span class="list-item-descripcion">Destinos del producto</span></div>


<div class="box box-warning box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Origen</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: block;">
                 {{Paises::find($rutas->first()->pais_origen)->nombre}}
                </div><!-- /.box-body -->
              </div>


<div class="box box-warning collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Destinos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="box-destino-limite">
                 @foreach($rutas as $ruta)
<li class="floatleft">{{Paises::find($ruta->pais_destino)->nombre}}</li>
@endforeach
</div>
                </div><!-- /.box-body -->
              </div>




                  </div>







              <!-- /.box-body -->
   


      <!-- TABLE: LATEST ORDERS -->
           
            </div><!-- /.col -->




            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->


              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><p class="anuncios">
    <i class="fa fa-bullhorn"></i> ANUNCIOS
  </p></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                




  
  <div class="post-vertical">
    <div class="post-titulo">
      <img src="{{asset('images/pautas/logo1.png')}}">
      <h1>Sema Ltda</h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut non, in minus molestias dolorum .</p>
    <img src="{{asset('images/pautas/empresa1.png')}}">
    <div class="clearfix"></div>
  </div>

  <div class="post-vertical">
    <div class="post-titulo">
      <img src="{{asset('images/pautas/logo2.png')}}">
      <h1>Construsite</h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut non, in minus molestias dolorum .</p>
    <img src="{{asset('images/pautas/empresa2.png')}}">
    <div class="clearfix"></div>
  </div>

  <div class="post-vertical">
    <div class="post-titulo">
      <img src="{{asset('images/pautas/logo3.png')}}">
      <h1>Construsite Ltda</h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut non, in minus molestias dolorum .</p>
    <img src="{{asset('images/pautas/empresa3.png')}}">
    <div class="clearfix"></div>
  </div>





                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                 
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->

















       











</div>


 <div class="box-footer clearfix">



                  <div><span class="list-item-descripcion">Productos</span></div>


</div>

  <div class="row clearfix fondomiddle">
          <div class="">
            <div id="Carousel" class="carousel slide">


              <!-- Carousel items -->
              <div class="carousel-inner">
                @if($productos->count())
                <?php $i=1 ?>
                <?php $j=0 ?>

 <?php $c=0 ?>



   

 @foreach($productos as $galeria)







                @if($i==1)
                <div class="item active">
                  <div class="row2">
                    @elseif($j>=6 AND $i<>0)
                    <div class="item">
                      <div class="row">
                        <?php $j=0 ?>
                        @endif

                        <div class="col-lg-2 col-xs-2 col-md-2">
                          <div class="thumb"> <a href="/{{$empresa->slug}}/producto/{{$galeria->id}}" class="img-responsive">
                            @if(!$galeria->imagen == null)
  




                                                   <img alt="Image" width="150" height="150" title="@if ($galeria->imagen->count()>0){{$img= $galeria->imagen->first()->imagen}} @else {{$img= 'producto.png'}} @endif" src="/uploads/productos/{{$img}}" alt="Image">



                            @endif
                          
                          </a></div>
                          <p>
                            <div class="text-blog thumb"> <a href="/{{$empresa->slug}}/producto/{{$galeria->id}}">{{$galeria->nombre}}</a> </div> 
                     
                            <div class="a-color-price">{{$galeria->precio}} {{$monedas->codigo}}</div>
                             <div><span class="rating ">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span></div>
                          
                          </p>

                        </div>

                        @if(fmod($i,6)==0)
                      </div></div><!-- cierra solo multiplos de 6 {{$i}} -->
                      @endif
                      <?php $i++ ?>
                      <?php $j++ ?>

                
           
         @endforeach

                      @if(fmod($i - 1,6)>0)
                    </div></div> <!-- Cierra al final {{$i}} solo si es decimal -->
                    @endif

                    @else
                    no hay nada
                    @endif

                  </div><!--.carousel-inner-->


                  <a class="left carousel-control" href="#Carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#Carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>


                </div><!--.Carousel-->

              </div>

            </div>











@stop


@stop


@section('estilos')
@parent
  {{HTML::style('css/jquery.fancybox.css')}}
{{HTML::style('css/pautas.css')}}
@stop





		    	

