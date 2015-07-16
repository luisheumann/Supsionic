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

  $twitter='/images/perfil/tw.png';
  $facebook='/images/perfil/fb.png';

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    $perfil2 = User::find($user_id)->empresas->first();
    $usuario = User::find($user_id)->first();

    $avatar = Recursos::ImgAvatar($perfil);
      

  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }
  $empresa = User::find($user_id)->empresas->first();
?>


<style type="text/css">
  input[type="checkbox"] {
  padding: 5px;
  margin: 5px;
  margin-right: 10px;
}


.title-productos-vistos{
  color: #000;
    
  font-size: 21px;
  line-height: 1.5;
}

.titulo-productos-precio{

  color:#c00;
}

.producto-titulo{
font-size: 14px;
  color:#666;
  font-weight: bold;
}

.producto-categoria{
color:#666;

}


.m-region {
    width: 100%;
  border: 1px solid #ededed;
  margin-top: -1px;
  padding: 20px;
  height: 71px;
  background-color: #fafafa;
}
.item-flat{


    position: relative;
  display: inline-block;
  float: left;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
}

.box.home-information{

  height:150px;
    margin-top: 10px;
}

.home-information-borde{
  border-left: 1px solid #e6e6e6;
  padding-left: 20px;
  height:150px;

}

.information-title{
font-weight: bold;
font-size: 16px;
  margin-top: 5px;

}

.home-fondo-carrusel{

  background-color: #fff;
    margin-top: 20px;
}
.skin-blue .sidebar-form {
  margin: 0px !important;

}
.users-list>li img {
  border-radius: 0%;
 
 width: 80px;
 height: 80px;
}
.pote{

  width: 142px;
  height: 300px;
  margin: 8px;
  overflow: hidden;
  /* background-color: #666; */
  /* overflow-wrap: normal; */
}




</style>
<div class="box">



<section>
          <!-- title row -->
       
            
                <div class="header-empresa">
<div class="row" style="margin-right: 0; margin-left: 0px;">
  

   
  <div class="col-xs-8 caja-empresa">
   <div class="col-xs-3" >
<div style="width:90px;">
  @if($perfil->imagen == Null) 
        @else 
      
    <img id="imagen" height="90" width="90" style="float:left; padding:10px;" class="img-circle" alt="Image" src="/uploads/{{$perfil2->imagen}}"/>    
           
        @endif
  
  
        <img src="{{asset('images/perfil/estrella.png')}}">
</div>
        </div>
      <div class="col-xs-6">
        <ul class="datos-empresa">
          <li class="nombre-empresa">{{$empresa->nombre}}</li>
          <!--<li class="txt-pais">
            @if($empresa->pais)
              {{$empresa->pais->nombre}}
            @endif
          </li>-->
          <li>
          Siguenos en:
          </li>
         <li>
             <a href="{{$empresa->tw}}"><img src="{{asset('images/perfil/tw.png')}}"> </a> <a href="{{$empresa->fb}}"><img src="{{asset('images/perfil/fb.png')}}"></a>
         </li>
        </ul>
      </div>
      <div class="col-xs-3">
      
      
      <img src="{{asset('images/iconos_a/'.$perfil->imagen)}}" class="img_rol"><br>
        <span class="titulo_rol">{{$perfil->rol}}</span> 
      </div>
  </div>
</div>  



</div>
<div class="tab-perfil">
    <ul class="nav nav-tabs-perfil navbar-right" role="tablist">
      <li class="">
        <a href="#home" role="tab" data-toggle="tab">DATOS DE CONTACTO</a>
      </li>    
    </ul>    
  </div>
           
       <div class="box-body">
 <div class="row dat-contacto">
        <div class="col-md-5">
          <ul class="lista-perfil">
            <li><p>Ubicacion:</p><br> <span> @if($empresa->pais)
              {{$empresa->pais->nombre}}
            @endif</span> </li>
            </span> </li>
            <li><p>Direccion:</p> <br><span>{{$empresa->direccion}}</span> </li>
            <li><p>Sitio Web:</p> <span>{{$empresa->web}}</span> </li>
          </ul>
        </div>
        <div class="col-md-4" align="right" style="margin-top:30px">
         <!-- <a href="#" class="btn-borde btn-borde-n-i">PRODUCTOS</a><br>-->
        </div>
        <div class="col-md-3" align="right">
          <a href="#"><img width="125px" src="{{asset('images/perfil/conectar.png')}}"></a>
        </div>

      </div> 
      </div>

   <hr>
          <div class="perfil-descripcion">
          <h1>DESCRIPCIÓN </h1>
          <hr>
         
            <p>{{$empresa->descripcion}}</p>
          
           
          </div>
          <!-- this row will not appear when printing -->
     
