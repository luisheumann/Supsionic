@extends('layouts/default')

@section('content')



@section('title')

@parent

¡ Bienvenido a SupplyME !

@stop



<div class="container barra backgroundazult">



<section style="float:left" id="logo">

		<img src="{{asset('images/logo.png')}}">

</section>



<section style="float:right">

	<a href="#" data-toggle="modal" class="btn-borde btn-borde-n-fb" data-target="#myModal">

		REGISTRAR

	</a>

</section>





<!-- Seleccionar Perfil  -->



<!-- Formulario de Registro  -->

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header-crear-cuenta">

        <button type="button" class="close-cc" data-dismiss="modal" aria-label="Close">

        <span aria-hidden="true"><i class="fa fa-times"></i>

        </span></button>

        <h4 class="modal-title" id="myModalLabel">CREAR CUENTA</h4>

      </div>

      <div class="modal-body-crear-cuenta">

        

	<form  class="crear_registro" id="form_registro">

		<div class="simform-inner">

		<div class="select_perfil">

			<select class="cs-select cs-skin-border" name="rol">

				<option value="" disabled selected>ROL...</option>

				<option value="1">Exportador</option>

				<option value="2">Importador</option>

				<option value="3">Transportador</option>

				<option value="4">SIA</option>

			</select>

		</div>

	  <div class="form-group">

	    <label for="empresa">¿Cuál es el nombre de la empresa?</label>

	    <input type="text" class="borde-formulario-registro form-control input-lg" name="nombre" id="empresa" placeholder="Empresa" required>

	  </div>		



	  <div class="form-group">

		<label for="nombre">¿Cuál es su nombre y apellido?</label>

		<input id="nombre" class="borde-formulario-registro form-control input-lg" name="usuario" type="text" placeholder="Nombre" required/>

	  </div>



	  <div class="form-group">

		<label for="email">¿Cuál es su E-mail?</label>

		<input id="email" class="borde-formulario-registro form-control input-lg" name="email" type="email" placeholder="E-mail" required/>

	  </div>	



	  <div class="form-group">

		<label for="password">Escriba una contraseña</label>

		<input id="password" class="borde-formulario-registro form-control input-lg"  name="password" type="password" placeholder="Contraseña" required/>

	  </div>



	  <div class="form-group">

		<label for="password_confirme">Repita la contraseña</label>

		<input id="password_confirme" class="borde-formulario-registro form-control input-lg"  name="password_confirmation" type="password" placeholder="Repita la contraseña" required/>

	  </div>

	 <!-- errores de logueo -->

	  <div id="alerta_registro" style="display:none">

	    <h3>Se presentaron los siguientes errores:</h3>

	    <ul class="error_envio"></ul>

	  </div>			

	  <div align="center">	

	  <p>

	  	<img src="{{asset('images/load.gif')}}" id="load_registro" style="display:none">

	  </p>

	 	<button class="btn-borde btn-borde-a" type="submit" id="btn_registro">ENVIAR</button>

	  </div>

	</div>

	</form><!-- /simform -->			

      </div>

    </div>

  </div>

</div>





</div><!-- /container -->



<div class="entrada">

    <h1>OPTIMICE SUS NEGOCIOS<br>

	GENERANDO SU PROPIA<br>

	CADENA DE ABASTECIMIENTO</h1>

</div>



<div class="backgroundazult" id="loginformulario">

    <form method="POST" id="formLogin" class="form_login">

	    <h3 id="pretituloform">ESTÁS A UN PASO DE INGRESAR AL FUTURO EMPRESARIAL</h3>

	    <div class="form-group">

			<input type="email" class="form-control"  placeholder="E-mail" required name="email" >

		</div>

		<div class="form-group">	

			<input type="password" class="form-control"  placeholder="password" required name="password">

		</div>	

			<!-- errores de logueo -->

             <div class="error" id="alerta_login" style="display:none">

                  <ul></ul>

             </div>			

			<input  type="submit" value="Entrar" class="btn-borde btn-borde-afb" />

			<a href="{{URL::to('login/recuperar_password')}}"><p>¿Olvido su contraseña?</p></a>

    </form>

</div>

<div id="footerbottom" class="backgroundazult">

	<p>TÉRMINOS Y CONDICIONES. SUPPLYME. &copy 2015</p>

</div>



<script src="js/selectFx.js"></script> <!-- Select -->

<script src="js/fondoRandon.js"></script> <!-- formulario paso a paso -->



<script>

// Da forma al SELECT

(function() {

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	

		new SelectFx(el);

	} );

})();



// logica del login por ajax



$(document).ready(function(){



$('#formLogin').submit(function(event) {



	event.preventDefault();

	var alerta  = $('#alerta_login');

    var formData = $(this).serializeArray();



      $.ajax({

          url:'login',

          method:'post',

          datatype: 'json',

          data: formData,



          success:function(data){



            alerta.hide().find('ul').empty();

            if(!data.success){



               $.each(data.errors, function(index, error){

                  alerta.find('ul').append('<li>'+error+'</li>');

                });



               alerta.slideDown('slow');

            }

            else{

                location.reload();

            }

          } // fin success



        }); // fin ajax



	}); // fin submit login





$('#form_registro').submit(function(event) {



	event.preventDefault();

	var $btn     = $('#btn_registro');

	var $load    = $('#load_registro');

	var $alerta  = $('#alerta_registro');

	$load.show();

	//$btn.hide();

	

    var formData = $(this).serializeArray();



      $.ajax({

          url:'registro',

          method:'post',

          datatype: 'json',

          data: formData,



          success:function(data){



            $alerta.hide().find('ul').empty();

            if(!data.success){



               $.each(data.errors, function(index, error){

                  $alerta.find('ul').append('<li>'+error+'</li>');

                });



               $alerta.slideDown('slow');

               $load.hide();

			   $btn.show();

            }

            else{

            	//alert('Ok todo');

                location.reload();

            }

          } // fin success



        }); // fin ajax



	}); // fin submit login



}); // fin ready

</script>



@section('estilos')

@parent

{{ HTML::style('css/home.css')}}

{{ HTML::style('css/cs-select.css')}}

{{ HTML::style('css/cs-skin-border.css')}}

@stop



@section('scripts')

@parent

  {{HTML::script('js/classie.js')}}

@stop



<!-- Finaliza el render de la pagina -->

@stop



