<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {
  $id = $_GET['id'];
}else{
   $id = 0;
}
 
  if (Sentry::check())

  {

    $user_id = Sentry::getuser()->id;

    
  

    $empresa = User::find($user_id)->empresas->first();
      $productos = Empresa::find($empresa->id)->productos;

    
     $interes2 = InteresesImportador::find($id);
     


  }

  else{

    $avatar = Recursos::ImgAvatar($perfil);

  }

   

?>

@extends('layouts/backend')

@section('content-header')


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
  width: 160px;
}

select#max_cantidad {
  width: 160px;
}

input[type="checkbox"] {
    margin: 5px;
}

form#form_importador {
    margin: 40px;
}

.col-md-6.a {
    margin-left: 0px;
    margin: 0px;
    /* padding: 0px; */
    padding-left: 0px;
    padding-right: 40px;
}


.ui-helper-hidden{display:none}.ui-helper-hidden-accessible{border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.ui-helper-reset{margin:0;padding:0;border:0;outline:0;line-height:1.3;text-decoration:none;font-size:100%;list-style:none}.ui-helper-clearfix:before,.ui-helper-clearfix:after{content:"";display:table;border-collapse:collapse}.ui-helper-clearfix:after{clear:both}.ui-helper-clearfix{min-height:0}.ui-helper-zfix{width:100%;height:100%;top:0;left:0;position:absolute;opacity:0;filter:Alpha(Opacity=0)}.ui-front{z-index:100}.ui-state-disabled{cursor:default!important}.ui-icon{display:block;text-indent:-99999px;overflow:hidden;background-repeat:no-repeat}.ui-widget-overlay{position:fixed;top:0;left:0;width:100%;height:100%}.ui-draggable-handle{-ms-touch-action:none;touch-action:none}.ui-resizable{position:relative}.ui-resizable-handle{position:absolute;font-size:0.1px;display:block;-ms-touch-action:none;touch-action:none}.ui-resizable-disabled .ui-resizable-handle,.ui-resizable-autohide .ui-resizable-handle{display:none}.ui-resizable-n{cursor:n-resize;height:7px;width:100%;top:-5px;left:0}.ui-resizable-s{cursor:s-resize;height:7px;width:100%;bottom:-5px;left:0}.ui-resizable-e{cursor:e-resize;width:7px;right:-5px;top:0;height:100%}.ui-resizable-w{cursor:w-resize;width:7px;left:-5px;top:0;height:100%}.ui-resizable-se{cursor:se-resize;width:12px;height:12px;right:1px;bottom:1px}.ui-resizable-sw{cursor:sw-resize;width:9px;height:9px;left:-5px;bottom:-5px}.ui-resizable-nw{cursor:nw-resize;width:9px;height:9px;left:-5px;top:-5px}.ui-resizable-ne{cursor:ne-resize;width:9px;height:9px;right:-5px;top:-5px}.ui-button{display:inline-block;position:relative;padding:0;line-height:normal;margin-right:.1em;cursor:pointer;vertical-align:middle;text-align:center;overflow:visible}.ui-button,.ui-button:link,.ui-button:visited,.ui-button:hover,.ui-button:active{text-decoration:none}.ui-button-icon-only{width:2.2em}button.ui-button-icon-only{width:2.4em}.ui-button-icons-only{width:3.4em}button.ui-button-icons-only{width:3.7em}.ui-button .ui-button-text{display:block;line-height:normal}.ui-button-text-only .ui-button-text{padding:.4em 1em}.ui-button-icon-only .ui-button-text,.ui-button-icons-only .ui-button-text{padding:.4em;text-indent:-9999999px}.ui-button-text-icon-primary .ui-button-text,.ui-button-text-icons .ui-button-text{padding:.4em 1em .4em 2.1em}.ui-button-text-icon-secondary .ui-button-text,.ui-button-text-icons .ui-button-text{padding:.4em 2.1em .4em 1em}.ui-button-text-icons .ui-button-text{padding-left:2.1em;padding-right:2.1em}input.ui-button{padding:.4em 1em}.ui-button-icon-only .ui-icon,.ui-button-text-icon-primary .ui-icon,.ui-button-text-icon-secondary .ui-icon,.ui-button-text-icons .ui-icon,.ui-button-icons-only .ui-icon{position:absolute;top:50%;margin-top:-8px}.ui-button-icon-only .ui-icon{left:50%;margin-left:-8px}.ui-button-text-icon-primary .ui-button-icon-primary,.ui-button-text-icons .ui-button-icon-primary,.ui-button-icons-only .ui-button-icon-primary{left:.5em}.ui-button-text-icon-secondary .ui-button-icon-secondary,.ui-button-text-icons .ui-button-icon-secondary,.ui-button-icons-only .ui-button-icon-secondary{right:.5em}.ui-buttonset{margin-right:7px}.ui-buttonset .ui-button{margin-left:0;margin-right:-.3em}input.ui-button::-moz-focus-inner,button.ui-button::-moz-focus-inner{border:0;padding:0}.ui-datepicker{width:17em;padding:.2em .2em 0;display:none}.ui-datepicker .ui-datepicker-header{position:relative;padding:.2em 0}.ui-datepicker .ui-datepicker-prev,.ui-datepicker .ui-datepicker-next{position:absolute;top:2px;width:1.8em;height:1.8em}.ui-datepicker .ui-datepicker-prev-hover,.ui-datepicker .ui-datepicker-next-hover{top:1px}.ui-datepicker .ui-datepicker-prev{left:2px}.ui-datepicker .ui-datepicker-next{right:2px}.ui-datepicker .ui-datepicker-prev-hover{left:1px}.ui-datepicker .ui-datepicker-next-hover{right:1px}.ui-datepicker .ui-datepicker-prev span,.ui-datepicker .ui-datepicker-next span{display:block;position:absolute;left:50%;margin-left:-8px;top:50%;margin-top:-8px}.ui-datepicker .ui-datepicker-title{margin:0 2.3em;line-height:1.8em;text-align:center}.ui-datepicker .ui-datepicker-title select{font-size:1em;margin:1px 0}.ui-datepicker select.ui-datepicker-month,.ui-datepicker select.ui-datepicker-year{width:45%}.ui-datepicker table{width:100%;font-size:.9em;border-collapse:collapse;margin:0 0 .4em}.ui-datepicker th{padding:.7em .3em;text-align:center;font-weight:bold;border:0}.ui-datepicker td{border:0;padding:1px}.ui-datepicker td span,.ui-datepicker td a{display:block;padding:.2em;text-align:right;text-decoration:none}.ui-datepicker .ui-datepicker-buttonpane{background-image:none;margin:.7em 0 0 0;padding:0 .2em;border-left:0;border-right:0;border-bottom:0}.ui-datepicker .ui-datepicker-buttonpane button{float:right;margin:.5em .2em .4em;cursor:pointer;padding:.2em .6em .3em .6em;width:auto;overflow:visible}.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current{float:left}.ui-datepicker.ui-datepicker-multi{width:auto}.ui-datepicker-multi .ui-datepicker-group{float:left}.ui-datepicker-multi .ui-datepicker-group table{width:95%;margin:0 auto .4em}.ui-datepicker-multi-2 .ui-datepicker-group{width:50%}.ui-datepicker-multi-3 .ui-datepicker-group{width:33.3%}.ui-datepicker-multi-4 .ui-datepicker-group{width:25%}.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header{border-left-width:0}.ui-datepicker-multi .ui-datepicker-buttonpane{clear:left}.ui-datepicker-row-break{clear:both;width:100%;font-size:0}.ui-datepicker-rtl{direction:rtl}.ui-datepicker-rtl .ui-datepicker-prev{right:2px;left:auto}.ui-datepicker-rtl .ui-datepicker-next{left:2px;right:auto}.ui-datepicker-rtl .ui-datepicker-prev:hover{right:1px;left:auto}.ui-datepicker-rtl .ui-datepicker-next:hover{left:1px;right:auto}.ui-datepicker-rtl .ui-datepicker-buttonpane{clear:right}.ui-datepicker-rtl .ui-datepicker-buttonpane button{float:left}.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current,.ui-datepicker-rtl .ui-datepicker-group{float:right}.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header,.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header{border-right-width:0;border-left-width:1px}.ui-dialog{overflow:hidden;position:absolute;top:0;left:0;padding:.2em;outline:0}.ui-dialog .ui-dialog-titlebar{padding:.4em 1em;position:relative}.ui-dialog .ui-dialog-title{float:left;margin:.1em 0;white-space:nowrap;width:90%;overflow:hidden;text-overflow:ellipsis}.ui-dialog .ui-dialog-titlebar-close{position:absolute;right:.3em;top:50%;width:20px;margin:-10px 0 0 0;padding:1px;height:20px}.ui-dialog .ui-dialog-content{position:relative;border:0;padding:.5em 1em;background:none;overflow:auto}.ui-dialog .ui-dialog-buttonpane{text-align:left;border-width:1px 0 0 0;background-image:none;margin-top:.5em;padding:.3em 1em .5em .4em}.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset{float:right}.ui-dialog .ui-dialog-buttonpane button{margin:.5em .4em .5em 0;cursor:pointer}.ui-dialog .ui-resizable-se{width:12px;height:12px;right:-5px;bottom:-5px;background-position:16px 16px}.ui-draggable .ui-dialog-titlebar{cursor:move}.ui-menu{list-style:none;padding:0;margin:0;display:block;outline:none}.ui-menu .ui-menu{position:absolute}.ui-menu .ui-menu-item{position:relative;margin:0;padding:3px 1em 3px .4em;cursor:pointer;min-height:0;list-style-image:url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7")}.ui-menu .ui-menu-divider{margin:5px 0;height:0;font-size:0;line-height:0;border-width:1px 0 0 0}.ui-menu .ui-state-focus,.ui-menu .ui-state-active{margin:-1px}.ui-menu-icons{position:relative}.ui-menu-icons .ui-menu-item{padding-left:2em}.ui-menu .ui-icon{position:absolute;top:0;bottom:0;left:.2em;margin:auto 0}.ui-menu .ui-menu-icon{left:auto;right:0}.ui-progressbar{height:2em;text-align:left;overflow:hidden}.ui-progressbar .ui-progressbar-value{margin:-1px;height:100%}.ui-progressbar .ui-progressbar-overlay{background:url("data:image/gif;base64,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");height:100%;filter:alpha(opacity=25);opacity:0.25}.ui-progressbar-indeterminate .ui-progressbar-value{background-image:none}.ui-selectmenu-menu{padding:0;margin:0;position:absolute;top:0;left:0;display:none}.ui-selectmenu-menu .ui-menu{overflow:auto;overflow-x:hidden;padding-bottom:1px}.ui-selectmenu-menu .ui-menu .ui-selectmenu-optgroup{font-size:1em;font-weight:bold;line-height:1.5;padding:2px 0.4em;margin:0.5em 0 0 0;height:auto;border:0}.ui-selectmenu-open{display:block}.ui-selectmenu-button{display:inline-block;overflow:hidden;position:relative;text-decoration:none;cursor:pointer}.ui-selectmenu-button span.ui-icon{right:0.5em;left:auto;margin-top:-8px;position:absolute;top:50%}.ui-selectmenu-button span.ui-selectmenu-text{text-align:left;padding:0.4em 2.1em 0.4em 1em;display:block;line-height:1.4;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.ui-slider{position:relative;text-align:left}.ui-slider .ui-slider-handle{position:absolute;z-index:2;width:1.2em;height:1.2em;cursor:default;-ms-touch-action:none;touch-action:none}.ui-slider .ui-slider-range{position:absolute;z-index:1;font-size:.7em;display:block;border:0;background-position:0 0}.ui-slider.ui-state-disabled .ui-slider-handle,.ui-slider.ui-state-disabled .ui-slider-range{filter:inherit}.ui-slider-horizontal{height:.8em}.ui-slider-horizontal .ui-slider-handle{top:-.3em;margin-left:-.6em}.ui-slider-horizontal .ui-slider-range{top:0;height:100%}.ui-slider-horizontal .ui-slider-range-min{left:0}.ui-slider-horizontal .ui-slider-range-max{right:0}.ui-slider-vertical{width:.8em;height:100px}.ui-slider-vertical .ui-slider-handle{left:-.3em;margin-left:0;margin-bottom:-.6em}.ui-slider-vertical .ui-slider-range{left:0;width:100%}.ui-slider-vertical .ui-slider-range-min{bottom:0}.ui-slider-vertical .ui-slider-range-max{top:0}.ui-spinner{position:relative;display:inline-block;overflow:hidden;padding:0;vertical-align:middle}.ui-spinner-input{border:none;background:none;color:inherit;padding:0;margin:.2em 0;vertical-align:middle;margin-left:.4em;margin-right:22px}.ui-spinner-button{width:16px;height:50%;font-size:.5em;padding:0;margin:0;text-align:center;position:absolute;cursor:default;display:block;overflow:hidden;right:0}.ui-spinner a.ui-spinner-button{border-top:none;border-bottom:none;border-right:none}.ui-spinner .ui-icon{position:absolute;margin-top:-8px;top:50%;left:0}.ui-spinner-up{top:0}.ui-spinner-down{bottom:0}.ui-spinner .ui-icon-triangle-1-s{background-position:-65px -16px}.ui-tabs{position:relative;padding:.2em}.ui-tabs .ui-tabs-nav{margin:0;padding:.2em .2em 0}.ui-tabs .ui-tabs-nav li{list-style:none;float:left;position:relative;top:0;margin:1px .2em 0 0;border-bottom-width:0;padding:0;white-space:nowrap}.ui-tabs .ui-tabs-nav .ui-tabs-anchor{float:left;padding:.5em 1em;text-decoration:none}.ui-tabs .ui-tabs-nav li.ui-tabs-active{margin-bottom:-1px;padding-bottom:1px}.ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor,.ui-tabs .ui-tabs-nav li.ui-state-disabled .ui-tabs-anchor,.ui-tabs .ui-tabs-nav li.ui-tabs-loading .ui-tabs-anchor{cursor:text}.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor{cursor:pointer}.ui-tabs .ui-tabs-panel{display:block;border-width:0;padding:1em 1.4em;background:none}.ui-tooltip{padding:8px;position:absolute;z-index:9999;max-width:300px;-webkit-box-shadow:0 0 5px #aaa;box-shadow:0 0 5px #aaa}body .ui-tooltip{border-width:2px}.ui-widget{font-family:Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;font-size:1.1em}.ui-widget .ui-widget{font-size:1em}.ui-widget input,.ui-widget select,.ui-widget textarea,.ui-widget button{font-family:Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;font-size:1em}.ui-widget-content{border:1px solid #ddd;background:#eee url("images/ui-bg_highlight-soft_100_eeeeee_1x100.png") 50% top repeat-x;color:#333}.ui-widget-content a{color:#333}.ui-widget-header{border:1px solid #e78f08;background:#f6a828 url("images/ui-bg_gloss-wave_35_f6a828_500x100.png") 50% 50% repeat-x;color:#fff;font-weight:bold}.ui-widget-header a{color:#fff}.ui-state-default,.ui-widget-content .ui-state-default,.ui-widget-header .ui-state-default{border:1px solid #ccc;background:#f6f6f6 url("images/ui-bg_glass_100_f6f6f6_1x400.png") 50% 50% repeat-x;font-weight:bold;color:#1c94c4}.ui-state-default a,.ui-state-default a:link,.ui-state-default a:visited{color:#1c94c4;text-decoration:none}.ui-state-hover,.ui-widget-content .ui-state-hover,.ui-widget-header .ui-state-hover,.ui-state-focus,.ui-widget-content .ui-state-focus,.ui-widget-header .ui-state-focus{border:1px solid #fbcb09;background:#fdf5ce url("images/ui-bg_glass_100_fdf5ce_1x400.png") 50% 50% repeat-x;font-weight:bold;color:#c77405}.ui-state-hover a,.ui-state-hover a:hover,.ui-state-hover a:link,.ui-state-hover a:visited,.ui-state-focus a,.ui-state-focus a:hover,.ui-state-focus a:link,.ui-state-focus a:visited{color:#c77405;text-decoration:none}.ui-state-active,.ui-widget-content .ui-state-active,.ui-widget-header .ui-state-active{border:1px solid #fbd850;background:#fff url("images/ui-bg_glass_65_ffffff_1x400.png") 50% 50% repeat-x;font-weight:bold;color:#eb8f00}.ui-state-active a,.ui-state-active a:link,.ui-state-active a:visited{color:#eb8f00;text-decoration:none}.ui-state-highlight,.ui-widget-content .ui-state-highlight,.ui-widget-header .ui-state-highlight{border:1px solid #fed22f;background:#ffe45c url("images/ui-bg_highlight-soft_75_ffe45c_1x100.png") 50% top repeat-x;color:#363636}.ui-state-highlight a,.ui-widget-content .ui-state-highlight a,.ui-widget-header .ui-state-highlight a{color:#363636}.ui-state-error,.ui-widget-content .ui-state-error,.ui-widget-header .ui-state-error{border:1px solid #cd0a0a;background:#b81900 url("images/ui-bg_diagonals-thick_18_b81900_40x40.png") 50% 50% repeat;color:#fff}.ui-state-error a,.ui-widget-content .ui-state-error a,.ui-widget-header .ui-state-error a{color:#fff}.ui-state-error-text,.ui-widget-content .ui-state-error-text,.ui-widget-header .ui-state-error-text{color:#fff}.ui-priority-primary,.ui-widget-content .ui-priority-primary,.ui-widget-header .ui-priority-primary{font-weight:bold}.ui-priority-secondary,.ui-widget-content .ui-priority-secondary,.ui-widget-header .ui-priority-secondary{opacity:.7;filter:Alpha(Opacity=70);font-weight:normal}.ui-state-disabled,.ui-widget-content .ui-state-disabled,.ui-widget-header .ui-state-disabled{opacity:.35;filter:Alpha(Opacity=35);background-image:none}.ui-state-disabled .ui-icon{filter:Alpha(Opacity=35)}.ui-icon{width:16px;height:16px}.ui-icon,.ui-widget-content .ui-icon{background-image:url("images/ui-icons_222222_256x240.png")}.ui-widget-header .ui-icon{background-image:url("images/ui-icons_ffffff_256x240.png")}.ui-state-default .ui-icon{background-image:url("images/ui-icons_ef8c08_256x240.png")}.ui-state-hover .ui-icon,.ui-state-focus .ui-icon{background-image:url("images/ui-icons_ef8c08_256x240.png")}.ui-state-active .ui-icon{background-image:url("images/ui-icons_ef8c08_256x240.png")}.ui-state-highlight .ui-icon{background-image:url("images/ui-icons_228ef1_256x240.png")}.ui-state-error .ui-icon,.ui-state-error-text .ui-icon{background-image:url("images/ui-icons_ffd27a_256x240.png")}.ui-icon-blank{background-position:16px 16px}.ui-icon-carat-1-n{background-position:0 0}.ui-icon-carat-1-ne{background-position:-16px 0}.ui-icon-carat-1-e{background-position:-32px 0}.ui-icon-carat-1-se{background-position:-48px 0}.ui-icon-carat-1-s{background-position:-64px 0}.ui-icon-carat-1-sw{background-position:-80px 0}.ui-icon-carat-1-w{background-position:-96px 0}.ui-icon-carat-1-nw{background-position:-112px 0}.ui-icon-carat-2-n-s{background-position:-128px 0}.ui-icon-carat-2-e-w{background-position:-144px 0}.ui-icon-triangle-1-n{background-position:0 -16px}.ui-icon-triangle-1-ne{background-position:-16px -16px}.ui-icon-triangle-1-e{background-position:-32px -16px}.ui-icon-triangle-1-se{background-position:-48px -16px}.ui-icon-triangle-1-s{background-position:-64px -16px}.ui-icon-triangle-1-sw{background-position:-80px -16px}.ui-icon-triangle-1-w{background-position:-96px -16px}.ui-icon-triangle-1-nw{background-position:-112px -16px}.ui-icon-triangle-2-n-s{background-position:-128px -16px}.ui-icon-triangle-2-e-w{background-position:-144px -16px}.ui-icon-arrow-1-n{background-position:0 -32px}.ui-icon-arrow-1-ne{background-position:-16px -32px}.ui-icon-arrow-1-e{background-position:-32px -32px}.ui-icon-arrow-1-se{background-position:-48px -32px}.ui-icon-arrow-1-s{background-position:-64px -32px}.ui-icon-arrow-1-sw{background-position:-80px -32px}.ui-icon-arrow-1-w{background-position:-96px -32px}.ui-icon-arrow-1-nw{background-position:-112px -32px}.ui-icon-arrow-2-n-s{background-position:-128px -32px}.ui-icon-arrow-2-ne-sw{background-position:-144px -32px}.ui-icon-arrow-2-e-w{background-position:-160px -32px}.ui-icon-arrow-2-se-nw{background-position:-176px -32px}.ui-icon-arrowstop-1-n{background-position:-192px -32px}.ui-icon-arrowstop-1-e{background-position:-208px -32px}.ui-icon-arrowstop-1-s{background-position:-224px -32px}.ui-icon-arrowstop-1-w{background-position:-240px -32px}.ui-icon-arrowthick-1-n{background-position:0 -48px}.ui-icon-arrowthick-1-ne{background-position:-16px -48px}.ui-icon-arrowthick-1-e{background-position:-32px -48px}.ui-icon-arrowthick-1-se{background-position:-48px -48px}.ui-icon-arrowthick-1-s{background-position:-64px -48px}.ui-icon-arrowthick-1-sw{background-position:-80px -48px}.ui-icon-arrowthick-1-w{background-position:-96px -48px}.ui-icon-arrowthick-1-nw{background-position:-112px -48px}.ui-icon-arrowthick-2-n-s{background-position:-128px -48px}.ui-icon-arrowthick-2-ne-sw{background-position:-144px -48px}.ui-icon-arrowthick-2-e-w{background-position:-160px -48px}.ui-icon-arrowthick-2-se-nw{background-position:-176px -48px}.ui-icon-arrowthickstop-1-n{background-position:-192px -48px}.ui-icon-arrowthickstop-1-e{background-position:-208px -48px}.ui-icon-arrowthickstop-1-s{background-position:-224px -48px}.ui-icon-arrowthickstop-1-w{background-position:-240px -48px}.ui-icon-arrowreturnthick-1-w{background-position:0 -64px}.ui-icon-arrowreturnthick-1-n{background-position:-16px -64px}.ui-icon-arrowreturnthick-1-e{background-position:-32px -64px}.ui-icon-arrowreturnthick-1-s{background-position:-48px -64px}.ui-icon-arrowreturn-1-w{background-position:-64px -64px}.ui-icon-arrowreturn-1-n{background-position:-80px -64px}.ui-icon-arrowreturn-1-e{background-position:-96px -64px}.ui-icon-arrowreturn-1-s{background-position:-112px -64px}.ui-icon-arrowrefresh-1-w{background-position:-128px -64px}.ui-icon-arrowrefresh-1-n{background-position:-144px -64px}.ui-icon-arrowrefresh-1-e{background-position:-160px -64px}.ui-icon-arrowrefresh-1-s{background-position:-176px -64px}.ui-icon-arrow-4{background-position:0 -80px}.ui-icon-arrow-4-diag{background-position:-16px -80px}.ui-icon-extlink{background-position:-32px -80px}.ui-icon-newwin{background-position:-48px -80px}.ui-icon-refresh{background-position:-64px -80px}.ui-icon-shuffle{background-position:-80px -80px}.ui-icon-transfer-e-w{background-position:-96px -80px}.ui-icon-transferthick-e-w{background-position:-112px -80px}.ui-icon-folder-collapsed{background-position:0 -96px}.ui-icon-folder-open{background-position:-16px -96px}.ui-icon-document{background-position:-32px -96px}.ui-icon-document-b{background-position:-48px -96px}.ui-icon-note{background-position:-64px -96px}.ui-icon-mail-closed{background-position:-80px -96px}.ui-icon-mail-open{background-position:-96px -96px}.ui-icon-suitcase{background-position:-112px -96px}.ui-icon-comment{background-position:-128px -96px}.ui-icon-person{background-position:-144px -96px}.ui-icon-print{background-position:-160px -96px}.ui-icon-trash{background-position:-176px -96px}.ui-icon-locked{background-position:-192px -96px}.ui-icon-unlocked{background-position:-208px -96px}.ui-icon-bookmark{background-position:-224px -96px}.ui-icon-tag{background-position:-240px -96px}.ui-icon-home{background-position:0 -112px}.ui-icon-flag{background-position:-16px -112px}.ui-icon-calendar{background-position:-32px -112px}.ui-icon-cart{background-position:-48px -112px}.ui-icon-pencil{background-position:-64px -112px}.ui-icon-clock{background-position:-80px -112px}.ui-icon-disk{background-position:-96px -112px}.ui-icon-calculator{background-position:-112px -112px}.ui-icon-zoomin{background-position:-128px -112px}.ui-icon-zoomout{background-position:-144px -112px}.ui-icon-search{background-position:-160px -112px}.ui-icon-wrench{background-position:-176px -112px}.ui-icon-gear{background-position:-192px -112px}.ui-icon-heart{background-position:-208px -112px}.ui-icon-star{background-position:-224px -112px}.ui-icon-link{background-position:-240px -112px}.ui-icon-cancel{background-position:0 -128px}.ui-icon-plus{background-position:-16px -128px}.ui-icon-plusthick{background-position:-32px -128px}.ui-icon-minus{background-position:-48px -128px}.ui-icon-minusthick{background-position:-64px -128px}.ui-icon-close{background-position:-80px -128px}.ui-icon-closethick{background-position:-96px -128px}.ui-icon-key{background-position:-112px -128px}.ui-icon-lightbulb{background-position:-128px -128px}.ui-icon-scissors{background-position:-144px -128px}.ui-icon-clipboard{background-position:-160px -128px}.ui-icon-copy{background-position:-176px -128px}.ui-icon-contact{background-position:-192px -128px}.ui-icon-image{background-position:-208px -128px}.ui-icon-video{background-position:-224px -128px}.ui-icon-script{background-position:-240px -128px}.ui-icon-alert{background-position:0 -144px}.ui-icon-info{background-position:-16px -144px}.ui-icon-notice{background-position:-32px -144px}.ui-icon-help{background-position:-48px -144px}.ui-icon-check{background-position:-64px -144px}.ui-icon-bullet{background-position:-80px -144px}.ui-icon-radio-on{background-position:-96px -144px}.ui-icon-radio-off{background-position:-112px -144px}.ui-icon-pin-w{background-position:-128px -144px}.ui-icon-pin-s{background-position:-144px -144px}.ui-icon-play{background-position:0 -160px}.ui-icon-pause{background-position:-16px -160px}.ui-icon-seek-next{background-position:-32px -160px}.ui-icon-seek-prev{background-position:-48px -160px}.ui-icon-seek-end{background-position:-64px -160px}.ui-icon-seek-start{background-position:-80px -160px}.ui-icon-seek-first{background-position:-80px -160px}.ui-icon-stop{background-position:-96px -160px}.ui-icon-eject{background-position:-112px -160px}.ui-icon-volume-off{background-position:-128px -160px}.ui-icon-volume-on{background-position:-144px -160px}.ui-icon-power{background-position:0 -176px}.ui-icon-signal-diag{background-position:-16px -176px}.ui-icon-signal{background-position:-32px -176px}.ui-icon-battery-0{background-position:-48px -176px}.ui-icon-battery-1{background-position:-64px -176px}.ui-icon-battery-2{background-position:-80px -176px}.ui-icon-battery-3{background-position:-96px -176px}.ui-icon-circle-plus{background-position:0 -192px}.ui-icon-circle-minus{background-position:-16px -192px}.ui-icon-circle-close{background-position:-32px -192px}.ui-icon-circle-triangle-e{background-position:-48px -192px}.ui-icon-circle-triangle-s{background-position:-64px -192px}.ui-icon-circle-triangle-w{background-position:-80px -192px}.ui-icon-circle-triangle-n{background-position:-96px -192px}.ui-icon-circle-arrow-e{background-position:-112px -192px}.ui-icon-circle-arrow-s{background-position:-128px -192px}.ui-icon-circle-arrow-w{background-position:-144px -192px}.ui-icon-circle-arrow-n{background-position:-160px -192px}.ui-icon-circle-zoomin{background-position:-176px -192px}.ui-icon-circle-zoomout{background-position:-192px -192px}.ui-icon-circle-check{background-position:-208px -192px}.ui-icon-circlesmall-plus{background-position:0 -208px}.ui-icon-circlesmall-minus{background-position:-16px -208px}.ui-icon-circlesmall-close{background-position:-32px -208px}.ui-icon-squaresmall-plus{background-position:-48px -208px}.ui-icon-squaresmall-minus{background-position:-64px -208px}.ui-icon-squaresmall-close{background-position:-80px -208px}.ui-icon-grip-dotted-vertical{background-position:0 -224px}.ui-icon-grip-dotted-horizontal{background-position:-16px -224px}.ui-icon-grip-solid-vertical{background-position:-32px -224px}.ui-icon-grip-solid-horizontal{background-position:-48px -224px}.ui-icon-gripsmall-diagonal-se{background-position:-64px -224px}.ui-icon-grip-diagonal-se{background-position:-80px -224px}.ui-corner-all,.ui-corner-top,.ui-corner-left,.ui-corner-tl{border-top-left-radius:4px}.ui-corner-all,.ui-corner-top,.ui-corner-right,.ui-corner-tr{border-top-right-radius:4px}.ui-corner-all,.ui-corner-bottom,.ui-corner-left,.ui-corner-bl{border-bottom-left-radius:4px}.ui-corner-all,.ui-corner-bottom,.ui-corner-right,.ui-corner-br{border-bottom-right-radius:4px}.ui-widget-overlay{background:#666 url("images/ui-bg_diagonals-thick_20_666666_40x40.png") 50% 50% repeat;opacity:.5;filter:Alpha(Opacity=50)}.ui-widget-shadow{margin:-5px 0 0 -5px;padding:5px;background:#000 url("images/ui-bg_flat_10_000000_40x100.png") 50% 50% repeat-x;opacity:.2;filter:Alpha(Opacity=20);border-radius:5px}



section.content {
    margin: 0px;
    margin-left: 50px !important;
    margin-right: 50px !important;
    padding-bottom: 145px;
}


</style>

 <h1>
            Dashboard
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li class="active">Interes</li>
          </ol>
@stop



@section('content')



<div class="contenedoredit">
<form class="form-horizontal" id="form_importador">
   <input type="hidden" class="form-control" id="id" name="id" value="{{$interes->id}}"> 





<input type="hidden" class="form-control" id="id" name="id" value="{{$interes->id}}"> 

<br>
    <legend class="legenda"><strong>Información Básica</strong></legend>
    <br>
 <input type="hidden" name="valoroculto" id="valoroculto" value="" />
    <input type="hidden" id="categoria" name="categoria" />  
 <input type="hidden" id="padre11" name="shijo1" />
    <input type="hidden" id="hijo11" name="shijo2" />
    <input type="hidden" id="nieto1"  name="shijo3"/>
    <input type="hidden" id="bisnieto11" name="shijo4" />
    <input type="hidden" id="tataranieto11" name="shijo5" />
    <input type="hidden" id="tatataranieto11" name="shijo6" />




      <div class="form-group"><label class="testinputcategoria">Categoria</label><br>
       <div class="categoriamanual">



          <label for="testinput-buscador">Por palabra clave:</label>
          <input style="width: 200px" type="text" id="testinput" value="" /> 

  


          <button type="button"  id="testid" 
          onclick="updateInput(this.value)" 
          value="" title="Aceptar">Aceptar</button>
           <input disabled class="testinput-buscador-path" type="text" id="buscador-path" value="" /><br> 

      </div>


  <!--    <label class="testinput-buscador-select">Seleccion manual:</label>
      <div class="listacategoria"> 
       <input type="hidden" name="demo7" />
       <div class="results" id="demo7-result"></div>

   </div>

   <code><pre>

   </pre></code>-->

</div>




  <div class="row">
  
    <div class="col-md-12">
      <div class="form-group">
        <label for="productos">
           Descripción adicional del interés:<br>
            <strong>
              <em><span id="view_cate"></span></em>
            </strong>
        </label>
        <textarea name="productos" class="form-control" id="productos" rows="4" placeholder="productos de interés"  >{{$interes->productos}}</textarea>
      </div>
    </div>  
 </div>
  <hr>




   <div class="row">  
     
    <div class="col-md-12 a">
      <div class="form-group">
         <div class="col-md-4">
    <b>Cantidad Minima</b><br>
        <input title="Valor 0 es ilimitado por defecto" placeholder="0" type="text" class="form-control" id="min" name="min" value="{{$interes->min}}"> 
    </div>

      <div class="col-md-4">
        <b> Cantidad Maxima</b><br>
          <input title="Valor 0 es ilimitado por defecto" placeholder="0" type="text" class="form-control" id="max" name="max" value="{{$interes->max}}">
         </div>
<div class="col-md-4">
 <b> Unidad</b><br>
        <select name="min_cantidad" id="min_cantidad" class="form-control">
          <option value="">Seleccione...</option> 
          @foreach($unidades as $unidade)
          <option value="{{$unidade->id}}">{{$unidade->nombre}}</option>
          @endforeach
        </select>
</div>

      </div>
    </div>  
  </div>

  <hr>

 <div class="row">

   <b>Partida arancelaria.</b><br>
    
    <div class="col-md-12">
      <div class="form-group">
        
        <input type="text" class="form-control" id="partida" name="partida" value="{{$interes->partida}}"> 



      </div>
    </div>  
</div>

  <hr>

   








 <div class="row">
  
    <div class="col-md-12">
      <div class="form-group">
        <label for="pais_origen">País de Destino</label>
        <select name="pais_destino" id="pais_destino" class="form-control">
          <option value="" >Seleccione...</option>
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
</div>
       <div class="row">
    
     <div class="col-md-12">
      <div class="form-group">
        <label for="selec_paises">Paises de Origen </label><br>
           <select id="selec_paises"  name="origenes[]" multiple="multiple">
            @foreach($paises as $pais)
              <option value="{{$pais->id}}">{{$pais->nombre}}</option>
            @endforeach 
          </select>
       </div>
    </div>
 </div>
  <hr>

<!--
 <div class="row">

        <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Tipos de Transporte</strong></label>
        <div class="col-md-6">
          <input type="checkbox"   name="SAE" "@if($interes->SAE==1) checked @else @endif"  onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SAE">Aéreo</label>
            <br>
          <input type="checkbox"   name="STE"  "@if($interes->STE==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-checkbox" for="check1" name="STE">Terrestre</label>
            <br>
          <input type="checkbox"  name="SMA"  "@if($interes->SMA==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMA">Marítimo</label> 
            <br>   
         <input type="checkbox"  name="SFL" "@if($interes->SFL==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SFL"> Fluvial</label>   
           <br>
          <input type="checkbox"  name="SMU"  "@if($interes->SMU==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-checkbox" for="check1" name="SMU"> Multimodal</label> 
            <br> 
        </div>
      </div><hr>
</div>

 <div class="row">

        <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Servicios Adicionales</strong></label>
        <div class="col-md-6">
        <br>
          <input type="checkbox"   name="SOL"  "@if($interes->SOL==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SOL">Operadores Logísticos</label>
            <br>
          <input type="checkbox"   name="SA"  "@if($interes->SA==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="SA">Almacenamiento</label>
            <br>
          <input type="checkbox"  name="SSIA"  "@if($interes->SSIA==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSIA">Servicios de Intermediación Aduanera</label> 
            <br>   
         <input type="checkbox"  name="SACCE"  "@if($interes->SACCE==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SACCE"> Asesoría y consulta Comercio Exterior</label>   
           <br>

        </div>
      </div>

      </div>
      <hr>

       <div class="row">

            <div class="form-group ">
        <label class="col-md-6 control-label" for="nombre_producto"><strong>Especialidades</strong></label>
        <div class="col-md-6">
          <input type="checkbox"  name="SAMP"  "@if($interes->SAMP==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SAMP">Aislamiento de mercancías peligrosas</label>
            <br>
          <input type="checkbox"   name="STAC"  "@if($interes->STAC==1) checked @else @endif" onclick="changeValueCheckbox(this)"><label class="ancho-largo-checkbox" for="check1" name="STAC">Transporte Aéreo de cargo</label>
            <br>
          <input type="checkbox"  name="STTC"  "@if($interes->STTC==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STTC">Transporte Terreste de Carga</label>    <br>
            
         <input type="checkbox"  name="STMC"  "@if($interes->STMC==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STMC"> Transporte Marítimo Consolidado</label>   <br>  
         <input type="checkbox"  name="STAI"  "@if($interes->STAI==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="STAI"> Servicio de Transporte Aéreo Internacional</label>   <br>  
         <input type="checkbox"  name="SSTAN"  "@if($interes->SSTAN==1) checked @else @endif" onclick="changeValueCheckbox(this)" ><label class="ancho-largo-checkbox" for="check1" name="SSTAN"> Servicio de Transporte Aéreo Nacional</label>    <br> 


        </div>
      </div>
</div>
      <hr>

-->




  <!-- Loader -->
  <div align="center">
    <img src="{{asset('images/load.gif')}}" id="load_import" style="display:none">  
  </div>

  <!-- Mensaje de errores -->
  <div class="alert alert-danger danger" id="alerta_import" style="display:none">
    <ul></ul>
  </div> 
 
  
  <div align="center">

    <button class="btn btn-success" id="btn_import"><i class="fa fa-check"></i> ACTUALIZAR</button>

    <a href="/{{$empresa->slug}}/interes_transportador" class="btn btn-info"> <i class="fa fa-close"></i>CERRAR</a>

   


  </div>

  </form>

</div>





<style type="text/css">

input#buscador-path {
        border: 0px;
    width: 90%;
    color: #666;
    margin: 12px;
    background-color: #D6D6D6;
    font-weight: bold;
}
    .form-group.multipais {
    margin-left: 10px !important;
    /* width: 100%; */
}

    hr {
    margin-top: 7px;
    margin-bottom: 7px;
    border: 0;
    border-top: 1px solid #eee;
}


    label.testinputcategoria {
    padding-left: 6px;
}

    .categoriamanual {
    background-color: #DDD;
    margin: 5px;
    padding: 10px;
}


    .listacategoria{
    background-color: #DDD;
        margin: 5px;
    padding: 10px
}


    section.content {
    margin: 0px;
    margin-left: 50px !important;
    margin-right: 50px !important;
        padding-bottom: 145px;
}

ul.multiselect-container.dropdown-menu {
    padding: 5px;
}


select[name=demo7______] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
  

}

