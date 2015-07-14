

@extends('layouts/frontend')



@section('content-header')


@section('title')
@parent
 {{ ucfirst($empresa->nombre) }}
@stop

<section class="content">

  <div class="row">

        <div class="col-md-3" >
          @include('noticias/index')
        </div>

  


      <div class="col-md-6" > 
        @include('perfil/perfil_home')
      </div> 
 

    
       
        <div class="col-md-3">
          @include('pautas/index')
        </div> 
   


    </div>





</section>

@section('estilos')
@parent
{{ HTML::style('css/main_home.css')}}
@stop

@stop