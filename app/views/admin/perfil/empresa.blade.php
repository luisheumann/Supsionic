
@extends('layouts/backend')

@section('content-header')

<style type="text/css">


.contenedor-perfil{

	margin: 160px 18px;	

}

.form-registro{

	background: #FFF;

}

.barra-lateral{

	padding-right: 15px;

	margin-right: 40px;

	box-sizing: border-box;

}





.formularios-registro h1{

	color: #024959;

	/*margin: 20px 0px;*/

	font-weight: 550;

	font-size: 23px;

}

.nav-tabs-form>li {

	float: left;
}



.nav-tabs-form {

}



.nav-tabs-form>li>a {

	line-height: 1.42857143;

	color: #024959;

	padding: 12px 15px;

}



.nav-tabs-form>li.active>a, .nav-tabs-form>li.active>a:hover, .nav-tabs-form>li.active>a:focus {

	font-family:'Conv_Geogtq-Rg',Sans-Serif;

	color: #FFF;

	cursor: default;

	background-color: #024959;

	font-size: 13px;


}



.tab-form{

	/*background: #037E8C;*/

	width: 100%;

	height: 42px;

}



.nav-tabs.nav-justified>.active>a, .nav-tabs.nav-justified>.active>a:hover, .nav-tabs.nav-justified>.active>a:focus{

}



.formularios-registro form{

	width: 100%;

	text-align: left;

/*	padding-left: 12px;*/

}



.radio-inline, .checkbox-inline {
/*
	padding-left: 90px;

	padding-bottom: 10px;

	width: 100px;
*/
}



input[type=radio], input[type=checkbox] {

	margin: 12px 0 0;

	margin-top: 1px \9;

	line-height: normal;

}

.nav-tabs.nav-justified > li
{
	padding: 3px;
}


.nav-tabs.nav-justified>li>a {

	font-family:'Conv_Geogtq-Rg',Sans-Serif;

	font-size: 13px;

/*	border-color: #ccc #ccc transparent;*/

}

.form-horizontal .control-label{

	line-height: 17px !important;

	font-size: 13px;

}



#detalles-comercio label {

	font-size: 14px;

	font-weight: normal;

	line-height: 1.3;

}



.termino_envio label, .divisa_pago label{

	line-height: 2.6 !important;	

}



.form-control, .select2-search input[type="text"], input[type="email"] {

  height: 35px;

  padding: 8px 12px;

  font-family: "Lato", Helvetica, Arial, sans-serif;

  font-size: 12px;

  line-height: 1.467;

  color: #34495e;

  /*border: 2px solid #bdc3c7;

  border-radius: 6px;

  box-shadow: none;

  -webkit-transition: border .25s linear, color .25s linear, background-color .25s linear;

  transition: border .25s linear, color .25s linear, background-color .25s linear;
*/
}





#form_exportador, #form_importador, #form_transportador, #form_sias {

	padding: 0px 20px;

}



#form_exportador label, #form_importador label, #form_transportador label, #form_sias label {

  line-height: 2.6;

}





.s_paises{

	width: 250px;

	text-align: left;

	font-size: 14px;

}



.dropdown-menu{

 -webkit-transition: all 1s ease-in-out;

  -moz-transition: all 1s ease-in-out;

  -o-transition: all 1s ease-in-out;

  transition: all 1s ease-in-out;

}



.dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus{

	/*background: #F2F2F2 !important;

	color: #585858;*/



	background: #024959!important;

	color: #FAF2F2;	

	font-weight: bold !important;

	border-bottom: 1px solid #ccc;

}





/* Add  images for form products*/



  #maindiv{

    width:960px; 

    margin:10px auto; 

    padding:10px;

}

#formdiv{

    width:500px; 

    float:left; 

    text-align: center;

}





#file{

    color:green;

    padding:5px; border:1px dashed #123456;

    background-color: #f9ffe5;

}

#upload{

    margin-left: 45px;

}



#noerror{

    color:green;

    text-align: left;

}

#error{

    color:red;

    text-align: left;

}

#img{ 

  position: absolute;

  margin-top: -11px;

  cursor: pointer;

  color: rgb(197, 36, 36);

}



.abcd{

    text-align: center;

}



.abcd img{

    height:100px;

    width:100px;

    padding: 5px;

    border: 1px solid rgb(232, 222, 189);

}

b{

    color:red;

}

#formget{

    float:right; 



}

#add_more{

	margin: 20px 0px;

}





.col-md-6{

  padding-right: 20px;

	  padding-left: 20px;

}



#addProducto {

 overflow-y:scroll 

}



.modal-dialog-addimg{

	  margin: 150px auto !important;

}



.estado_empresa{

	background: #2A4A58;

	padding: 5px 13px;

}