select[name=demo7_____] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
   
}

select[name=demo7____] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
 
}


select[name=demo7___] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;

}


select[name=demo7__] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
   
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    margin-right: 10px;
    
}

select[name=demo7_] {    

   
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#484646;
    
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
     margin-right: 10px;
    
}


label.testinput-buscador-select {
    padding-left: 5px;
}



</style>


@stop


<!-- Finaliza el render de la pagina -->

@stop

@section('scripts')
@parent



<script type="text/javascript">



var values= "<?foreach ($rutas as $ruta) {$resultstr[] = $ruta->pais_origen;}$result = implode(",",$resultstr);echo $result;?>"
$.each(values.split(","), function(i,e){
    $("#selec_paises option[value='" + e + "']").prop("selected", true);
});


var pais_destino  = <?php echo $rutas[0]->pais_destino ?>;




var min_cantidad = <?php echo $interes->min_medida ?>;
var max_cantidad = <?php echo $interes->max_medida ?>;

var frecuencia = <?php echo $interes->frecuencia ?>;



document.getElementById("pais_destino").value = pais_destino;

document.getElementById("min_cantidad").value = min_cantidad;
document.getElementById("max_cantidad").value = max_cantidad;

document.getElementById("frecuencia").value = frecuencia;


  function changeValueCheckbox(element){

 
  

   if(element.checked){
    element.value='1';
    
 
  }else{
    element.value='0';
    
  }
}



