
<?php

  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;

  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>





@extends('layouts/frontend')



@section('content-header')


<style>



.bodyWrap
{
width: 900px;
margin: 5% auto;
}

.main, .content{
  float: left;
 
}

.breadCrumbs{
  float: left;
  padding: 5px 0 5px 10px;
  letter-spacing: 1px;
  line-height: 2em;
  color: #fff;
}

.breadCrumbs>a{
  text-decoration: none; 
  color: #fff;
}

.breadCrumbs>a:hover{
  text-decoration: underline;
}



.content
{
overflow: hidden;
background: #fff;
}

.content p
{
padding: 0 0 0 10px;
}

.bottom
{
width: 100%;
height: 2.5em;
border-top: 1px solid #B6B6AB;
background: #EAEAEA;
}

.bd
{
border: 1px solid #B6B6AB;
border-radius: 4px;
}

.clearFix:after
{
content: " ";
display: block;
height: 0;
clear: both;
}

.productStage, .productImage, .overview
{
  float: left;
}

.overview h1, .overview h2, .overview h3
{
  padding: 0;
  margin: 0 0 10px 0;
}

.productStage
{
  background: #fff;
  width: 700px;
  margin-right: 20px;
}

.productImage
{
  width: 350px;
  text-align: center;
  margin-bottom: 20px;
}

.productImage span{
  float: right;
  padding-right: 30px;
}

span a{
  text-decoration: none;
}

.overview
{
  float: left;
  width: 320px;
}


.button
{
display: block;
color: #fff;
border-radius: 4px;
padding: 5px;
margin: auto;
margin-bottom: 10px;
text-decoration: none;
border-radius:3px;
text-align: center;
cursor: pointer;
}

.button a:hover
{
text-decoration: none;
}

.add{
  width: 150px;
  line-height: 2em;
  background: #59A80F;
}

.add:hover{
  background: #4B8E0D;
}

.wish{
  width: 150px;
  background: #45ADA8;
}

.wish:hover{
  background: #388B87;
}

.submit{
  background: #EAEAEA;
  color: #555;
  float: right;
  text-transform: uppercase;
  font: bold 10px Verdana;
}

.blueSubmit{
  background: #22697F;
  color: #fff;
  border: 1px solid #22697F;
}

.right{
  float: right;
}

.left{
  float: left;
}

