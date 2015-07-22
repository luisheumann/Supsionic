<form class="form-horizontal" id="datos-basico-detalle" enctype="multipart/form-data">

  
      <div class="form-group row"><hr>
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Términos de Recogida</strong></label>
        <div class="col-md-6">
          <input type="checkbox"  "@if($empresa->FOB==1) checked @else @endif"  name="FOB"  value="{{$empresa->FOB}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">FOB</label>

         


          <input type="checkbox" "@if($empresa->CFR==1) checked @else @endif"  name="CFR"  value="{{$empresa->CFR}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">CFR</label>
          <input type="checkbox" "@if($empresa->CIF==1) checked @else @endif"    name="CIF"  value="{{$empresa->CIF}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1">CIF</label>
          <br>
          <input type="checkbox" "@if($empresa->EXW==1) checked @else @endif"   name="EXW"  value="{{$empresa->EXW}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="EXW">EXW</label>
          <input type="checkbox" "@if($empresa->FAS==1) checked @else @endif"  name="FAS"  value="{{$empresa->FAS}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="FAS">FAS</label>
          <input type="checkbox" "@if($empresa->CIP==1) checked @else @endif"  name="CIP"  value="{{$empresa->CIP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="CIP">CIP</label>
          <br>
          <input type="checkbox" "@if($empresa->FCA==1) checked @else @endif"  name="FCA"  value="{{$empresa->FCA}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="FCA">FCA</label>
          <input type="checkbox" "@if($empresa->CPT==1) checked @else @endif"  name="CPT"  value="{{$empresa->CPT}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="CPT">CPT</label>
          <input type="checkbox" "@if($empresa->DEQ==1) checked @else @endif"  name="DEQ"  value="{{$empresa->DEQ}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DEQ">DEQ</label>   
          <br>
          <input type="checkbox" "@if($empresa->DDP==1) checked @else @endif"  name="DDP"  value="{{$empresa->DDP}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DDP">DDP</label>
 
          <input type="checkbox" "@if($empresa->DDU==1) checked @else @endif"  name="DDU"  value="{{$empresa->DDU}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DDU">DDU</label>
          <input type="checkbox" "@if($empresa->DAF==1) checked @else @endif"  name="DAF"  value="{{$empresa->DAF}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DAF">DAF</label>  
          <br>
          <input type="checkbox" "@if($empresa->DES==1) checked @else @endif"  name="DES"  value="{{$empresa->DES}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DES">DES</label>
          <input type="checkbox" "@if($empresa->Expres==1) checked @else @endif"  name="Expres"  value="{{$empresa->Expres}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="Expres">Entrega Expres</label>          
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Moneda de Pago Solicitado</strong></label>
        <div class="col-md-6">
          <input type="checkbox" "@if($empresa->COP==1) checked @else @endif"  name="COP"  value="{{$empresa->COP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="COP">COP</label>
          <input type="checkbox" "@if($empresa->USD==1) checked @else @endif"  name="USD"  value="{{$empresa->USD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="USD">USD</label>
          <input type="checkbox" "@if($empresa->EUR==1) checked @else @endif"  name="EUR"  value="{{$empresa->EUR}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="EUR">EUR</label>
          <br>
          <input type="checkbox" "@if($empresa->CAD==1) checked @else @endif"  name="CAD"  value="{{$empresa->CAD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="CAD">CAD</label>
          <input type="checkbox" "@if($empresa->AUD==1) checked @else @endif"  name="AUD"  value="{{$empresa->AUD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="AUD">AUD</label>
          <input type="checkbox" "@if($empresa->HKD==1) checked @else @endif"  name="HKD"  value="{{$empresa->HKD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="HKD">HKD</label>
          <br>
          <input type="checkbox" "@if($empresa->GBP==1) checked @else @endif"  name="GBP"  value="{{$empresa->GBP}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="GBP">GBP</label>
          <input type="checkbox" "@if($empresa->CNY==1) checked @else @endif"  name="CNY"  value="{{$empresa->CNY}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="CNY">CNY</label>
          <input type="checkbox" "@if($empresa->CHF==1) checked @else @endif"  name="CHF"  value="{{$empresa->CHF}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="CHF">CHF</label>       
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Tipo de Pago Aceptado</strong></label>
        <div class="col-md-6">
          <input type="checkbox" "@if($empresa->TT==1) checked @else @endif"  name="TT"  value="{{$empresa->TT}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="TT">T/T</label>
          <input type="checkbox" "@if($empresa->LC==1) checked @else @endif"  name="LC"  value="{{$empresa->LC}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="LC">L/C</label>
          <input type="checkbox" "@if($empresa->DP==1) checked @else @endif" name="DP"  value="{{$empresa->DP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="DP">D/P D/A</label>     
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Lenguaje Hablado</strong></label>
        <div class="col-md-6">
          <input type="checkbox" "@if($empresa->ingles==1) checked @else @endif" name="ingles"  value="{{$empresa->ingles}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="ingles">Inglés</label>
          <input type="checkbox" "@if($empresa->espanol==1) checked @else @endif" name="espanol"  value="{{$empresa->espanol}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="espanol">Español</label>
          <input type="checkbox" "@if($empresa->chino==1) checked @else @endif" name="chino"  value="{{$empresa->chino}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="chino">Chino</label>
          <br>
          <input type="checkbox" "@if($empresa->japones==1) checked @else @endif" name="japones"  value="{{$empresa->japones}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="japones">Japonés</label>
          <input type="checkbox" "@if($empresa->portugues==1) checked @else @endif" name="portugues"  value="{{$empresa->portugues}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="portugues">Portugués</label>
          <input type="checkbox" "@if($empresa->aleman==1) checked @else @endif" name="aleman"  value="{{$empresa->aleman}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="aleman">Alemán</label>
          <br>
          <input type="checkbox" "@if($empresa->arabe==1) checked @else @endif" name="arabe"  value="{{$empresa->arabe}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="arabe">Árabe</label>
          <input type="checkbox" "@if($empresa->frances==1) checked @else @endif" name="frances"  value="{{$empresa->frances}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="frances">Francés</label>
          <input type="checkbox" "@if($empresa->ruso==1) checked @else @endif" name="ruso"  value="{{$empresa->ruso}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="ruso">Ruso</label>   
          <br>
          <input type="checkbox" "@if($empresa->koreano==1) checked @else @endif" name="koreano"  value="{{$empresa->koreano}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="koreano">Koreano</label>
          <input type="checkbox" "@if($empresa->hindu==1) checked @else @endif" name="hindu"  value="{{$empresa->hindu}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="hindu">Hindi</label>
          <input type="checkbox" "@if($empresa->italiano==1) checked @else @endif" name="italiano"  value="{{$empresa->italiano}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="italiano">Italiano</label>        
        </div>
      </div><hr>


  <!-- Loader -->
  <div align="center">
   
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

      <button type="button"  class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal3">Actualizar</button>
</div>

       



<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Password</h4>
      </div>
      <div class="modal-body">
        <p>Escriba el Password de su cuenta</p>
        <input type="password" class="form-control" id="pass" name="pass" value="">
      </div>
      <div class="modal-footer">

                   
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-info btn-md" value="Actualizar">


      </div>
    </div>

  </div>
</div>  
</form>

<script type="text/javascript">




  function changeValueCheckbox(element){


   if(element.checked){
    element.value='1';
    
 
  }else{
    element.value='0';
    
  }
}
</script>


