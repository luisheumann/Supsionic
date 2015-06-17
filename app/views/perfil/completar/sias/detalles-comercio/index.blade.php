<form class="form-horizontal" id="formulario-detalles-comercio-exportador" action="#" method="post" enctype="multipart/form-data">
  <div class="">
    <form class="form-horizontal"><hr>
      <div class="form-group row"><hr>
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Moneda de Pago</strong></label>
        <div class="col-md-6">
          <input type="checkbox"><label class="ancho-checkbox" for="check1">COP</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">USD</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">EUR</label>
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">CAD</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">AUD</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">HKD</label>
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">GBP</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">CNY</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">CHF</label>       
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Tipo de Pago</strong></label>
        <div class="col-md-6">
          <input type="checkbox"><label class="ancho-checkbox" for="check1">T/T</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">L/C</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">D/P D/A</label>     
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Lenguaje Hablado</strong></label>
        <div class="col-md-6">
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Inglés</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Español</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Chino</label>
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Japonés</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Portugués</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Alemán</label>
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Árabe</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Francés</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Ruso</label>   
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Koreano</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Hindi</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Italiano</label>        
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Servicios</strong></label>
        <div class="col-md-6">
          <input type="checkbox"><label class="ancho-largo-checkbox" for="check1">Reconocimiento e inspección de Mercancía</label>
          <br>
          <input type="checkbox"><label class="ancho-largo-checkbox" for="check1">Clasificación arancelaria</label>
          <br>
          <input type="checkbox"><label class="ancho-largo-checkbox" for="check1">Asesoría técnica</label>
          <br>
          <input type="checkbox"><label class="ancho-largo-checkbox" for="check1">Asesoría Jurídica aduanera</label>
          <br>
          <input type="checkbox"><label class="ancho-largo-checkbox" for="check1">Bodegas propias zona franca</label>
          <br>
          <input type="checkbox"><label class="ancho-largo-checkbox" for="check1">Diligenciamiento y tramite certificado de origen</label>    
        </div>
      </div><hr>

      <!-- Loader -->
      <div align="center">
        <img src="{{asset('images/load.gif')}}" id="load_basico" style="display:none">  
      </div>

        <!-- Mensaje de errores -->
        <div class="alert alert-danger danger" id="alerta_basico" style="display:none">
          <ul></ul>
        </div> 

      <!-- Mensaje de exito -->
        <div class="alert alert-success alert-dismissible fade in" role="alert" id="alerta_ok" style="display:none">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <strong><i class="fa fa-check"></i></strong> Los datos se guardaron correctamente
        </div>

      <div align="right">
        <input type="submit" id="btn_basico" class="btn-borde btn-borde-n-i" value="GUARDAR">
      </div>
    </form>
  </div>          
</form>