</section>





<hr>
    <div class="perfil-descripcion">
<h1>DETALLE EMPRESA </h1>
</div>


<div style="padding-left:20px; padding-right:20px"><!--DEtalle comercio-->
   <div class="form-group row"><hr>
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Términos de Entrega Aceptados</strong></label>
 <div class="col-md-5">
          <input title="Free on board / Libre o franco a bordo
" disabled="1"  type="checkbox"  "@if($empresa->FOB==1) checked @else @endif"  name="FOB"  value="{{$empresa->FOB}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" title="Free on board / Libre o franco a bordo
">FOB</label>

          <input title="Cost and freight /  Costo y flete" disabled="1" type="checkbox" "@if($empresa->CFR==1) checked @else @endif"  name="CFR"  value="{{$empresa->CFR}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" title="Cost and freight /  Costo y flete">CFR</label>

          <input title="Cost insurance and freight / Costo, seguro y flete" disabled="1" type="checkbox" "@if($empresa->CIF==1) checked @else @endif"    name="CIF"  value="{{$empresa->CIF}}" onclick="changeValueCheckbox(this)"><label title="Cost insurance and freight / Costo, seguro y flete" class="ancho-checkbox" for="check1">CIF</label>
          <br>
          <input title="Ex work / En fábrica" disabled="1" type="checkbox" "@if($empresa->EXW==1) checked @else @endif"   name="EXW"  value="{{$empresa->EXW}}" onclick="changeValueCheckbox(this)"><label title="Ex work / En fábrica" class="ancho-checkbox" for="check1" name="EXW">EXW</label>

          <input title="Free alongside ship / Libre al costado del buque" disabled="1" type="checkbox" "@if($empresa->FAS==1) checked @else @endif"  name="FAS"  value="{{$empresa->FAS}}" onclick="changeValueCheckbox(this)"><label title="Free alongside ship / Libre al costado del buque" class="ancho-checkbox" for="check1" name="FAS">FAS</label>

          <input disabled="1" title="Carriage and insurance paid to / Transporte y seguro pagado hasta
" type="checkbox" "@if($empresa->CIP==1) checked @else @endif"  name="CIP"  value="{{$empresa->CIP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="CIP" title="Carriage and insurance paid to / Transporte y seguro pagado hasta
">CIP</label>
          <br>
          <input title="Free carrier / Libre o franco transportista" disabled="1" type="checkbox" "@if($empresa->FCA==1) checked @else @endif"  name="FCA"  value="{{$empresa->FCA}}" onclick="changeValueCheckbox(this)"><label title="Free carrier / Libre o franco transportista" class="ancho-checkbox" for="check1" name="FCA">FCA</label>

          <input title="Carriage paid to / Transporte pagado hasta" disabled="1" type="checkbox" "@if($empresa->CPT==1) checked @else @endif"  name="CPT"  value="{{$empresa->CPT}}" onclick="changeValueCheckbox(this)"><label title="Carriage paid to / Transporte pagado hasta" class="ancho-checkbox" for="check1" name="CPT">CPT</label>

          <input title="[Delivered ex Quay (Duty Paid) - Entregada en muelle (derechos pagados)] 
" disabled="1" type="checkbox" "@if($empresa->DEQ==1) checked @else @endif"  name="DEQ"  value="{{$empresa->DEQ}}" onclick="changeValueCheckbox(this)"><label title="[Delivered ex Quay (Duty Paid) - Entregada en muelle (derechos pagados)] 
" class="ancho-checkbox" for="check1" name="DEQ">DEQ</label>   
          <br>
          <input title="Delivered duty paid / Entregada derechos pagado" disabled="1" type="checkbox" "@if($empresa->DDP==1) checked @else @endif"  name="DDP"  value="{{$empresa->DDP}}" onclick="changeValueCheckbox(this)"><label title="Delivered duty paid / Entregada derechos pagado" class="ancho-checkbox" for="check1" name="DDP">DDP</label>
 
          <input title="(Delivered Duty Unpaid - Entregada derechos no pagados)
" disabled="1" type="checkbox" "@if($empresa->DDU==1) checked @else @endif"  name="DDU"  value="{{$empresa->DDU}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DDU" title="(Delivered Duty Unpaid - Entregada derechos no pagados)
">DDU</label>
          <input title="(Delivered at Frontier - Entregado en frontera)
" disabled="1" type="checkbox" "@if($empresa->DAF==1) checked @else @endif"  name="DAF"  value="{{$empresa->DAF}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DAF" title="(Delivered at Frontier - Entregado en frontera)
">DAF</label>  
          <br>
          <input title="(Delivered ex Ship - Entregada sobre buque) 
" disabled="1" type="checkbox" "@if($empresa->DES==1) checked @else @endif"  name="DES"  value="{{$empresa->DES}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="DES">DES</label>
          <input disabled="1" type="checkbox" "@if($empresa->Expres==1) checked @else @endif"  name="Expres"  value="{{$empresa->Expres}}" onclick="changeValueCheckbox(this)"><label title="(Delivered ex Ship - Entregada sobre buque) 
" class="ancho-checkbox" for="check1" name="Expres">Entrega Expres</label>          
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Moneda de Pago Aceptada</strong></label>
        <div class="col-md-5">
          <input title="Pesos Colombianos
" disabled="1" type="checkbox" "@if($empresa->COP==1) checked @else @endif"  name="COP"  value="{{$empresa->COP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="COP" title="Pesos Colombianos
">COP</label>
          <input title="Dolares Estadounidenses" disabled="1" type="checkbox" "@if($empresa->USD==1) checked @else @endif"  name="USD"  value="{{$empresa->USD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="USD" title="Dolares Estadounidenses">USD</label>
          <input title="Euros" disabled="1" type="checkbox" "@if($empresa->EUR==1) checked @else @endif"  name="EUR"  value="{{$empresa->EUR}}" onclick="changeValueCheckbox(this)"><label title="Euros" class="ancho-checkbox" for="check1" name="EUR">EUR</label>
          <br>
          <input title="Dólar Canadiense" disabled="1" type="checkbox" "@if($empresa->CAD==1) checked @else @endif"  name="CAD"  value="{{$empresa->CAD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="CAD" title="Dólar Canadiense">CAD</label>
          <input title="Dolare Australianos
" disabled="1" type="checkbox" "@if($empresa->AUD==1) checked @else @endif"  name="AUD"  value="{{$empresa->AUD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="AUD" title="Dolare Australianos
">AUD</label>
          <input title="DÓLAR DE HONG KONG
" disabled="1" type="checkbox" "@if($empresa->HKD==1) checked @else @endif"  name="HKD"  value="{{$empresa->HKD}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="HKD" title="DÓLAR DE HONG KONG
">HKD</label>
          <br>
          <input title="Libra Britanica" disabled="1" type="checkbox" "@if($empresa->GBP==1) checked @else @endif"  name="GBP"  value="{{$empresa->GBP}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="GBP" title="Libra Britanica">GBP</label>
          <input title="Yuan Chino " disabled="1" type="checkbox" "@if($empresa->CNY==1) checked @else @endif"  name="CNY"  value="{{$empresa->CNY}}" onclick="changeValueCheckbox(this)"><label title="Yuan Chino " class="ancho-checkbox" for="check1" name="CNY">CNY</label>
          <input title="Franco Suizo
" disabled="1" type="checkbox" "@if($empresa->CHF==1) checked @else @endif"  name="CHF"  value="{{$empresa->CHF}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="CHF" title="Franco Suizo
">CHF</label>       
        </div>
      </div><hr>
      <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Tipo de Pago Aceptado</strong></label>
        <div class="col-md-5">
          <input title="Telegraphic Transfer / Transferencia Bancaria" disabled="1" type="checkbox" "@if($empresa->TT==1) checked @else @endif"  name="TT"  value="{{$empresa->TT}}" onclick="changeValueCheckbox(this)" ><label title="Telegraphic Transfer / Transferencia Bancaria" class="ancho-checkbox" for="check1" name="TT">T/T</label>
          <input title="Letter  of Credit  / Credito Documentario
" disabled="1" type="checkbox" "@if($empresa->LC==1) checked @else @endif"  name="LC"  value="{{$empresa->LC}}" onclick="changeValueCheckbox(this)"><label title="Letter  of Credit  / Credito Documentario
" class="ancho-checkbox" for="check1" name="LC">L/C</label>
          <input title="Documents Against Payment / Pago por anticipado" disabled="1" type="checkbox" "@if($empresa->DP==1) checked @else @endif" name="DP"  value="{{$empresa->DP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="DP">D/P</label>     
        </div>

                <input title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido.
" disabled="1" type="checkbox" "@if($empresa->DA==1) checked @else @endif" name="DP"  value="{{$empresa->DA}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="DP" title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido.
"> D/A</label>     
        </div>


      </div><hr>
      <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Lenguaje Hablado</strong></label>
        <div class="col-md-7">
          <div style="float:left">
            <div class="checklenguaje">
              <input disabled="1" type="checkbox" "@if($empresa->ingles==1) checked @else @endif" name="ingles"  value="{{$empresa->ingles}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="ingles">Inglés</label>
            </div>

            <div class="checklenguaje">
              <input disabled="1" type="checkbox" "@if($empresa->espanol==1) checked @else @endif" name="espanol"  value="{{$empresa->espanol}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="espanol">Español</label>
            </div>
            <div class="checklenguaje">

              <input disabled="1" type="checkbox" "@if($empresa->chino==1) checked @else @endif" name="chino"  value="{{$empresa->chino}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="chino">Chino</label>
            </div>
          </div>
          <div style="float:left">
           <div class="checklenguaje">
            <input disabled="1" type="checkbox" "@if($empresa->japones==1) checked @else @endif" name="japones"  value="{{$empresa->japones}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="japones">Japonés</label>
          </div>
          <div class="checklenguaje">

            <input disabled="1" type="checkbox" "@if($empresa->portugues==1) checked @else @endif" name="portugues"  value="{{$empresa->portugues}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="portugues">Portugués</label>
          </div>
          <div class="checklenguaje">

            <input disabled="1" type="checkbox" "@if($empresa->aleman==1) checked @else @endif" name="aleman"  value="{{$empresa->aleman}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="aleman">Alemán</label>
          </div>
        </div>
        <div style="float:left">
         <div class="checklenguaje">

          <input disabled="1" type="checkbox" "@if($empresa->arabe==1) checked @else @endif" name="arabe"  value="{{$empresa->arabe}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="arabe">Árabe</label>
        </div>
        <div class="checklenguaje">

          <input disabled="1" type="checkbox" "@if($empresa->frances==1) checked @else @endif" name="frances"  value="{{$empresa->frances}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="frances">Francés</label>
        </div>
        <div class="checklenguaje">

          <input disabled="1" type="checkbox" "@if($empresa->ruso==1) checked @else @endif" name="ruso"  value="{{$empresa->ruso}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="ruso">Ruso</label>
        </div>

      </div>
      <div style="float:left">

        <div class="checklenguaje">
          <input disabled="1" type="checkbox" "@if($empresa->koreano==1) checked @else @endif" name="koreano"  value="{{$empresa->koreano}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="koreano">Koreano</label>
        </div>
        <div class="checklenguaje">

          <input disabled="1" type="checkbox" "@if($empresa->hindu==1) checked @else @endif" name="hindu"  value="{{$empresa->hindu}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="hindu">Hindi</label>
        </div>
        <div class="checklenguaje">

          <input disabled="1" type="checkbox" "@if($empresa->italiano==1) checked @else @endif" name="italiano"  value="{{$empresa->italiano}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="italiano">Italiano</label>   
        </div>
</div>
</div>







</div><!--detalle comercionn end-->


<!--GALERIA-->

@if ($perfil->id == 1)
   <div><span class="list-item-descripcion">Productos</span></div>


</div>

  <div class="row clearfix fondomiddle">
          <div class="">
            <div id="Carousel" class="carousel slide">


              <!-- Carousel items -->
              <div class="carousel-inner">
                @if($productos->count())
                <?php $i=1 ?>
                <?php $j=0 ?>

 <?php $c=0 ?>



   

 @foreach($productos as $galeria)







                @if($i==1)
                <div class="item active">
                  <div class="row2">
                    @elseif($j>=4 AND $i<>0)
                    <div class="item">
                      <div class="row">
                        <?php $j=0 ?>
                        @endif

                        <div class="col-lg-3 col-xs-2 col-md-3">
                          <div class="thumb"> <a href="/{{$empresa->slug}}/producto/{{$galeria->id}}" class="img-responsive">
                            @if(!$galeria->imagen == null)
  




                                                   <img alt="Image" width="150" height="150" title="@if ($galeria->imagen->count()>0){{$img= $galeria->imagen->first()->imagen}} @else {{$img= 'producto.png'}} @endif" src="/uploads/productos/{{$img}}" alt="Image">



                            @endif
                          
                          </a></div>
                          <p>
                            <div class="text-blog thumb"> <a href="{{URL::to('/uploads/productos/'.$galeria->imagen)}}">{{$galeria->nombre}}</a> </div> 
                     
                     
                             <div><span class="rating ">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span></div>
                            <div class="blog carrusel footer">  @if($empresa->pais)
              {{$empresa->pais->nombre}}
            @endif</div>
                          </p>

                        </div>

                        @if(fmod($i,4)==0)
                      </div></div><!-- cierra solo multiplos de 6 {{$i}} -->
                      @endif
                      <?php $i++ ?>
                      <?php $j++ ?>

                
           
         @endforeach

                      @if(fmod($i - 1,4)>0)
                    </div></div> <!-- Cierra al final {{$i}} solo si es decimal -->
                    @endif

                    @else
                    no hay nada
                    @endif

                  </div><!--.carousel-inner-->


                  <a class="left carousel-control" href="#Carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#Carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>


                </div><!--.Carousel-->

<!--Galeria-->


 </div>


@endif




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