</script>


{{HTML::script('/api/tree/jquery.optionTree.js')}}
  {{HTML::script('/js/autocomplete.js')}}
  {{HTML::script('js/importador.js')}}
  {{HTML::script('js/bootstrap-multiselect.js')}}
  {{HTML::script('js/jasny-bootstrap.min.js')}}




 
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>




 <script type="text/javascript">
    function updateInput(ish){

      var url = window.location.href; 

      ///var url2 = url.substring(0, url.length-1);

var url2 = url;
  

  var pordefecto = document.getElementById('testid').value;
if( !pordefecto == ""){
if (url2.indexOf('?') > -1){
       url2 += '&param='+ document.getElementById('testid').value
     }else{
       url2 += '?param='+ document.getElementById('testid').value
     }


}else{

  if (url2.indexOf('?') > -1){
       url2 += '&param='+ "<?php echo $categorianame->id; ?>" ;
     }else{
       url2 += '?param='+ "<?php echo $categorianame->id; ?>" ;
     }
}
      window.location.href = url2;
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



var categoryselect = [porNombre, hijo1, hijo2,hijo3,hijo4,hijo5];

 document.getElementById("categoria_producto2").value = categoryselect;




     



            var labels = []; // initialize array
            $(this).siblings('select') // find all select

                           .find(':selected') // and their current options
                           
                             .each(function() { labels.push($(this).text()); }); // and add option text to array
            $('<div>').text(this.value + ':' + labels.join(' > ')).appendTo('#demo7-result'); 

                       
             // and display the labels
   

          }

    $.getJSON('/api/tree/get-subtree.php', function(tree) { // initialize the tree by loading the file first
      $('input[name=demo7]').optionTree(tree, options).change(displayParents);


    });

  });


