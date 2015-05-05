@extends('layouts/default')
@section('content')

@section('title')
@parent
 ¡ Bienvenido a SupplyME !
@stop
@include('includes.header')

<div class="row home-red center-block" style="float:none">
  <div class="col-xs-3">
      @include('busqueda/formulario')
  </div>

<div class="col-xs-9">

  <div class="col-xs-4" id="cambio_vista" data-cambio="<?php echo $perfil ?>">
      <div id="vista_vendedor">
          <?php  $varperfil = $_GET['perfil']; if ($varperfil == 1) { ?>
 @include('busqueda/vendedor')
             <?php  } ?>
          
      </div>
      <div id="vista_comprador" style="display:none">
        <?php  $varperfil = $_GET['perfil']; if ($varperfil == 2) { ?>
             @include('busqueda/comprador')
                 <?php  } ?>
      </div>    

       <div id="vista_transporte">
       <?php  $varperfil = $_GET['perfil']; if ($varperfil == 3) { ?>

             @include('busqueda/listatransportador')
                <?php  } ?>
      </div> 
       <div id="vista_sias">
        <?php  $varperfil = $_GET['perfil']; if ($varperfil == 4) { ?>
             @include('busqueda/listatransportador')
         <?php  } ?>
      </div> 

  </div>  

  <div class="col-xs-4">
      @include('busqueda/transportadores')
  </div>  

  <div class="col-xs-4">
      @include('busqueda/sias')
  </div> 
  
</div>
 

</div>


<!-- Modal Cadena   -->
<div class="modal fade" id="ModalCadena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 1000px">
    <div class="modal-content mdc">

      <div class="modal-body cadena_seleccionada">
        <h1>ESTA ES LA CADENA DE ABASTECIMIENTO QUE HA ELEGIDO PARA SU NEGOCIO.xx</h1>
        
        <div class="row contenedor_su_cadena">

          <div class="col-xs-3 item_cadena" >
            <h2>
            <img src="{{asset('images/iconos_a/icon_importar.png')}}" width="25px" style="margin-top: -13px;" >
            EMPRESA</h2>
            <div id="su_empresa"></div>
          </div>

          <div class="col-xs-3 item_cadena">
            <h2><img src="{{asset('images/iconos_a/icon_transportar.png')}}" width="25px"> TRANSPORTADOR</h2>
            <div id="su_transporte"></div>
          </div>

          <div class="col-xs-3 item_cadena">
            <h2><img src="{{asset('images/iconos_a/icon_sias.png')}}" width="25px"> SIA</h2>
            <div id="su_sia"></div>
          </div>

          <div class="col-xs-3 item_cadena">
            <h2><img src="{{asset('images/iconos_a/icon_producto.png')}}" width="25px"> PRODUCTO</h2>
            <div id="su_producto"></div>
          </div>          

        </div>

        <div class="row">
          <div class="col-md-3 col-md-offset-3">
            <a href="#" data-dismiss="modal" id="btn_modificar_cadena" >
              <img src="{{asset('images/cadena/btn_modificar.png')}}" alt="">    
            </a>            
          </div>
          <div class="col-md-3">
            <a href="#" id="btn_continuar_cadena">
              <img src="{{asset('images/cadena/btn_continuar.png')}}" alt="">    
            </a>            
          </div>          
        </div>

      </div>
    </div>
  </div>
</div>



<!-- Modal Desea Completar perfil -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog-registro">
    <div class="modal-content-registro">
      <div class="modal-body" align="center">
        <h1>¡BIENVENIDO!</h1>
        <img src="{{asset('images/flecha.png')}}" >
        <h2>DESEA CONTINUAR COMPLETANDO SU PERFIL</h2>
        <a href="{{URL::to($slug.'/registro')}}" class="btn-borde btn-borde-n">CONTINUAR</a><br>
        <a href="#" class="btn-borde btn-borde-a" data-dismiss="modal">OMITIR</a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

 var valueSelected = <?php echo $perfil ?>;
