

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
            <li class="active">Interes</li>
          </ol>
@stop



@section('content')


<a href="/{{$empresa->slug}}/interes_transportador/add">
<button class="btn btn-success pull-right" >

 	<i class="fa fa-cube"></i> Agregar Interés

 </button>
</a>
 <br><br>



<!-- Mensaje de exito -->

<div class="alert alert-success alert-dismissible fade in" role="alert" id="ok_import" style="display:none">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

  <strong><i class="fa fa-check"></i></strong> El producto se guardado correctamente

</div>



 <h4>Intereses Agregados ({{count($intersesTransportador)}})</h4>

<!-- tabla con los Intereses registrados -->	

<table class="table table-bordered table-striped table-hover" id="tabla_productos">

	<thead>

		<th>Cantidad Min</th>

		<th>Cantidad Max</th>

		<th>Interes</th>

		<th>Ver Detalles</th>

	</thead>

	<tbody>

	@foreach($intersesTransportador as $interes)

		<tr>

			 <td>@if ($interes->min == 0)
      Sin Limite
      @else
      {{$interes->min}} {{Unidades::find($interes->min_medida)->nombre}}
      @endif
      </td>

      <td>@if ($interes->max == 0)
       Sin Limite
      @else
 {{$interes->max}} {{Unidades::find($interes->min_medida)->nombre}}
      @endif
      </td>     

			<td>{{$interes->productos}}</td>

			<td>

	



<a href="/{{$empresa->slug}}/interes_transportador/delete/{{$interes->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a> 
<a href="/{{$empresa->slug}}/interes_transportador/edit/{{$interes->id}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> <a data-toggle="modal" class="link" data-target="#myModalE" href="/{{$empresa->slug}}/interes_transportador/interes/{{$interes->id}}" class="btn btn-default btn-xs"><span class="glyphicon  glyphicon-eye-open"></span></a>



		



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



<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

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







