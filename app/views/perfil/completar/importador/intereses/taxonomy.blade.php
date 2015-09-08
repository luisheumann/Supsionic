<html>
<head>
  <!-- include needed JS files-->
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="/api/tree/jquery.optionTree.js"></script>
  <script type="text/javascript" src="/js/autocomplete.js"></script>
  <link rel="stylesheet" href="/css/autocomplete.css" type="text/css" media="screen" charset="utf-8" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <style type="text/css">
    select.vertical {
      display: block;
    }
    .results {
      margin: 10px;
      color: darkgreen;
    }


    .ui-widget-content {
      border: 1px solid #aaaaaa;
      background-color: #000 !important;
      color: #000 !important;
      font-size: 15px !important;


    }

    body {
      font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
      font-size: 62.5%;
    }

  </style>
</head>
<body>


  <div>
    <form method="get" action="">

      <label for="testinput">Categoria</label>
      <input style="width: 200px" type="text" id="testinput" value="" /> 
      <form>
        <button type="button"  id="testid" 
        onclick="updateInput(this.value)" 
        value="" title="Aceptar">Aceptar</button>
      </form>



    </form>
  </div>

  <form name="formato"> 
    valoroculto
    <input type="text" name="valoroculto" id="valoroculto" value="89" /><br>
    <input type="text" id="valoroculto2" /><br>
    -------------
    padre11
    <input type="text" id="padre11" /><br>

    hijo1
    <input type="text" id="hijo11" /><br>

    nieto
    <input type="text" id="nieto1" /><br>
    bisnieto
    <input type="text" id="bisnieto11" /><br>
    tataranieto11
    <input type="text" id="tataranieto11" /><br>
    tatataranieto11
    <input type="text" id="tatataranieto11" /><br>


    padre
    <input type="text" id="padre" />
    hijo
    <input type="text" id="hijo1" />
    nieto
    <input type="text" id="hijo2" />
    bisnieto
    <input type="text" id="hijo3" />
    tataranieto
    <input type="text" id="hijo4" />
    tatataranieto
    <input type="text" id="hijo5" />
    <h2></h2>

    <div>
      <br>
      <div>
        <input type="text" name="demo7" />
      </div>
      <br>
      <div>



      </div>

    </div>
    <div class="results" id="demo7-result"></div>

  </form>
  <script type="text/javascript">
    function updateInput(ish){

      var url = window.location.href;    
      if (url.indexOf('?') > -1){
       url += '&param='+ ish
     }else{
       url += '?param=1'+ ish
     }
     window.location.href = url;
   }

   function changeValueCheckbox(element){

     var porNombre=document.getElementsByName("demo7_")[0].value;
     document.getElementById("padre").value = porNombre;


   }

   $(function() {

    var options = {
      empty_value: 'null',
            indexed: true,  // the data in tree is indexed by values (ids), not by labels
            on_each_change: '/api/tree/get-subtree.php', // this file will be called with 'id' parameter, JSON data must be returned
            choose: function(level) {
              return 'Choose level ' + level;
            },
            loading_image: '/api/tree/demo/ajax-load.gif',
            show_multiple: 10, // if true - will set the size to show all options
            id:1,
            choose: '' // no choose item
            
          };

          var displayParents = function() {

            var porNombre=document.getElementsByName("demo7_")[0].value;
            document.getElementById("padre").value = porNombre;

            var hijo1=document.getElementsByName("demo7__")[0].value;
            document.getElementById("hijo1").value = hijo1;

            var hijo2=document.getElementsByName("demo7___")[0].value;
            document.getElementById("hijo2").value = hijo2;

            var hijo3=document.getElementsByName("demo7____")[0].value;
            document.getElementById("hijo3").value = hijo3;

            var hijo4=document.getElementsByName("demo7_____")[0].value;
            document.getElementById("hijo4").value = hijo4;

            var hijo5=document.getElementsByName("demo7______")[0].value;
            document.getElementById("hijo5").value = hijo5;

            var labels = []; // initialize array
            $(this).siblings('select') // find all select

                           .find(':selected') // and their current options
                           
                             .each(function() { labels.push($(this).text()); }); // and add option text to array
            $('<div>').text(this.value + ':' + labels.join(' > ')).appendTo('#demo7-result');  // and display the labels

          }

    $.getJSON('/api/tree/get-subtree.php', function(tree) { // initialize the tree by loading the file first
      $('input[name=demo7]').optionTree(tree, options).change(displayParents);


    });

  });