if(valueSelected==1)
    {
      $('#cambio_vista').attr('data-cambio', 1); // data-chek como true
      $('#vista_comprador').hide();
      $('#vista_vendedor').show();
      $('#vista_transporte').hide();
          $('#vista_sias').hide();
            $(".espacio_sias").empty();
           $(".espacio_trasporte").empty(); 
           $(".espacio_comprador").empty(); 

        $(".espacio_transporte").empty();
        $('.espacio_transporte').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_transportador.png">')); 
        
        
      $(".espacio_sias").empty();
        $('.espacio_sias').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_sias.png">'));  

    }
    if(valueSelected==2)
    {
      $('#cambio_vista').attr('data-cambio', 2); // data-chek como true
      $('#vista_comprador').show();
      $('#vista_vendedor').hide();
      $('#vista_transporte').hide();
      $('#vista_sias').hide();
        $(".espacio_sias").empty();
           $(".espacio_trasporte").empty(); 
           $(".espacio_comprador").empty(); 
     



        $(".espacio_transporte").empty();
        $('.espacio_transporte').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_transportador.png">')); 
        
      $(".espacio_sias").empty();
        $('.espacio_sias').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_sias.png">'));  

    }   

        if(valueSelected==3)
    {
      $('#cambio_vista').attr('data-cambio', 3); // data-chek como true
      $('#vista_transporte').show();
      $('#vista_vendedor').hide();
      $('#vista_comprador').hide();
      $('#vista_sias').hide();
        $(".espacio_sias").empty();
           $(".espacio_trasporte").empty(); 
           $(".espacio_comprador").empty(); 


        $(".espacio_transporte").empty();
        $('.espacio_transporte').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_transportador.png">')); 
        
      $(".espacio_sias").empty();
        $('.espacio_sias').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_sias.png">'));  

    } 

         if(valueSelected==4)
    {
      $('#cambio_vista').attr('data-cambio', 4); // data-chek como true
      $('#vista_transporte').show();
      $('#vista_vendedor').hide();
       $('#vista_comprador').hide();

        $(".espacio_sias").empty();
           $(".espacio_trasporte").empty(); 
           $(".espacio_comprador").empty(); 



        $(".espacio_transporte").empty();
        $('.espacio_transporte').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_transportador.png">')); 
        
      $(".espacio_sias").empty();
        $('.espacio_sias').append(('<img src="http://dev.supplysmark.com/images/cadena/recomendado_sias.png">'));  

    }   








     $(".mostar_mi_cadena").on('click', ArmaCadena);

     $('#btn_continuar_cadena').click(function(event) {
    alert('Se ha enviado el mensaje a cada uno de los involucrados en la cadena!');
    $('#ModalCadena').modal('hide');
    window.location.href = 'http://supplysmark.com/demo/public/busqueda';
     });

  });

function ArmaCadena() {

   // var vista = $( "#cambio_vista" ).attr('data-cambio');

    var vista = <?php echo $perfil ?>;
 
     if(vista=='1'){
      
      CadenaVendedor();
     }
     else if(vista=='2'){

      CadenaComprador();
     }


   
}
    
  
function CadenaComprador(){

  $('#ModalCadena').modal('show');

  // chekea si ya se agrego una empresa de Transporte o SIAS
  var data_c = $( ".espacio_comprador" ).attr('data-ckeck');
  var data_t = $( ".espacio_transporte" ).attr('data-ckeck');
  var data_s = $( ".espacio_sias" ).attr('data-ckeck');

  // chekea si se ha seleccionado una empresa

  if ( data_c == 'true' ) {

    // Producto de Demo
    $("#su_producto").empty();
    var get_img = 'http://supplysmark.com/demo/public/images/cadena/icono-producto.png';
    var get_nombre = 'Demo';
    $('#su_producto').append(('<img src=" '+get_img+' " width="87" height="83" > <span class="tec">'+get_nombre+'</span>  ')); 

    // muestra la empresa seleccionada
    $("#su_empresa").empty();
    var get_img = $( ".espacio_comprador img" ).attr('src');
    var get_nombre = $( ".espacio_comprador .contenido_producto .tpc" ).text();
    $('#su_empresa').append(('<img src=" '+get_img+' "  width="87" height="83"> <span class="tec">'+get_nombre+'</span> <img src="../images/fc.png" width="25px"> ')); 
  }

  else{
    $("#su_producto, #su_empresa").empty();
    $("#su_producto").append('<h2>No se ha seleccionado !</h2>');
    $("#su_empresa").append('<h2>No se ha seleccionado !</h2>');
  }


  // chekea si se ha seleccionado una transportadora
  if ( data_t == 'true' ) {
    $("#su_transporte").empty();
    var get_img = $( ".espacio_transporte img" ).attr('src');
    var get_nombre = $( ".espacio_transporte .contenido_producto .tpc" ).text();
    $('#su_transporte').append(('<img src=" '+get_img+' "  width="87" height="83"> <span class="tec">'+get_nombre+'</span>  <img src="../images/fc.png" width="25px">')); 
  }
  else{
    $("#su_transporte").empty();
    $("#su_transporte").append('<h2>No se ha seleccionado !</h2>');
  }  

  // chekea si se ha seleccionado una SIA
  if ( data_s == 'true' ) {
    $("#su_sia").empty();
    var get_img = $( ".espacio_sias img" ).attr('src');
    var get_nombre = $( ".espacio_sias .contenido_producto .tpc" ).text();
    $('#su_sia').append(('<img src=" '+get_img+' "  width="87" height="83"> <span class="tec">'+get_nombre+'</span>  <img src="../images/fc.png" width="25px"> ' )); 
  } 
  else{
    $("#su_sia").empty();
    $("#su_sia").append('<h2>No se ha seleccionado !</h2>');
  }  


}