.estado_empresa h4{

	color: #FFF;

}

#cambio_perfil{

  background: #477D8A;

  color: #FFF;

  border: none;

  border-radius: 0px;

  text-transform: uppercase;

}

.legenda
{
	border-color: -moz-use-text-color -moz-use-text-color #024959;
	border-width: 0 0 2px;
}

.ancho-checkbox
{
	width: 90px;
	padding-left: 2px;
}

.ancho-largo-checkbox
{
	width: 300px;
	padding-left: 2px;
}
</style>
 <h1>
            Dashboard
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li class="active">Productos</li>
          </ol>
@stop



@section('content')

<div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">

                <span class="info-box-icon bg-aqua"><i class="fa  fa-bar-chart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Productos2</span>
                  <span class="info-box-number"> <small>Cantidad: </small>{{$productos->count()}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-tachometer"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Ejemplo</span>
                  <span class="info-box-number">xxx</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Ejemplo</span>
                  <span class="info-box-number">xxx</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-cog"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Ejemplo</span>
                  <span class="info-box-number">xx</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>


<div class="row">

<div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Perfil</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                     <!-- <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>-->
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                 <div class="formularios-registro">


<div class="tab-form">
	<ul class="nav nav-tabs nav-tabs-form nav-justified" role="tablist" id="myTab">
	  <li class="active">
	  	<a href="#datos-basicos" aria-controls="datos-basicos" role="tab" data-toggle="tab">
	  	DATOS BÁSICOS</a>
	  </li>
	  <li>
	  	<a href="#datos-empresa" aria-controls="datos-empresa" role="tab" data-toggle="tab">
	  	DATOS EMPRESA</a>
	  </li>
	  <li><a href="#detalles-comercio" aria-controls="detalles-comercio" role="tab" data-toggle="tab">
	  	DETALLES DE COMERCIO</a></li>
	</ul>
</div>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="datos-basicos">
	    <!-- Incluimos el formulario de datos basicos -->
		@include('perfil/completar/datos_basicos')
	</div>

	<div role="tabpanel" class="tab-pane" id="datos-empresa">
	    <!-- Cargamos la vista de acuerdo al perfil de la empresa -->
		 <?php
			 switch ($perfil->id) {
			 	case 1:
				 	?> 
					 	@include('perfil/completar/datos_empresa')
				 	<?php
			 		break;
			 	case 2:
				 	?> 
				 	@include('perfil/completar/datos_empresa')
					 <!--	'perfil/completar/importador/index'-->
				 	<?php
			 		break;
			 	case 3:
				 	?> 
				 	@include('perfil/completar/datos_empresa')

				 		<!--'perfil/completar/transportador/index'-->
				 	<?php
			 		break;		 		
			 	default:
			 	case 4:
				 	?>
				 		@include('perfil/completar/datos_empresa')

					 	 <!--'perfil/completar/sias/index'-->
				 	<?php
			 		break;		 		
			 	default:		 	
			 		# code...
			 		break;
			 }
		 ?>

	</div> <!-- /tab intro empresa -->

	<div role="tabpanel" class="tab-pane" id="detalles-comercio">
	<!-- Cargamos la vista de detalles de comercio deacuerdo al perfil de la empresa -->
		 <?php
			 switch ($perfil->id) {
			 	case 1:
				 	?>
					 	@include('perfil/completar/exportador/detalles-comercio/index')
				 	<?php
			 		break;
			 	case 2:
				 	?> 	
				 		@include('perfil/completar/importador/detalles-comercio/index')

					 	<!--'perfil/completar/importador/detalles-comercio/index'-->
				 	<?php
			 		break;
			 	case 3:
				 	?> 
				 	@include('perfil/completar/transportador/detalles-comercio/index')
				 		<!--perfil/completar/transportador/detalles-comercio/index-->
				 	<?php
			 		break;		 		
			 	default:
			 	case 4:
				 	?>
				 	@include('perfil/completar/sias/detalles-comercio/index')
					 	<!--perfil/completar/sias/detalles-comercio/index'-->
				 	<?php
			 		break;		 		
			 	default:		 	
			 		# code...
			 		break;
			 }
		 ?>
	</div>
</div>
	
</div> <!-- formularios-registro!-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            </div>



@stop





<!-- Finaliza el render de la pagina -->

@stop

@section('scripts')
@parent
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
  {{HTML::script('js/registro.js')}}
  {{HTML::script('js/bootstrap-multiselect.js')}}
  {{HTML::script('js/jasny-bootstrap.min.js')}}
@stop

@section('estilos')
@parent
  {{HTML::style('css/jasny-bootstrap.min.css')}}
  {{HTML::style('css/bootstrap-multiselect.css')}}
@stop

