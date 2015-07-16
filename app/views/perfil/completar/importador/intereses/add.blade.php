<style type="text/css">
  .modal-body {
  padding: 40px;


}


input#max {
  width: 100px;
  float: left;
  margin-right: 20px;
}


input#min {
  width: 100px;
  float: left;
    margin-right: 20px;
}


select#min_cantidad {
  width: 250px;
}

select#max_cantidad {
  width: 250px;
}




</style>
<form class="form-horizontal" id="form_importador">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="categoria_producto">Categoría</label>
        <select name="categoria_producto" id="categoria_producto" class="form-control" required>
          <option value="">Seleccione...</option> 
          @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
          @endforeach
        </select>
       </div>
     </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="productos">
          Escriba los productos que te interesan importar de la categoría:<br>
            <strong>
              <em><span id="view_cate"></span></em>
            </strong>
        </label>
        <textarea name="productos" class="form-control" id="productos" rows="4" placeholder="productos de interés" required></textarea>
      </div>
    </div>  
   </div>
  <hr>


  <div class="row">    <b>Cantidad Minima</b><br>
    <div class="col-md-12">
      <div class="form-group">
        
        <input type="text" class="form-control" id="min" name="min" value=""> 

        <select name="min_cantidad" id="min_cantidad" class="form-control" required>
          <option value="">Seleccione Unidad de Medida...</option> 
          @foreach($unidades as $unidade)
          <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
          @endforeach
        </select>


      </div>
    </div>  
  </div>


  <div class="row"> <b> Cantidad Maxima</b><br>
    <div class="col-md-12">
      <div class="form-group">
  
           <input type="text" class="form-control" id="max" name="max" value="">
            <select name="max_cantidad" id="max_cantidad" class="form-control" required>
          <option value="">Seleccione Unidad de Medida...</option> 
          @foreach($unidades as $unidade)
          <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
          @endforeach
        </select>

      </div>
    </div>  
   </div>

  <hr>


  <div class="row">    <b>Partida arancelaria.</b><br>
    <div class="col-md-12">
      <div class="form-group">
        
        <input type="text" class="form-control" id="partida" name="partida" value=""> 



      </div>
    </div>  
  </div>

  <hr>
<div class="row">    <b>Frecuencia de Compra</b><br>
    <div class="col-md-12">
      <div class="form-group">
        
       <select id="frecuencia" required name="frecuencia" class="form-control" >
           
              <option value="1">Semanal</option>
              <option value="2">Mensual</option>
              <option value="3">Trimestral</option>
              <option value="4">Semestral</option>
              <option value="5">Anual</option>

         
          </select>


      </div>
    </div>  
  </div>
  <hr>








  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="pais_origen">País de Destino</label>
        <select name="pais_destino" id="pais_destino" class="form-control">
          <option value="" required>Seleccione...</option>
          @foreach($paises as $pais)
             @if($empresa->pais_id == $pais->id)
          <option selected value="{{$pais->id}}">{{$pais->nombre}}</option>
         @else
          <option value="{{$pais->id}}">{{$pais->nombre}}</option>
             @endif
          @endforeach 
        </select>
       </div>
      </div>
     <div class="col-md-6">
      <div class="form-group">
        <label for="selec_paises">Paises de Origen </label><br>
           <select id="selec_paises" required name="origenes[]" multiple="multiple">
            @foreach($paises as $pais)
              <option value="{{$pais->id}}">{{$pais->nombre}}</option>
            @endforeach 
          </select>
       </div>
    </div>
   </div>
  <hr>

  <!-- Loader -->
  <div align="center">
    <img src="{{asset('images/load.gif')}}" id="load_import" style="display:none">  
  </div>

  <!-- Mensaje de errores -->
  <div class="alert alert-danger danger" id="alerta_import" style="display:none">
    <ul></ul>
  </div> 

  <div align="center">
    <button class="btn btn-success" id="btn_import"><i class="fa fa-check"></i> GUARDAR</button>
  </div>

  </form>
