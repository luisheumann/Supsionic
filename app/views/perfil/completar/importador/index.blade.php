


<?php


  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;

    
     // $producto = Productos::find();
      


  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>





@extends('layouts/backend')



@section('content-header')
<style type="text/css">
  select#unidad_medida {
  float: left;
  width: 230px;
   margin-right: 10px;

}

input#medida {
  width: 80px;
  padding-left: 10px;
  margin-left: 10px;
}
.btn-lg, .btn-group-lg>.btn {
  padding: 10px 16px;
  font-size: 13px;
  line-height: 1.33;
  border-radius: 6px;
  width: 100%;
}

select#peso_unidad {
  width: 115px;
}

input#peso {
  width: 100px;
  margin-right: 10px;
  float: left;
}


select#peso_caja_unidad {
  width: 115px;
}

input#peso_caja {
  width: 100px;
  margin-right: 10px;
  float: left;
}

input#alto {
  width: 50px;
  float: left;
  margin-right: 10px;
}

input#ancho {
  width: 50px;
  float: left;
  margin-right: 10px;
}


input#profundo {
  width: 50px;
  float: left;
  margin-right: 10px;
}


select#dimencion_unidad {
  width: 114px;
}

label.label2 {
  float: left;
  padding-top: 10px;
  padding-right: 1px;
}

input#cantidad_disp {
  width: 100px;
  float: left;
  margin-right: 10px;
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



<button class="btn btn-success pull-right" data-toggle="modal" data-target="#addInteres">

 	<i class="fa fa-cube"></i> Agregar Interés

 </button>

 <br><br>



<!-- Mensaje de exito -->

<div class="alert alert-success alert-dismissible fade in" role="alert" id="ok_import" style="display:none">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

  <strong><i class="fa fa-check"></i></strong> El producto se guardado correctamente

</div>



 <h4>Intereses Agregados ({{count($intersesImportador)}})</h4>

<!-- tabla con los Intereses registrados -->	

<table class="table table-bordered table-striped table-hover" id="tabla_productos">

	<thead>

		<th>No</th>

		<th>Categoría</th>

		<th>Productos</th>

		<th>Ver Detalles</th>

	</thead>

	<tbody>

	@foreach($intersesImportador as $interes)

		<tr>

			<td>1</td>

			<td>{{Categorias::find($interes->categoria_id)->nombre}}</td>			

			<td>{{$interes->productos}}</td>

			<td>

		



<a href="interes_importador/delete/{{$interes->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> 
<a href="interes_importador/edit/{{$interes->id}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> <a data-toggle="modal" class="link" data-target="#myModalE" href="importador/interes/{{$interes->id}}" class="btn btn-default btn-xs"><span class="glyphicon  glyphicon-eye-open"></span></a>




			</td>

		</tr>

	@endforeach

	</tbody>

</table>



 
<!-- Modal ver detalles del interes -->

<div class="modal fade" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        </div> 

    </div>

</div> 



<!-- Modal agregar productos de interes importador -->

<div class="modal fade" id="addInteres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Agregar Interés</h4>

      </div>

      <div class="modal-body">

        @include('perfil/completar/importador/intereses.add')

      </div>

    </div>

  </div>

</div>


  
@stop





<!-- Finaliza el render de la pagina -->

@stop



@section('scripts')
@parent



<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
  {{HTML::script('js/importador.js')}}
  {{HTML::script('js/bootstrap-multiselect.js')}}
  {{HTML::script('js/jasny-bootstrap.min.js')}}
@stop

@section('estilos')
@parent
  {{HTML::style('css/jasny-bootstrap.min.css')}}
  {{HTML::style('css/bootstrap-multiselect.css')}}
@stop