function CadenaVendedor(){
 

    $('#ModalCadena').modal('show');
    // chekea si ya se agrego una empresa de Transporte o SIAS
    var data_e = $( ".espacio_empresa" ).attr('data-ckeck');
    var data_t = $( ".espacio_transporte" ).attr('data-ckeck');
    var data_s = $( ".espacio_sias" ).attr('data-ckeck');
    //var imagenproducto = document.getElementById("imagenproducto").src

 
    // chekea si se ha seleccionado una empresa
    if ( data_e == 'true' ) {
      $("#su_producto").empty();

      var get_img = $( ".espacio_empresa img" ).attr('src');// img Prodcuto
       var get_nombre = $( ".espacio_empresa .contenido_producto .tpc" ).text();
      $('#su_producto').append(('<img src=" '+get_img+' "  width="87" height="83"> <span class="tec">'+get_nombre+'</span> ')); 

      // Empresa de Seleccionada
      $("#su_empresa").empty();
       
   var get_img =  $( ".espacio_empresa .contenido_producto2 .tpc2" ).text(); ///imagen del Empresa

      $('#su_empresa').append(('<img src=" '+get_img+' "  width="87" height="83"> <span class="tec">'+get_nombre+'</span> <img src="../images/fc.png" width="25px"> ')); 
    }
    else{
      $("#su_producto, #su_empresa").empty();
      $("#su_producto").append('<h2>No se ha seleccionado !</h2>');
      $("#su_empresa").append('<h2>No se ha seleccionado !</h2>');
    }


    // chekea si se ha seleccionado una transportadora
    if ( data_t == 'true' ) {
      $("#su_transporte").empty();
      var get_img = $( ".espacio_transporte img" ).attr('src');
      var get_nombre = $( ".espacio_transporte .contenido_producto .tpc" ).text();
      $('#su_transporte').append(('<img src=" '+get_img+' "  width="87" height="83"> <span class="tec">'+get_nombre+'</span>  <img src="../images/fc.png" width="25px">')); 
    }
    else{
      $("#su_transporte").empty();
      $("#su_transporte").append('<h2>No se ha seleccionado !</h2>');
    }    
 
    // chekea si se ha seleccionado una SIA
    if ( data_s == 'true' ) {
      $("#su_sia").empty();
      var get_img = $( ".espacio_sias img" ).attr('src');
      var get_nombre = $( ".espacio_sias .contenido_producto .tpc" ).text();
      $('#su_sia').append(('<img src=" '+get_img+' "  width="87" height="83"> <span class="tec">'+get_nombre+'</span>  <img src="../images/fc.png" width="25px"> ' )); 
    } 
    else{
      $("#su_sia").empty();
      $("#su_sia").append('<h2>No se ha seleccionado !</h2>');
    }        


}
    

</script>
@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
{{ HTML::style('css/home_social.css')}}
{{ HTML::style('css/animacion.css')}}
@stop

<!-- Finaliza el render de la pagina -->
@stop