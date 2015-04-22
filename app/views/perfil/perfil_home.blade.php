<!-- HOME PERFIL -->
<?php
  if(!empty($empresa->imagen))
  {
    $path_perfil = public_path().'/uploads/'.$empresa->imagen.' ';
    $foto = JitImage::source($path_perfil)->cropAndResize(150, 125, 5);;  
  }else{
    $foto_perfil='/images/perfil/avatar_empresa.jpg';
    $foto = JitImage::source($foto_perfil)->resize(190, 125);;  
  }
?>

<div class="header-empresa">
<div class="row">
  <img src="{{asset($foto)}}" class="img-responsive  foto-empresa">
  <div class="col-xs-8 caja-empresa">
      <div class="col-xs-8">
        <ul class="datos-empresa">
          <li class="nombre-empresa">{{$empresa->nombre}}</li>
          <li class="txt-pais">
            @if($empresa->pais)
              {{$empresa->pais->nombre}}
            @endif
          </li>
          <li>
            <img src="{{asset('images/perfil/estrella.png')}}">
          </li>
        </ul>
      </div>
      <div class="col-xs-4">
      
      
      <img src="{{asset('images/iconos_a/'.$perfil->imagen)}}" class="img_rol"><br>
        <span class="titulo_rol">{{$perfil->rol}}</span> 
      </div>
  </div>
</div>  

</div>

<div role="tabpanel">
  <!-- Nav tabs -->
  <div class="tab-perfil">
    <ul class="nav nav-tabs-perfil navbar-right" role="tablist">
      <li class="" >
        <a href="#home" role="tab" data-toggle="tab">DATOS DE CONTACTO</a>
      </li>    
    </ul>    
  </div>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <div class="row dat-contacto">
        <div class="col-md-5">
          <ul class="lista-perfil">
            <li><p>Tipo de Negocio:</p> <span>Fabricante</span> </li>
            </span> </li>
            <li><p>Producto/servicio:</p> <span>Cementos</span> </li>
            <li><p>Año de fundación:</p> <span>1936</span> </li>
          </ul>
        </div>
        <div class="col-md-4" align="right" style="margin-top:30px">
          <a href="#" class="btn-borde btn-borde-n-i">PORTAFOLIO DE PRODUCTOS</a><br>
        </div>
        <div class="col-md-3" align="right">
          <a href="#"><img src="{{asset('images/perfil/conectar.png')}}"></a>
        </div>

      </div> 
        <div class="perfil-descripcion">
          <h1>DESCRIPCIÓN </h1>
          <hr>
          <p>
          {{$empresa->descripcion}}

            </p>
            <p>En el negocio del concreto, Argos es líder en Colombia y tercer productor más grande en Estados Unidos. Cuenta con 388 plantas ubicadas en Colombia, Estados Unidos, Haití, Panamá, República Dominicana y Surinam. La capacidad instalada total es de 18 millones de metros cúbicos de concreto al año.<p>
            </p>
            <p>El modelo de negocio está centrado en el cliente y en el desarrollo sostenible, es decir, económicamente viable, respetuoso de las personas, responsable y amigable con el medio ambiente.
          </p>
          </div>
          <div class="contacto-perfil">
          <form action="" method="POST" class="form-contacto">
          <h1>CONTÁCTENOS</h1>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Teléfono" name="telefono" required>
                </div>                
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                </div>                
              </div>
              <div class="col-md-4">
                <textarea name="mensaje" required   cols="50" rows="6" placeholder="Mensaje"></textarea>
              </div>
            </div>  
              <button class="btn-borde btn-borde-a">ENVIAR</button> 
            </form>
          </div>
    </div><!-- /home -->
  </div>
</div>




<style>
  .lista-post-vertical, .lista-noticias-vertical {
    height: 827px !important;    
  }
.col-xs-3, .col-xs-6{
  margin: 0px;
  padding: 0px;
  border: none;
}  
.btn-borde-n-i{
  font-size: 12px;
}
</style>  
