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
