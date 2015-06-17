<form class="form-horizontal" id="formulario-detalles-comercio-exportador" action="#" method="post" enctype="multipart/form-data">
  <div class="">
    <form class="form-horizontal">
      <div class="form-group row"><hr>
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Términos de Entrega Aceptados</strong></label>
        <div class="col-md-6">
          <input type="checkbox"><label class="ancho-checkbox" for="check1">FOB</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">CFR</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">CIF</label>
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">EXW</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">FAS</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">CIP</label>
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">FCA</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">CPT</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">DEQ</label>   
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">DDP</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">DDU</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">DAF</label>  
          <br>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">DES</label>
          <input type="checkbox"><label class="ancho-checkbox" for="check1">Entrega Expres</label>          
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Moneda de Pago Aceptada</strong></label>
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
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Tipo de Pago Aceptado</strong></label>
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


