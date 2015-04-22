// Imagenes randon de fondo
$(function() {
	var totalCount = 2;
	var num = Math.ceil( Math.random() * totalCount );

    $('body').css({
    	'background-image': 'url(images/bg/' + num+'.jpg)',
    	'background-repeat': 'no-repeat',
    	'background-attachment': 'fixed',
    	'background-position': 'center'
    });
    totalCount--;
});