</script>


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
  $id = Taxonomy::where('id',$param)->first();
}else{
  $param = 0;

  $id = Taxonomy::where('id',$categorias_select->categoria_id)->first();
}



if( !$id == null){
$nombreCat = $id->name;
$nombrePath = $id->path;
}else{
$nombreCat = null;
$nombrePath = null;
}

if( !$id == null){
  $id = $id->id;
}else{
  $id = null;
}
if (!$id == null) {
  $id1 = Taxonomy::where('id', $id)
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
  $id2 = Taxonomy::where('id', $id1->parent)
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
  $id3 = Taxonomy::where('id', $id2->parent)->select('parent')->first();

  if(!$id3 == null){
    $valorid3 = $id3->parent;
  }else{
    $valorid3 = null;
  }
}else{
  $valorid3 = null;

}
if (!$id3 == null) {
  $id4 = Taxonomy::where('id', $id3->parent)->select('parent')->first();

  if(!$id4 == null){
    $valorid4 = $id4->parent;
  }else{
    $valorid4 = null;
  }
}else{

 $valorid4 = null;
}

if (!$id4 == null) {
  $id5 = Taxonomy::where('id', $id4->parent)->select('parent')->first();

  if(!$id5 == null){
    $valorid5 = $id5->parent;
  }else{
    $valorid5 = null;
  }
}else{
  $valorid5 = null;
}


