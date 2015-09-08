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



.tituloproductogaleria {
  /* margin: 34px; */
  margin-left: 30px;
  margin-right: 30px;
}





.ui-helper-hidden{display:none}.ui-helper-hidden-accessible{border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.ui-helper-reset{margin:0;padding:0;border:0;outline:0;line-height:1.3;text-decoration:none;font-size:100%;list-style:none}.ui-helper-clearfix:before,.ui-helper-clearfix:after{content:"";display:table;border-collapse:collapse}.ui-helper-clearfix:after{clear:both}.ui-helper-clearfix{min-height:0}.ui-helper-zfix{width:100%;height:100%;top:0;left:0;position:absolute;opacity:0;filter:Alpha(Opacity=0)}.ui-front{z-index:100}.ui-state-disabled{cursor:default!important}.ui-icon{display:block;text-indent:-99999px;overflow:hidden;background-repeat:no-repeat}.ui-widget-overlay{position:fixed;top:0;left:0;width:100%;height:100%}.ui-draggable-handle{-ms-touch-action:none;touch-action:none}.ui-resizable{position:relative}.ui-resizable-handle{position:absolute;font-size:0.1px;display:block;-ms-touch-action:none;touch-action:none}.ui-resizable-disabled .ui-resizable-handle,.ui-resizable-autohide .ui-resizable-handle{display:none}.ui-resizable-n{cursor:n-resize;height:7px;width:100%;top:-5px;left:0}.ui-resizable-s{cursor:s-resize;height:7px;width:100%;bottom:-5px;left:0}.ui-resizable-e{cursor:e-resize;width:7px;right:-5px;top:0;height:100%}.ui-resizable-w{cursor:w-resize;width:7px;left:-5px;top:0;height:100%}.ui-resizable-se{cursor:se-resize;width:12px;height:12px;right:1px;bottom:1px}.ui-resizable-sw{cursor:sw-resize;width:9px;height:9px;left:-5px;bottom:-5px}.ui-resizable-nw{cursor:nw-resize;width:9px;height:9px;left:-5px;top:-5px}.ui-resizable-ne{cursor:ne-resize;width:9px;height:9px;right:-5px;top:-5px}.ui-button{display:inline-block;position:relative;padding:0;line-height:normal;margin-right:.1em;cursor:pointer;vertical-align:middle;text-align:center;overflow:visible}.ui-button,.ui-button:link,.ui-button:visited,.ui-button:hover,.ui-button:active{text-decoration:none}.ui-button-icon-only{width:2.2em}button.ui-button-icon-only{width:2.4em}.ui-button-icons-only{width:3.4em}button.ui-button-icons-only{width:3.7em}.ui-button .ui-button-text{display:block;line-height:normal}.ui-button-text-only .ui-button-text{padding:.4em 1em}.ui-button-icon-only .ui-button-text,.ui-button-icons-only .ui-button-text{padding:.4em;text-indent:-9999999px}.ui-button-text-icon-primary .ui-button-text,.ui-button-text-icons .ui-button-text{padding:.4em 1em .4em 2.1em}.ui-button-text-icon-secondary .ui-button-text,.ui-button-text-icons .ui-button-text{padding:.4em 2.1em .4em 1em}.ui-button-text-icons .ui-button-text{padding-left:2.1em;padding-right:2.1em}input.ui-button{padding:.4em 1em}.ui-button-icon-only .ui-icon,.ui-button-text-icon-primary .ui-icon,.ui-button-text-icon-secondary .ui-icon,.ui-button-text-icons .ui-icon,.ui-button-icons-only .ui-icon{position:absolute;top:50%;margin-top:-8px}.ui-button-icon-only .ui-icon{left:50%;margin-left:-8px}.ui-button-text-icon-primary .ui-button-icon-primary,.ui-button-text-icons .ui-button-icon-primary,.ui-button-icons-only .ui-button-icon-primary{left:.5em}.ui-button-text-icon-secondary .ui-button-icon-secondary,.ui-button-text-icons .ui-button-icon-secondary,.ui-button-icons-only .ui-button-icon-secondary{right:.5em}.ui-buttonset{margin-right:7px}.ui-buttonset .ui-button{margin-left:0;margin-right:-.3em}input.ui-button::-moz-focus-inner,button.ui-button::-moz-focus-inner{border:0;padding:0}.ui-datepicker{width:17em;padding:.2em .2em 0;display:none}.ui-datepicker .ui-datepicker-header{position:relative;padding:.2em 0}.ui-datepicker .ui-datepicker-prev,.ui-datepicker .ui-datepicker-next{position:absolute;top:2px;width:1.8em;height:1.8em}.ui-datepicker .ui-datepicker-prev-hover,.ui-datepicker .ui-datepicker-next-hover{top:1px}.ui-datepicker .ui-datepicker-prev{left:2px}.ui-datepicker .ui-datepicker-next{right:2px}.ui-datepicker .ui-datepicker-prev-hover{left:1px}.ui-datepicker .ui-datepicker-next-hover{right:1px}.ui-datepicker .ui-datepicker-prev span,.ui-datepicker .ui-datepicker-next span{display:block;position:absolute;left:50%;margin-left:-8px;top:50%;margin-top:-8px}.ui-datepicker .ui-datepicker-title{margin:0 2.3em;line-height:1.8em;text-align:center}.ui-datepicker .ui-datepicker-title select{font-size:1em;margin:1px 0}.ui-datepicker select.ui-datepicker-month,.ui-datepicker select.ui-datepicker-year{width:45%}.ui-datepicker table{width:100%;font-size:.9em;border-collapse:collapse;margin:0 0 .4em}.ui-datepicker th{padding:.7em .3em;text-align:center;font-weight:bold;border:0}.ui-datepicker td{border:0;padding:1px}.ui-datepicker td span,.ui-datepicker td a{display:block;padding:.2em;text-align:right;text-decoration:none}.ui-datepicker .ui-datepicker-buttonpane{background-image:none;margin:.7em 0 0 0;padding:0 .2em;border-left:0;border-right:0;border-bottom:0}.ui-datepicker .ui-datepicker-buttonpane button{float:right;margin:.5em .2em .4em;cursor:pointer;padding:.2em .6em .3em .6em;width:auto;overflow:visible}.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current{float:left}.ui-datepicker.ui-datepicker-multi{width:auto}.ui-datepicker-multi .ui-datepicker-group{float:left}.ui-datepicker-multi .ui-datepicker-group table{width:95%;margin:0 auto .4em}.ui-datepicker-multi-2 .ui-datepicker-group{width:50%}.ui-datepicker-multi-3 .ui-datepicker-group{width:33.3%}.ui-datepicker-multi-4 .ui-datepicker-group{width:25%}.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header{border-left-width:0}.ui-datepicker-multi .ui-datepicker-buttonpane{clear:left}.ui-datepicker-row-break{clear:both;width:100%;font-size:0}.ui-datepicker-rtl{direction:rtl}.ui-datepicker-rtl .ui-datepicker-prev{right:2px;left:auto}.ui-datepicker-rtl .ui-datepicker-next{left:2px;right:auto}.ui-datepicker-rtl .ui-datepicker-prev:hover{right:1px;left:auto}.ui-datepicker-rtl .ui-datepicker-next:hover{left:1px;right:auto}.ui-datepicker-rtl .ui-datepicker-buttonpane{clear:right}.ui-datepicker-rtl .ui-datepicker-buttonpane button{float:left}.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current,.ui-datepicker-rtl .ui-datepicker-group{float:right}.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header,.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header{border-right-width:0;border-left-width:1px}.ui-dialog{overflow:hidden;position:absolute;top:0;left:0;padding:.2em;outline:0}.ui-dialog .ui-dialog-titlebar{padding:.4em 1em;position:relative}.ui-dialog .ui-dialog-title{float:left;margin:.1em 0;white-space:nowrap;width:90%;overflow:hidden;text-overflow:ellipsis}.ui-dialog .ui-dialog-titlebar-close{position:absolute;right:.3em;top:50%;width:20px;margin:-10px 0 0 0;padding:1px;height:20px}.ui-dialog .ui-dialog-content{position:relative;border:0;padding:.5em 1em;background:none;overflow:auto}.ui-dialog .ui-dialog-buttonpane{text-align:left;border-width:1px 0 0 0;background-image:none;margin-top:.5em;padding:.3em 1em .5em .4em}.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset{float:right}.ui-dialog .ui-dialog-buttonpane button{margin:.5em .4em .5em 0;cursor:pointer}.ui-dialog .ui-resizable-se{width:12px;height:12px;right:-5px;bottom:-5px;background-position:16px 16px}.ui-draggable .ui-dialog-titlebar{cursor:move}.ui-menu{list-style:none;padding:0;margin:0;display:block;outline:none}.ui-menu .ui-menu{position:absolute}.ui-menu .ui-menu-item{position:relative;margin:0;padding:3px 1em 3px .4em;cursor:pointer;min-height:0;list-style-image:url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7")}.ui-menu .ui-menu-divider{margin:5px 0;height:0;font-size:0;line-height:0;border-width:1px 0 0 0}.ui-menu .ui-state-focus,.ui-menu .ui-state-active{margin:-1px}.ui-menu-icons{position:relative}.ui-menu-icons .ui-menu-item{padding-left:2em}.ui-menu .ui-icon{position:absolute;top:0;bottom:0;left:.2em;margin:auto 0}.ui-menu .ui-menu-icon{left:auto;right:0}.ui-progressbar{height:2em;text-align:left;overflow:hidden}.ui-progressbar .ui-progressbar-value{margin:-1px;height:100%}.ui-progressbar .ui-progressbar-overlay{background:url("data:image/gif;base64,R0lGODlhKAAoAIABAAAAAP///yH/C05FVFNDQVBFMi4wAwEAAAAh+QQJAQABACwAAAAAKAAoAAACkYwNqXrdC52DS06a7MFZI+4FHBCKoDeWKXqymPqGqxvJrXZbMx7Ttc+w9XgU2FB3lOyQRWET2IFGiU9m1frDVpxZZc6bfHwv4c1YXP6k1Vdy292Fb6UkuvFtXpvWSzA+HycXJHUXiGYIiMg2R6W459gnWGfHNdjIqDWVqemH2ekpObkpOlppWUqZiqr6edqqWQAAIfkECQEAAQAsAAAAACgAKAAAApSMgZnGfaqcg1E2uuzDmmHUBR8Qil95hiPKqWn3aqtLsS18y7G1SzNeowWBENtQd+T1JktP05nzPTdJZlR6vUxNWWjV+vUWhWNkWFwxl9VpZRedYcflIOLafaa28XdsH/ynlcc1uPVDZxQIR0K25+cICCmoqCe5mGhZOfeYSUh5yJcJyrkZWWpaR8doJ2o4NYq62lAAACH5BAkBAAEALAAAAAAoACgAAAKVDI4Yy22ZnINRNqosw0Bv7i1gyHUkFj7oSaWlu3ovC8GxNso5fluz3qLVhBVeT/Lz7ZTHyxL5dDalQWPVOsQWtRnuwXaFTj9jVVh8pma9JjZ4zYSj5ZOyma7uuolffh+IR5aW97cHuBUXKGKXlKjn+DiHWMcYJah4N0lYCMlJOXipGRr5qdgoSTrqWSq6WFl2ypoaUAAAIfkECQEAAQAsAAAAACgAKAAAApaEb6HLgd/iO7FNWtcFWe+ufODGjRfoiJ2akShbueb0wtI50zm02pbvwfWEMWBQ1zKGlLIhskiEPm9R6vRXxV4ZzWT2yHOGpWMyorblKlNp8HmHEb/lCXjcW7bmtXP8Xt229OVWR1fod2eWqNfHuMjXCPkIGNileOiImVmCOEmoSfn3yXlJWmoHGhqp6ilYuWYpmTqKUgAAIfkECQEAAQAsAAAAACgAKAAAApiEH6kb58biQ3FNWtMFWW3eNVcojuFGfqnZqSebuS06w5V80/X02pKe8zFwP6EFWOT1lDFk8rGERh1TTNOocQ61Hm4Xm2VexUHpzjymViHrFbiELsefVrn6XKfnt2Q9G/+Xdie499XHd2g4h7ioOGhXGJboGAnXSBnoBwKYyfioubZJ2Hn0RuRZaflZOil56Zp6iioKSXpUAAAh+QQJAQABACwAAAAAKAAoAAACkoQRqRvnxuI7kU1a1UU5bd5tnSeOZXhmn5lWK3qNTWvRdQxP8qvaC+/yaYQzXO7BMvaUEmJRd3TsiMAgswmNYrSgZdYrTX6tSHGZO73ezuAw2uxuQ+BbeZfMxsexY35+/Qe4J1inV0g4x3WHuMhIl2jXOKT2Q+VU5fgoSUI52VfZyfkJGkha6jmY+aaYdirq+lQAACH5BAkBAAEALAAAAAAoACgAAAKWBIKpYe0L3YNKToqswUlvznigd4wiR4KhZrKt9Upqip61i9E3vMvxRdHlbEFiEXfk9YARYxOZZD6VQ2pUunBmtRXo1Lf8hMVVcNl8JafV38aM2/Fu5V16Bn63r6xt97j09+MXSFi4BniGFae3hzbH9+hYBzkpuUh5aZmHuanZOZgIuvbGiNeomCnaxxap2upaCZsq+1kAACH5BAkBAAEALAAAAAAoACgAAAKXjI8By5zf4kOxTVrXNVlv1X0d8IGZGKLnNpYtm8Lr9cqVeuOSvfOW79D9aDHizNhDJidFZhNydEahOaDH6nomtJjp1tutKoNWkvA6JqfRVLHU/QUfau9l2x7G54d1fl995xcIGAdXqMfBNadoYrhH+Mg2KBlpVpbluCiXmMnZ2Sh4GBqJ+ckIOqqJ6LmKSllZmsoq6wpQAAAh+QQJAQABACwAAAAAKAAoAAAClYx/oLvoxuJDkU1a1YUZbJ59nSd2ZXhWqbRa2/gF8Gu2DY3iqs7yrq+xBYEkYvFSM8aSSObE+ZgRl1BHFZNr7pRCavZ5BW2142hY3AN/zWtsmf12p9XxxFl2lpLn1rseztfXZjdIWIf2s5dItwjYKBgo9yg5pHgzJXTEeGlZuenpyPmpGQoKOWkYmSpaSnqKileI2FAAACH5BAkBAAEALAAAAAAoACgAAAKVjB+gu+jG4kORTVrVhRlsnn2dJ3ZleFaptFrb+CXmO9OozeL5VfP99HvAWhpiUdcwkpBH3825AwYdU8xTqlLGhtCosArKMpvfa1mMRae9VvWZfeB2XfPkeLmm18lUcBj+p5dnN8jXZ3YIGEhYuOUn45aoCDkp16hl5IjYJvjWKcnoGQpqyPlpOhr3aElaqrq56Bq7VAAAOw==");height:100%;filter:alpha(opacity=25);opacity:0.25}.ui-progressbar-indeterminate .ui-progressbar-value{background-image:none}.ui-selectmenu-menu{padding:0;margin:0;position:absolute;top:0;left:0;display:none}.ui-selectmenu-menu .ui-menu{overflow:auto;overflow-x:hidden;padding-bottom:1px}.ui-selectmenu-menu .ui-menu .ui-selectmenu-optgroup{font-size:1em;font-weight:bold;line-height:1.5;padding:2px 0.4em;margin:0.5em 0 0 0;height:auto;border:0}.ui-selectmenu-open{display:block}.ui-selectmenu-button{display:inline-block;overflow:hidden;position:relative;text-decoration:none;cursor:pointer}.ui-selectmenu-button span.ui-icon{right:0.5em;left:auto;margin-top:-8px;position:absolute;top:50%}.ui-selectmenu-button span.ui-selectmenu-text{text-align:left;padding:0.4em 2.1em 0.4em 1em;display:block;line-height:1.4;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.ui-slider{position:relative;text-align:left}.ui-slider .ui-slider-handle{position:absolute;z-index:2;width:1.2em;height:1.2em;cursor:default;-ms-touch-action:none;touch-action:none}.ui-slider .ui-slider-range{position:absolute;z-index:1;font-size:.7em;display:block;border:0;background-position:0 0}.ui-slider.ui-state-disabled .ui-slider-handle,.ui-slider.ui-state-disabled .ui-slider-range{filter:inherit}.ui-slider-horizontal{height:.8em}.ui-slider-horizontal .ui-slider-handle{top:-.3em;margin-left:-.6em}.ui-slider-horizontal .ui-slider-range{top:0;height:100%}.ui-slider-horizontal .ui-slider-range-min{left:0}.ui-slider-horizontal .ui-slider-range-max{right:0}.ui-slider-vertical{width:.8em;height:100px}.ui-slider-vertical .ui-slider-handle{left:-.3em;margin-left:0;margin-bottom:-.6em}.ui-slider-vertical .ui-slider-range{left:0;width:100%}.ui-slider-vertical .ui-slider-range-min{bottom:0}.ui-slider-vertical .ui-slider-range-max{top:0}.ui-spinner{position:relative;display:inline-block;overflow:hidden;padding:0;vertical-align:middle}.ui-spinner-input{border:none;background:none;color:inherit;padding:0;margin:.2em 0;vertical-align:middle;margin-left:.4em;margin-right:22px}.ui-spinner-button{width:16px;height:50%;font-size:.5em;padding:0;margin:0;text-align:center;position:absolute;cursor:default;display:block;overflow:hidden;right:0}.ui-spinner a.ui-spinner-button{border-top:none;border-bottom:none;border-right:none}.ui-spinner .ui-icon{position:absolute;margin-top:-8px;top:50%;left:0}.ui-spinner-up{top:0}.ui-spinner-down{bottom:0}.ui-spinner .ui-icon-triangle-1-s{background-position:-65px -16px}.ui-tabs{position:relative;padding:.2em}.ui-tabs .ui-tabs-nav{margin:0;padding:.2em .2em 0}.ui-tabs .ui-tabs-nav li{list-style:none;float:left;position:relative;top:0;margin:1px .2em 0 0;border-bottom-width:0;padding:0;white-space:nowrap}.ui-tabs .ui-tabs-nav .ui-tabs-anchor{float:left;padding:.5em 1em;text-decoration:none}.ui-tabs .ui-tabs-nav li.ui-tabs-active{margin-bottom:-1px;padding-bottom:1px}.ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor,.ui-tabs .ui-tabs-nav li.ui-state-disabled .ui-tabs-anchor,.ui-tabs .ui-tabs-nav li.ui-tabs-loading .ui-tabs-anchor{cursor:text}.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor{cursor:pointer}.ui-tabs .ui-tabs-panel{display:block;border-width:0;padding:1em 1.4em;background:none}.ui-tooltip{padding:8px;position:absolute;z-index:9999;max-width:300px;-webkit-box-shadow:0 0 5px #aaa;box-shadow:0 0 5px #aaa}body .ui-tooltip{border-width:2px}.ui-widget{font-family:Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;font-size:1.1em}.ui-widget .ui-widget{font-size:1em}.ui-widget input,.ui-widget select,.ui-widget textarea,.ui-widget button{font-family:Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;font-size:1em}.ui-widget-content{border:1px solid #ddd;background:#eee url("images/ui-bg_highlight-soft_100_eeeeee_1x100.png") 50% top repeat-x;color:#333}.ui-widget-content a{color:#333}.ui-widget-header{border:1px solid #e78f08;background:#f6a828 url("images/ui-bg_gloss-wave_35_f6a828_500x100.png") 50% 50% repeat-x;color:#fff;font-weight:bold}.ui-widget-header a{color:#fff}.ui-state-default,.ui-widget-content .ui-state-default,.ui-widget-header .ui-state-default{border:1px solid #ccc;background:#f6f6f6 url("images/ui-bg_glass_100_f6f6f6_1x400.png") 50% 50% repeat-x;font-weight:bold;color:#1c94c4}.ui-state-default a,.ui-state-default a:link,.ui-state-default a:visited{color:#1c94c4;text-decoration:none}.ui-state-hover,.ui-widget-content .ui-state-hover,.ui-widget-header .ui-state-hover,.ui-state-focus,.ui-widget-content .ui-state-focus,.ui-widget-header .ui-state-focus{border:1px solid #fbcb09;background:#fdf5ce url("images/ui-bg_glass_100_fdf5ce_1x400.png") 50% 50% repeat-x;font-weight:bold;color:#c77405}.ui-state-hover a,.ui-state-hover a:hover,.ui-state-hover a:link,.ui-state-hover a:visited,.ui-state-focus a,.ui-state-focus a:hover,.ui-state-focus a:link,.ui-state-focus a:visited{color:#c77405;text-decoration:none}.ui-state-active,.ui-widget-content .ui-state-active,.ui-widget-header .ui-state-active{border:1px solid #fbd850;background:#fff url("images/ui-bg_glass_65_ffffff_1x400.png") 50% 50% repeat-x;font-weight:bold;color:#eb8f00}.ui-state-active a,.ui-state-active a:link,.ui-state-active a:visited{color:#eb8f00;text-decoration:none}.ui-state-highlight,.ui-widget-content .ui-state-highlight,.ui-widget-header .ui-state-highlight{border:1px solid #fed22f;background:#ffe45c url("images/ui-bg_highlight-soft_75_ffe45c_1x100.png") 50% top repeat-x;color:#363636}.ui-state-highlight a,.ui-widget-content .ui-state-highlight a,.ui-widget-header .ui-state-highlight a{color:#363636}.ui-state-error,.ui-widget-content .ui-state-error,.ui-widget-header .ui-state-error{border:1px solid #cd0a0a;background:#b81900 url("images/ui-bg_diagonals-thick_18_b81900_40x40.png") 50% 50% repeat;color:#fff}.ui-state-error a,.ui-widget-content .ui-state-error a,.ui-widget-header .ui-state-error a{color:#fff}.ui-state-error-text,.ui-widget-content .ui-state-error-text,.ui-widget-header .ui-state-error-text{color:#fff}.ui-priority-primary,.ui-widget-content .ui-priority-primary,.ui-widget-header .ui-priority-primary{font-weight:bold}.ui-priority-secondary,.ui-widget-content .ui-priority-secondary,.ui-widget-header .ui-priority-secondary{opacity:.7;filter:Alpha(Opacity=70);font-weight:normal}.ui-state-disabled,.ui-widget-content .ui-state-disabled,.ui-widget-header .ui-state-disabled{opacity:.35;filter:Alpha(Opacity=35);background-image:none}.ui-state-disabled .ui-icon{filter:Alpha(Opacity=35)}.ui-icon{width:16px;height:16px}.ui-icon,.ui-widget-content .ui-icon{background-image:url("images/ui-icons_222222_256x240.png")}.ui-widget-header .ui-icon{background-image:url("images/ui-icons_ffffff_256x240.png")}.ui-state-default .ui-icon{background-image:url("images/ui-icons_ef8c08_256x240.png")}.ui-state-hover .ui-icon,.ui-state-focus .ui-icon{background-image:url("images/ui-icons_ef8c08_256x240.png")}.ui-state-active .ui-icon{background-image:url("images/ui-icons_ef8c08_256x240.png")}.ui-state-highlight .ui-icon{background-image:url("images/ui-icons_228ef1_256x240.png")}.ui-state-error .ui-icon,.ui-state-error-text .ui-icon{background-image:url("images/ui-icons_ffd27a_256x240.png")}.ui-icon-blank{background-position:16px 16px}.ui-icon-carat-1-n{background-position:0 0}.ui-icon-carat-1-ne{background-position:-16px 0}.ui-icon-carat-1-e{background-position:-32px 0}.ui-icon-carat-1-se{background-position:-48px 0}.ui-icon-carat-1-s{background-position:-64px 0}.ui-icon-carat-1-sw{background-position:-80px 0}.ui-icon-carat-1-w{background-position:-96px 0}.ui-icon-carat-1-nw{background-position:-112px 0}.ui-icon-carat-2-n-s{background-position:-128px 0}.ui-icon-carat-2-e-w{background-position:-144px 0}.ui-icon-triangle-1-n{background-position:0 -16px}.ui-icon-triangle-1-ne{background-position:-16px -16px}.ui-icon-triangle-1-e{background-position:-32px -16px}.ui-icon-triangle-1-se{background-position:-48px -16px}.ui-icon-triangle-1-s{background-position:-64px -16px}.ui-icon-triangle-1-sw{background-position:-80px -16px}.ui-icon-triangle-1-w{background-position:-96px -16px}.ui-icon-triangle-1-nw{background-position:-112px -16px}.ui-icon-triangle-2-n-s{background-position:-128px -16px}.ui-icon-triangle-2-e-w{background-position:-144px -16px}.ui-icon-arrow-1-n{background-position:0 -32px}.ui-icon-arrow-1-ne{background-position:-16px -32px}.ui-icon-arrow-1-e{background-position:-32px -32px}.ui-icon-arrow-1-se{background-position:-48px -32px}.ui-icon-arrow-1-s{background-position:-64px -32px}.ui-icon-arrow-1-sw{background-position:-80px -32px}.ui-icon-arrow-1-w{background-position:-96px -32px}.ui-icon-arrow-1-nw{background-position:-112px -32px}.ui-icon-arrow-2-n-s{background-position:-128px -32px}.ui-icon-arrow-2-ne-sw{background-position:-144px -32px}.ui-icon-arrow-2-e-w{background-position:-160px -32px}.ui-icon-arrow-2-se-nw{background-position:-176px -32px}.ui-icon-arrowstop-1-n{background-position:-192px -32px}.ui-icon-arrowstop-1-e{background-position:-208px -32px}.ui-icon-arrowstop-1-s{background-position:-224px -32px}.ui-icon-arrowstop-1-w{background-position:-240px -32px}.ui-icon-arrowthick-1-n{background-position:0 -48px}.ui-icon-arrowthick-1-ne{background-position:-16px -48px}.ui-icon-arrowthick-1-e{background-position:-32px -48px}.ui-icon-arrowthick-1-se{background-position:-48px -48px}.ui-icon-arrowthick-1-s{background-position:-64px -48px}.ui-icon-arrowthick-1-sw{background-position:-80px -48px}.ui-icon-arrowthick-1-w{background-position:-96px -48px}.ui-icon-arrowthick-1-nw{background-position:-112px -48px}.ui-icon-arrowthick-2-n-s{background-position:-128px -48px}.ui-icon-arrowthick-2-ne-sw{background-position:-144px -48px}.ui-icon-arrowthick-2-e-w{background-position:-160px -48px}.ui-icon-arrowthick-2-se-nw{background-position:-176px -48px}.ui-icon-arrowthickstop-1-n{background-position:-192px -48px}.ui-icon-arrowthickstop-1-e{background-position:-208px -48px}.ui-icon-arrowthickstop-1-s{background-position:-224px -48px}.ui-icon-arrowthickstop-1-w{background-position:-240px -48px}.ui-icon-arrowreturnthick-1-w{background-position:0 -64px}.ui-icon-arrowreturnthick-1-n{background-position:-16px -64px}.ui-icon-arrowreturnthick-1-e{background-position:-32px -64px}.ui-icon-arrowreturnthick-1-s{background-position:-48px -64px}.ui-icon-arrowreturn-1-w{background-position:-64px -64px}.ui-icon-arrowreturn-1-n{background-position:-80px -64px}.ui-icon-arrowreturn-1-e{background-position:-96px -64px}.ui-icon-arrowreturn-1-s{background-position:-112px -64px}.ui-icon-arrowrefresh-1-w{background-position:-128px -64px}.ui-icon-arrowrefresh-1-n{background-position:-144px -64px}.ui-icon-arrowrefresh-1-e{background-position:-160px -64px}.ui-icon-arrowrefresh-1-s{background-position:-176px -64px}.ui-icon-arrow-4{background-position:0 -80px}.ui-icon-arrow-4-diag{background-position:-16px -80px}.ui-icon-extlink{background-position:-32px -80px}.ui-icon-newwin{background-position:-48px -80px}.ui-icon-refresh{background-position:-64px -80px}.ui-icon-shuffle{background-position:-80px -80px}.ui-icon-transfer-e-w{background-position:-96px -80px}.ui-icon-transferthick-e-w{background-position:-112px -80px}.ui-icon-folder-collapsed{background-position:0 -96px}.ui-icon-folder-open{background-position:-16px -96px}.ui-icon-document{background-position:-32px -96px}.ui-icon-document-b{background-position:-48px -96px}.ui-icon-note{background-position:-64px -96px}.ui-icon-mail-closed{background-position:-80px -96px}.ui-icon-mail-open{background-position:-96px -96px}.ui-icon-suitcase{background-position:-112px -96px}.ui-icon-comment{background-position:-128px -96px}.ui-icon-person{background-position:-144px -96px}.ui-icon-print{background-position:-160px -96px}.ui-icon-trash{background-position:-176px -96px}.ui-icon-locked{background-position:-192px -96px}.ui-icon-unlocked{background-position:-208px -96px}.ui-icon-bookmark{background-position:-224px -96px}.ui-icon-tag{background-position:-240px -96px}.ui-icon-home{background-position:0 -112px}.ui-icon-flag{background-position:-16px -112px}.ui-icon-calendar{background-position:-32px -112px}.ui-icon-cart{background-position:-48px -112px}.ui-icon-pencil{background-position:-64px -112px}.ui-icon-clock{background-position:-80px -112px}.ui-icon-disk{background-position:-96px -112px}.ui-icon-calculator{background-position:-112px -112px}.ui-icon-zoomin{background-position:-128px -112px}.ui-icon-zoomout{background-position:-144px -112px}.ui-icon-search{background-position:-160px -112px}.ui-icon-wrench{background-position:-176px -112px}.ui-icon-gear{background-position:-192px -112px}.ui-icon-heart{background-position:-208px -112px}.ui-icon-star{background-position:-224px -112px}.ui-icon-link{background-position:-240px -112px}.ui-icon-cancel{background-position:0 -128px}.ui-icon-plus{background-position:-16px -128px}.ui-icon-plusthick{background-position:-32px -128px}.ui-icon-minus{background-position:-48px -128px}.ui-icon-minusthick{background-position:-64px -128px}.ui-icon-close{background-position:-80px -128px}.ui-icon-closethick{background-position:-96px -128px}.ui-icon-key{background-position:-112px -128px}.ui-icon-lightbulb{background-position:-128px -128px}.ui-icon-scissors{background-position:-144px -128px}.ui-icon-clipboard{background-position:-160px -128px}.ui-icon-copy{background-position:-176px -128px}.ui-icon-contact{background-position:-192px -128px}.ui-icon-image{background-position:-208px -128px}.ui-icon-video{background-position:-224px -128px}.ui-icon-script{background-position:-240px -128px}.ui-icon-alert{background-position:0 -144px}.ui-icon-info{background-position:-16px -144px}.ui-icon-notice{background-position:-32px -144px}.ui-icon-help{background-position:-48px -144px}.ui-icon-check{background-position:-64px -144px}.ui-icon-bullet{background-position:-80px -144px}.ui-icon-radio-on{background-position:-96px -144px}.ui-icon-radio-off{background-position:-112px -144px}.ui-icon-pin-w{background-position:-128px -144px}.ui-icon-pin-s{background-position:-144px -144px}.ui-icon-play{background-position:0 -160px}.ui-icon-pause{background-position:-16px -160px}.ui-icon-seek-next{background-position:-32px -160px}.ui-icon-seek-prev{background-position:-48px -160px}.ui-icon-seek-end{background-position:-64px -160px}.ui-icon-seek-start{background-position:-80px -160px}.ui-icon-seek-first{background-position:-80px -160px}.ui-icon-stop{background-position:-96px -160px}.ui-icon-eject{background-position:-112px -160px}.ui-icon-volume-off{background-position:-128px -160px}.ui-icon-volume-on{background-position:-144px -160px}.ui-icon-power{background-position:0 -176px}.ui-icon-signal-diag{background-position:-16px -176px}.ui-icon-signal{background-position:-32px -176px}.ui-icon-battery-0{background-position:-48px -176px}.ui-icon-battery-1{background-position:-64px -176px}.ui-icon-battery-2{background-position:-80px -176px}.ui-icon-battery-3{background-position:-96px -176px}.ui-icon-circle-plus{background-position:0 -192px}.ui-icon-circle-minus{background-position:-16px -192px}.ui-icon-circle-close{background-position:-32px -192px}.ui-icon-circle-triangle-e{background-position:-48px -192px}.ui-icon-circle-triangle-s{background-position:-64px -192px}.ui-icon-circle-triangle-w{background-position:-80px -192px}.ui-icon-circle-triangle-n{background-position:-96px -192px}.ui-icon-circle-arrow-e{background-position:-112px -192px}.ui-icon-circle-arrow-s{background-position:-128px -192px}.ui-icon-circle-arrow-w{background-position:-144px -192px}.ui-icon-circle-arrow-n{background-position:-160px -192px}.ui-icon-circle-zoomin{background-position:-176px -192px}.ui-icon-circle-zoomout{background-position:-192px -192px}.ui-icon-circle-check{background-position:-208px -192px}.ui-icon-circlesmall-plus{background-position:0 -208px}.ui-icon-circlesmall-minus{background-position:-16px -208px}.ui-icon-circlesmall-close{background-position:-32px -208px}.ui-icon-squaresmall-plus{background-position:-48px -208px}.ui-icon-squaresmall-minus{background-position:-64px -208px}.ui-icon-squaresmall-close{background-position:-80px -208px}.ui-icon-grip-dotted-vertical{background-position:0 -224px}.ui-icon-grip-dotted-horizontal{background-position:-16px -224px}.ui-icon-grip-solid-vertical{background-position:-32px -224px}.ui-icon-grip-solid-horizontal{background-position:-48px -224px}.ui-icon-gripsmall-diagonal-se{background-position:-64px -224px}.ui-icon-grip-diagonal-se{background-position:-80px -224px}.ui-corner-all,.ui-corner-top,.ui-corner-left,.ui-corner-tl{border-top-left-radius:4px}.ui-corner-all,.ui-corner-top,.ui-corner-right,.ui-corner-tr{border-top-right-radius:4px}.ui-corner-all,.ui-corner-bottom,.ui-corner-left,.ui-corner-bl{border-bottom-left-radius:4px}.ui-corner-all,.ui-corner-bottom,.ui-corner-right,.ui-corner-br{border-bottom-right-radius:4px}.ui-widget-overlay{background:#666 url("images/ui-bg_diagonals-thick_20_666666_40x40.png") 50% 50% repeat;opacity:.5;filter:Alpha(Opacity=50)}.ui-widget-shadow{margin:-5px 0 0 -5px;padding:5px;background:#000 url("images/ui-bg_flat_10_000000_40x100.png") 50% 50% repeat-x;opacity:.2;filter:Alpha(Opacity=20);border-radius:5px}







</style>




<div class="box">



<section>
          <!-- title row -->
       
            
                <div class="header-empresa">
<div class="row" style="margin-right: 0; margin-left: 0px;">
  

   
  <div class="col-xs-8 caja-empresa">
   <div class="col-xs-3" >
<div style="width:90px;">

  @if($perfil2->imagen == Null) 

  <img id="imagen" height="90" width="90" style="float:left; padding:10px;" class="img-circle" alt="Image" src="/images/producto.png"/>    
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
            <li><p>Telefono:</p> <br><span>{{$empresa->cod_pais}}-{{$empresa->cod_area}}-{{$empresa->telefono}}</span> </li>
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
         
            {{$empresa->descripcion}}
          
           
          </div>
          <!-- this row will not appear when printing -->
     
</section>





<hr>
    <div class="perfil-descripcion">
<h1>DETALLE EMPRESA </h1>
</div>



@if ($perfil->id == 1)


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


      </div>

@endif


@if ($perfil->id == 2)


<div style="padding-left:20px; padding-right:20px"><!--DEtalle comercio-->
   <div class="form-group row"><hr>
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Términos de Recogida</strong></label>
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

        <label class="col-md-4 control-label" for="nombre_producto"><strong>Moneda de Pago Solicitado</strong></label>
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


      </div>

@endif





@if ($perfil->id == 3)


<div style="padding-left:20px; padding-right:20px"><!--DEtalle comercio-->
 <br><br>
      <div class="form-group row">

        <label class="col-md-4 control-label" for="nombre_producto"><strong>Moneda de Pago Solicitado</strong></label>
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
      </div>

      <hr>
      <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Tipo de Pago Aceptado</strong></label>
        <div class="col-md-5">
        <br>
          <input title="Telegraphic Transfer / Transferencia Bancaria" disabled="1" type="checkbox" "@if($empresa->TT==1) checked @else @endif"  name="TT"  value="{{$empresa->TT}}" onclick="changeValueCheckbox(this)" ><label title="Telegraphic Transfer / Transferencia Bancaria" class="ancho-checkbox" for="check1" name="TT">T/T</label>
        <br>
          <input title="Letter  of Credit  / Credito Documentario
" disabled="1" type="checkbox" "@if($empresa->LC==1) checked @else @endif"  name="LC"  value="{{$empresa->LC}}" onclick="changeValueCheckbox(this)"><label title="Letter  of Credit  / Credito Documentario
" class="ancho-checkbox" for="check1" name="LC">L/C</label>
        <br>
          <input title="Documents Against Payment / Pago por anticipado" disabled="1" type="checkbox" "@if($empresa->DP==1) checked @else @endif" name="DP"  value="{{$empresa->DP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="DP">D/P</label>     
       
        <br>
                <input title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido.
" disabled="1" type="checkbox" "@if($empresa->DA==1) checked @else @endif" name="DP"  value="{{$empresa->DA}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="DP" title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido.
"> D/A</label>     
        </div>
       

      </div>




       <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Tipos de Transporte</strong></label>
        <div class="col-md-7">
          <input disabled="1" type="checkbox" "@if($empresa->SAE==1) checked @else @endif"  name="SAE"  value="{{$empresa->SAE}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SAE">Aéreo</label>
            <br>
          <input disabled="1" type="checkbox" "@if($empresa->STE==1) checked @else @endif"  name="STE"  value="{{$empresa->STE}}" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="STE">Terrestre</label>
            <br>
          <input disabled="1" type="checkbox" "@if($empresa->SMA==1) checked @else @endif" name="SMA"  value="{{$empresa->SMA}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMA">Marítimo</label> 
            <br>   
         <input  disabled="1" type="checkbox" "@if($empresa->SFL==1) checked @else @endif" name="SFL"  value="{{$empresa->SFL}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SFL"> Fluvial</label>   
           <br>
          <input  disabled="1" type="checkbox" "@if($empresa->SMU==1) checked @else @endif" name="SMU"  value="{{$empresa->SMU}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMU"> Multimodal</label> 
            <br> 
        </div>
      </div><hr>



        <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Servicios Adicionales</strong></label>
        <div class="col-md-7">
        <br>
          <input disabled="1" type="checkbox" "@if($empresa->SOL==1) checked @else @endif"  name="SOL"  value="{{$empresa->SOL}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SOL">Operadores Logísticos</label>
            <br>
          <input  disabled="1" type="checkbox" "@if($empresa->SA==1) checked @else @endif"  name="SA"  value="{{$empresa->SA}}" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="SA">Almacenamiento</label>
            <br>
          <input disabled="1" type="checkbox" "@if($empresa->SSIA==1) checked @else @endif" name="SSIA"  value="{{$empresa->SSIA}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSIA">Servicios de Intermediación Aduanera</label> 
            <br>   
         <input disabled="1" type="checkbox" "@if($empresa->SACCE==1) checked @else @endif" name="SACCE"  value="{{$empresa->SACCE}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SACCE"> Asesoría y consulta Comercio Exterior</label>   
           <br>

        </div>
      </div><hr>

            <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Especialidades</strong></label>
        <div class="col-md-7">
          <input disabled="1" type="checkbox" "@if($empresa->SAMP==1) checked @else @endif"  name="SAMP"  value="{{$empresa->SAMP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SAMP">Aislamiento de mercancías peligrosas</label>
            <br>
          <input disabled="1" type="checkbox" "@if($empresa->STAC==1) checked @else @endif"  name="STAC"  value="{{$empresa->STAC}}" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="STAC">Transporte Aéreo de cargo</label>
            <br>
          <input disabled="1" type="checkbox" "@if($empresa->STTC==1) checked @else @endif" name="STTC"  value="{{$empresa->STTC}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STTC">Transporte Terreste de Carga</label>    <br>
            
         <input disabled="1" type="checkbox" "@if($empresa->STMC==1) checked @else @endif" name="STMC"  value="{{$empresa->STMC}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STMC"> Transporte Marítimo Consolidado</label>   <br>  
         <input disabled="1" type="checkbox" "@if($empresa->STAI==1) checked @else @endif" name="STAI"  value="{{$empresa->STAI}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STAI"> Servicio de Transporte Aéreo Internacional</label>   <br>  
         <input disabled="1" type="checkbox" "@if($empresa->SSTAN==1) checked @else @endif" name="SSTAN"  value="{{$empresa->SSTAN}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSTAN"> Servicio de Transporte Aéreo Nacional</label>    <br> 


        </div>
      </div><hr>

</div>

@endif




@if ($perfil->id == 4)


<div style="padding-left:20px; padding-right:20px"><!--DEtalle comercio-->
 <br><br>
      <div class="form-group row">

        <label class="col-md-4 control-label" for="nombre_producto"><strong>Moneda de Pago</strong></label>
        <div class="col-md-7">
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
      </div>

      <hr>
      <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Tipo de Pago</strong></label>
        <div class="col-md-7">
        <br>
          <input title="Telegraphic Transfer / Transferencia Bancaria" disabled="1" type="checkbox" "@if($empresa->TT==1) checked @else @endif"  name="TT"  value="{{$empresa->TT}}" onclick="changeValueCheckbox(this)" ><label title="Telegraphic Transfer / Transferencia Bancaria" class="ancho-checkbox" for="check1" name="TT">T/T</label>
        <br>
          <input title="Letter  of Credit  / Credito Documentario
" disabled="1" type="checkbox" "@if($empresa->LC==1) checked @else @endif"  name="LC"  value="{{$empresa->LC}}" onclick="changeValueCheckbox(this)"><label title="Letter  of Credit  / Credito Documentario
" class="ancho-checkbox" for="check1" name="LC">L/C</label>
        <br>
          <input title="Documents Against Payment / Pago por anticipado" disabled="1" type="checkbox" "@if($empresa->DP==1) checked @else @endif" name="DP"  value="{{$empresa->DP}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="DP">D/P</label>     
       
        <br>
                <input title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido.
" disabled="1" type="checkbox" "@if($empresa->DA==1) checked @else @endif" name="DP"  value="{{$empresa->DA}}" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="DP" title="Documents Against Acceptance / Letra a Plazo o Con vencimiento establecido.
"> D/A</label>     
        </div>
       

      </div>




       <div class="form-group row">
        <label class="col-md-4 control-label" for="nombre_producto"><strong>Servicios</strong></label>
        <div class="col-md-7">
  <input disabled="1" type="checkbox" "@if($empresa->RIM==1) checked @else @endif"  name="RIM"  value="{{$empresa->RIM}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="RIM">Reconocimiento e inspección de Mercancía</label>
    <br>
          <input disabled="1" type="checkbox" "@if($empresa->CA==1) checked @else @endif"  name="CA"  value="{{$empresa->CA}}" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="CA">Clasificación arancelaria</label>
 <br>
          <input disabled="1"  type="checkbox" "@if($empresa->AT==1) checked @else @endif" name="AT"  value="{{$empresa->AT}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="AT">Asesoría técnica</label> 
 <br>
           <input disabled="1" type="checkbox" "@if($empresa->AJA==1) checked @else @endif" name="AJA"  value="{{$empresa->AJA}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="AJA">Asesoría Jurídica aduanera</label> 
 <br>
           <input  disabled="1" type="checkbox" "@if($empresa->BPZF==1) checked @else @endif" name="BPZF"  value="{{$empresa->BPZF}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="BPZF">Bodegas propias zona franca</label> 
           <br>
          <input  disabled="1" type="checkbox" "@if($empresa->DTCO==1) checked @else @endif" name="DTCO"  value="{{$empresa->DTCO}}" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="DTCO">Diligenciamiento y tramite certificado de origen</label> 

 <br>
            <br> 
        </div>
      </div><hr>



     

</div>

@endif










      <hr>
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

@if ($perfil->id == 1)
 @if($productos->count())



<div class="galeriaperfilproducto">
  <div class="row clearfix fondomiddle">
  <div class="tituloproductogaleria"><span class="list-item-descripcion"><b>Productos</b></span></div>
  <br>


</div>
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
                            <div class="text-blog thumb"> <a href="/{{$empresa->slug}}/producto/{{$galeria->id}}">{{$galeria->nombre}}</a></div> 
                     
                     
                             <div><span class="rating ">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span></div>
                            <div class="blog carrusel footer">  @if($galeria->pais)
              {{$galeria->pais->nombre}}
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
</div>
@endif
@endif

<!--GALERIA-->





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