.imageList { list-style: none; margin: 5px 0px 2px 0px; padding: 0; }
.imageList li { display: inline; padding: 0; margin: 0 2px;  }
.imageList a { text-decoration: none; }
.imageList img { border: 1px solid #D3D3D3; vertical-align: top; }

.prodSelect{
  width: 100%;
  border-radius: 4px;
  height: 2em;
  outline: none;
  margin-bottom: 15px;
}

.rating{
  color: #FC913A;
}

.info{
  float: left;
  width: 100%;
}

.info h3{
  background: #22697F;
  line-height: 36px;
  padding: 5px 0 5px 20px;
  border-radius: 4px;
  letter-spacing: 1px;
  color: #fff;
  text-shadow:1px 1px 3px rgba(0,0,0,0.5);
  font: 10pt Verdana;
  text-transform: uppercase;
}

.description{
  display: inline-block;
  margin: 10px 0 20px 0;
}

.specs{
  list-style-type: none;
  margin: 0;
  padding: 0 0 0 10px;
}

.specs li{
  padding: 0 0 5px 0;
}

.specs h5{
  display: inline;
  font: bold 10pt Verdana;
}


.product
{
width: 150px;
padding: 10px 0 0 10px;
display: inline-block;
text-align: center;
font-size: 11px;
line-height: 14px;
text-decoration: none;
margin-bottom: 20px;
overflow: hidden;
}

.product a{
  text-decoration: none;
}

.product a:hover{
  text-decoration: underline;
}

.product .smallBox
{
display: inline-block;
max-width: 92px;
max-height: 92px;
overflow: hidden;
}

.product span, .product div
{
display: block;
}

.soft
{
padding-left: 8px;
}

.hard
{
padding-left: 12px;
}

.slim
{
  padding: 0;
  margin: 0 0 10px 0;
  width: 100%;
  display: block;
}

.vtop
{
vertical-align: top;
}

.vbot
{
vertical-align: bottom;
}

.manuName
{
margin: 10px 0 5px 0;
font-weight: bold;
color: #464646;
}

.prodName
{
color: #464646;
margin: 0 0 5px 0;
}

.prodPrice
{
text-decoration: none;
}

.review{
  background: #E7F5FD;
  color: #555;
  padding: 10px;
  border-radius: 4px;
  margin-bottom: 15px;
  float: left;
}

.review span{
  float: left;
}

.review:hover .vote{
  opacity: 1;
}

.vote{
  opacity: 0;
  float: right;
  font-weight: bold;
  padding: 15px 0 0 0;
}

span.title{
  text-align: left;
  font-weight: bold;
  padding: 0 0 10px 0;
}

span.author{
  text-align: right;
  float: left;
  padding: 15px 0 0 0;
}

.stars{
  padding: 10px 0;
  display: inline-block;
}

.botBorder{
  padding: 10px;  
  border: 1px solid #B6B6AB;
  border-top: none;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  margin-bottom: 20px;
}

.folderTab {
background: #22697F;
text-shadow: 1px 1px 0 rgba(0,0,0, .8);
text-align: center;
color: #fff;
border-top-left-radius: 4px;
border-top-right-radius: 4px;
border: 1px solid #22697F;
}

.folderTab.sub{
  background: #5196A3;
  border: 1px solid #5196A3;
}

.folderTab h3{  
  margin: 0;
  padding: 5px 0 5px 20px;
  color: #fff;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
  letter-spacing: 1px;
  font: 10pt Verdana;
  line-height: 2em;
  max-width: 400px;
  text-transform: uppercase;
  text-align: left;
  float: left;
}

 .folderTab.sub h3{
   text-align: center;
   padding: 5px;
   float: none;
 }

.submit:hover{
  background: #D2D2D2;
}

.blueSubmit:hover{
  background: #184A5A;
  border: 1px solid #184A5A;
}

li.item {
  width: 150px !important;
  float: left !important;
}



</style>



  
            <small> Inicio</small>
       <h1>   </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li class="active">Productos</li>
          </ol>
@stop



@section('content')

<div class="row">
            <!-- Left col -->
            <div class="col-md-8">
            
              <div class="row">
             

                <div class="col-md-6">
                  <!-- USERS LIST -->
                  
                </div><!-- /.col -->
              </div><!-- /.row -->


              <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>



        <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Producto</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
             



<div class="bodyWrap">    
    <div class="productStage">
  
  <div >
      <div class="productImage">
        <img src="http://placehold.it/300x300">
          <ul class="imageList">
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
          </ul>
              <span><a href="#"><b>View More</b></a></span>
      </div>
      <div class="overview">
        <h1>Cascade 220 Yarn</h1>
        <h2>2401 - Maroon</h2>
        <span class="rating">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span>
        <h3>$10.00</h4>
        <span>50+ available</span>
        <span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam elementum est, at vestibulum augue consequat at. Donec euismod convallis felis. Nam sed molestie dolor. Proin in tortor sed augue consequat viverra.</span>

          <select class="prodSelect">
            <option selected>Current Product</option>
            <option>Product Option 2</option>
            <option>Product Option 3</option>
            <option>Product Option 4</option>
            <option>Product Option 5</option>
          </select>

        <div class="button add">Seleccionar</div>

                   
      </div>
        

       

</div>
    </div>
</div>








                </div><!-- /.box-body -->
              
              </div>
   








   <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Descripcion</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
  
     <div class="info">
     
          <ul class="specs">
            <li><h5>Weight:</h5> Worsted</li>
            <li><h5>Gauge (sts. / inch):</h5> 4.5</li>
            <li><h5>US Needle:</h5> 8</li>
            <li><h5>Yardage:</h5> 220</li>
            <li><h5>Primary Fiber:</h5> 100% Wool</li>
            <li><h5>Specific Fiber:</h5> 100% Pure New Wool</li>
            <li><h5>Physical Weight:</h5> 100g</li>
            <li><h5>Washing Instructions:</h5> Hand Wash</li>
          </ul>
        
        <div class="description">
          The classic Cascade 220 Wool is the perfect combination of affordability, quality and versatility that can be used for a wide range of projects. Each hank of this worsted weight 100% pure wool comes with a generous 220 yards. With a nearly unlimited color palette to chose from, you are sure to find the perfect color(s) for your next project! Note: this yarn is great for felting projects too!
        </div> 
       </div> 



                </div><!-- /.box-body -->
              
              </div>


      <!-- TABLE: LATEST ORDERS -->
           
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->


              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Productos Similares </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">

                            <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->

                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->

                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                              <li class="item">
                      <div class="">
                        <img src="{{asset('uploads/productos/thumbnail/65856.jpeg')}}" width="92px" height="92px" alt="Product Image">
                      </div>
                      <div class="">
                       Samsung TV 
                       
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">Ver todos los productos</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
@stop



















<div class="bodyWrap">    
    <div class="productStage">
        <div class="folderTab clearFix">
    <div class="breadCrumbs">
      <a href="#">Home</a> > 
      <a href="#">Category</a> > 
      <a href="#">Manufacturer</a> > 
      <a href="#">Product Group</a>
    </div></div>
  <div class="botBorder clearFix">
      <div class="productImage">
        <img src="http://placehold.it/300x300">
          <ul class="imageList">
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
          </ul>
              <span><a href="#"><b>View More</b></a></span>
      </div>
      <div class="overview">
        <h1>Cascade 220 Yarn</h1>
        <h2>2401 - Maroon</h2>
        <span class="rating">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span>
        <h3>$10.00</h4>
        <span>50+ available</span>
        <span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam elementum est, at vestibulum augue consequat at. Donec euismod convallis felis. Nam sed molestie dolor. Proin in tortor sed augue consequat viverra.</span>

          <select class="prodSelect">
            <option selected>Current Product</option>
            <option>Product Option 2</option>
            <option>Product Option 3</option>
            <option>Product Option 4</option>
            <option>Product Option 5</option>
          </select>

        <div class="button add">Add to Cart</div>
        <div class="button wish">Add to Wishlist</div>
                   
      </div>
        
     <div class="info">
          <h3>Product Information</h3>
          <ul class="specs">
            <li><h5>Weight:</h5> Worsted</li>
            <li><h5>Gauge (sts. / inch):</h5> 4.5</li>
            <li><h5>US Needle:</h5> 8</li>
            <li><h5>Yardage:</h5> 220</li>
            <li><h5>Primary Fiber:</h5> 100% Wool</li>
            <li><h5>Specific Fiber:</h5> 100% Pure New Wool</li>
            <li><h5>Physical Weight:</h5> 100g</li>
            <li><h5>Washing Instructions:</h5> Hand Wash</li>
          </ul>
        
        <div class="description">
          The classic Cascade 220 Wool is the perfect combination of affordability, quality and versatility that can be used for a wide range of projects. Each hank of this worsted weight 100% pure wool comes with a generous 220 yards. With a nearly unlimited color palette to chose from, you are sure to find the perfect color(s) for your next project! Note: this yarn is great for felting projects too!
        </div> 
       </div> 
        
      <div class="info">
          <h3>Product Colors</h3>
             
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div> 
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>  
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
             <span class="prodPrice">$10.00</span>
        </div>
          
     <div class="info">
        <h3>Product Reviews</h3>  
         <div class="review">
            <span class="title">A favorite
           <br><img class="stars" src="http://localhost.com/jblocal/secure-html/onlineec/images/stars/5StarBlue09.gif"></span>      
              <span class="comments">This is my go-to, workhorse yarn. It comes in a zillion colors, is fairly soft to touch better with a soak, and holds up well over time. Definitely a tried and true standard.</span>
            <span class="author">By kaitmurphy  on April 11, 2014</span>
             <div class="vote">
               Was this review helpful?
               <input type="submit" value="Yes">
              </div>
         </div>
       
        <div class="review">
          <span class="title">Great Felting Yarn!
          <br><img class="stars" src="http://localhost.com/jblocal/secure-html/onlineec/images/stars/5StarBlue09.gif"></span>
          
            <span class="comments">Noni's Patterns call the Cascade 220 in many of her patterns becuase of it's felting qualities. It is a lovely yarn to work with.</span>
          <span class="author">By lulu5156 on December 31, 2013</span>
            <div class="vote">
             Was this review helpful?
             <input type="submit" value="Yes">
            </div>
       </div>
          
            <div class="review">
              <span class="title">A little rough but nice!
                  <br><img class="stars" src="http://localhost.com/jblocal/secure-html/onlineec/images/stars/4StarBlue09.gif"></span>

                <span class="comments">I made a mistake in ordering this because I was meaning to order the superwash, which is much softer. But, that being said, this is nice yarn and is easy to work with.Colors were true to the website photos.</span>
              <span class="author">By Lucky67 on August 27, 2013</span>
                <div class="vote">
                 Was this review helpful?
                 <input type="submit" value="Yes">
                </div>
           </div>
                    
                    <div class="button bd submit right">Read More Reviews</div>
                    <div class="button submit blueSubmit left">Write a Review</div> 
           </div>                     
          
        </div>  
     </div>
    </div> 
      
    <div class="sidebar slim">
      <div class="folderTab sub clearFix">
        <h3>Similar Items</h3>
      </div>
      <div class="botBorder">
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
          <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
      </div>
          
      <div class="folderTab sub clearFix">
        <h3>Related Kits</h3>
      </div>
      <div class="botBorder">
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
          <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
      </div>    
          
    </div>
</div>





<!-- Finaliza el render de la pagina -->

@stop