</script>

<body>

  <code><pre>

  </pre></code>

</body>

<script type="text/javascript">

  var options = {
    script:"/json/taxonomy/search",
    varname:"?term",
    json:true,
    callback: function (obj) { 
      document.getElementById('testid').value = obj.id; 
      var valor = document.getElementById("valoroculto").value = obj.id;

      if (!valor==null ){

        var valor =  valor;

      }else{
       var valor= 0;
     }


   }
 };
 var as_json = new AutoSuggest('testinput', options);


 var options_xml = {
  script:"test.php?",
  varname:"input"
};
var as_xml = new AutoSuggest('testinput_xml', options_xml);

</script>



<?php

if (isset($_GET["param"]) && !empty($_GET["param"])) {
  $param = $_GET['param'];
}else{
  $param = 1;
}

$id = taxonomy::where('id',$param)->first();

if( !$id == null){
  $id = $id->id;

}else{

  $id = null;
}
if (!$id == null) {
  $id1 = taxonomy::where('id', $id)
  ->select('parent')
  ->first();


  if(!$id1 == null){
    $valorid1 = $id1->parent;
  }else{
    $valorid1 = null;
  }
}else{
 $valorid1 = null;

}

if (!$id1 == null) {
  $id2 = taxonomy::where('id', $id1->parent)
  ->select('parent')
  ->first();


  if(!$id2 == null){
    $valorid2 = $id2->parent;
  }else{
    $valorid2 = null;
  }
}else{

 $valorid2 = null;
}

if (!$id2 == null) {
  $id3 = taxonomy::where('id', $id2->parent)->select('parent')->first();

  if(!$id3 == null){
    $valorid3 = $id3->parent;
  }else{
    $valorid3 = null;
  }
}else{
  $valorid3 = null;

}
if (!$id3 == null) {
  $id4 = taxonomy::where('id', $id3->parent)->select('parent')->first();

  if(!$id4 == null){
    $valorid4 = $id4->parent;
  }else{
    $valorid4 = null;
  }
}else{

 $valorid4 = null;
}

if (!$id4 == null) {
  $id5 = taxonomy::where('id', $id4->parent)->select('parent')->first();

  if(!$id5 == null){
    $valorid5 = $id5->parent;
  }else{
    $valorid5 = null;
  }
}else{
  $valorid5 = null;
}


if (!$id5 == null) {
  $id6 = taxonomy::where('id', $id5->parent)->select('parent')->first();

  if(!$id6 == null){
    $valorid6 = $id6->parent;
  }else{
    $valorid6 = null;
  }

}else{
 $valorid6 = null;

}

?>

<script>
  var vartatataranieto11 = "<?php echo $valorid5; ?>" ;
  var varpadre11 = "<?php echo $valorid4; ?>" ;
  var varhijo1 = "<?php echo $valorid3; ?>" ;
  var varnieto = "<?php echo $valorid2; ?>" ;
  var varbisnieto11 = "<?php echo $valorid1; ?>" ;
  var vartataranieto11 = "<?php echo $id; ?>" ;
  var padre11 =document.getElementById('padre11').value = varpadre11; 
  var hijo11 =document.getElementById('hijo11').value = varhijo1; 
  var nieto1 =document.getElementById('nieto1').value = varnieto; 
  var bisnieto11 =document.getElementById('bisnieto11').value = varbisnieto11;
  var vartataranieto11 =document.getElementById('tataranieto11').value = vartataranieto11;  
  var vartatataranieto11 =document.getElementById('tatataranieto11').value = vartatataranieto11;  

</script>

</html>