if (!$id5 == null) {
  $id6 = Taxonomy::where('id', $id5->parent)->select('parent')->first();

  if(!$id6 == null){
    $valorid6 = $id6->parent;
  }else{
    $valorid6 = null;
  }

}else{
 $valorid6 = null;

}


if (isset($_GET["param"]) && !empty($_GET["param"])) {
  $param2 = $_GET['param'];
}else{
  $param2 = 0;
}
?>

<script>
  

var parametro = "<?php echo $param2; ?>" ;




  if(parametro == 0) {
      var testinput = "<?php echo $categorianame->name; ?>" ;
      var testinputpath = "<?php echo $categorianame->path; ?>" ;

  var testinput =document.getElementById('testinput').value = testinput; 

    var testinputpath =document.getElementById('buscador-path').value = testinputpath; 


}else{
  var testinput = "<?php echo $nombreCat; ?>" ;
  var testinputpath = "<?php echo $nombrePath; ?>" ;

  var testinput =document.getElementById('testinput').value = testinput; 
  var testinputpath =document.getElementById('buscador-path').value = testinputpath; 

}

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

var tips = document.getElementById("valoroculto").value = "<?php echo $categorianame->id; ?>" ;
var tips2 = document.getElementById("categoria").value = "<?php echo $categorianame->id; ?>" ;

</script>


@stop

@section('estilos')
@parent
  {{HTML::style('css/jasny-bootstrap.min.css')}}
  {{HTML::style('css/bootstrap-multiselect.css')}}
     <link rel="stylesheet" href="/css/autocomplete.css" type="text/css" media="screen" charset="utf-8" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
@stop
