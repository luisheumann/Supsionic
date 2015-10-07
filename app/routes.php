<?php
Route::get('/','HomeController@index');

// filtro para no mostrar auth a user logueados
Route::when('login*', 'AuthSentry');

Route::get('login','LoginController@index');
Route::post('login','LoginController@postIndex');

Route::post('registro','LoginController@postRegistro');

Route::get('login/recuperar_password','LoginController@RecuperarPassword');
Route::post('login/recuperar_password','LoginController@postRecuperarPassword');

// nuevo password
Route::get('login/nuevo_password/{code}/{email}','LoginController@NuevoPassword');
Route::post('login/nuevo_password/','LoginController@postNuevoPassword');

// fin filtro Auth login

Route::group(array('before' => 'AuthSentryInv'), function()
{
	Route::get('salir','HomeController@salir');
	Route::get('busqueda','BusquedaController@index');
});

Route::get('upload/{id}', 'UploadController@index');
Route::get('upload/edit', 'UploadController@edit');

Route::post('upload/{id}', 'UploadController@postIndex');
Route::delete('upload/delete/{id}', 'UploadController@postDelete');


App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});


// perfil publico de la empresa
Route::get('{post}','PerfilEmpresaController@index');
Route::post('{post}/id/{empresaid}/relation/{relationid}','SocialController@join');
Route::post('{post}/id/{empresaid}/relation/{relationid}/unjoin','SocialController@unjoin');

// url para ver el detalle del producto
Route::get('{post}/productos/{producto}/{id}','ProductosController@ProductoBySlugId');

// Esto debe estar siempre al final
Route::group(array('before' => 'AuthSentryInv'), function()
{
	Route::get('{post}/login/pass','LoginController@NuevoPassword');
   Route::post('{post}/login/nuevo_password2/','LoginController@postNuevoPassword2');
	// Completar registro empresa, get y post
	Route::get('{post}/registro','PerfilEmpresaController@Registro');
	Route::post('{post}/registro_basico','PerfilEmpresaController@postRegistroBasico');

	Route::post('{post}/datos_basicos','PerfilEmpresaController@postRegistroDatosBasicos');

	// Post guarda el producto
	Route::post('{post}/producto_exportador','ProductosController@postRegistroProductoExportador');

	// Post cambia el perfil 
	Route::post('{post}/cambio_perfil','PerfilEmpresaController@getCambioPerfil');
	Route::get('api/buscar_cadena','BusquedaController@getBuscarCadena');

	// Obtiene todos los productos
	Route::get('{post}/productos','ProductosController@ProductosbyEmpresa');
	Route::get('productos/add','ProductosController@ProductoAdd');
	Route::get('{post}/producto/{id}','ProductosController@ProductoById');
	
	// post para guardar los productos de interes para el importador
	Route::get('{post}/interes_importador','ImportadorController@Interes');
	Route::get('{post}/interes_importador/lista','ImportadorController@Interes');
	Route::get('{post}/interes_importador/add','ImportadorController@InteresAdd');
	Route::get('{post}/interes_transportador/edit/{id}','TransportadorController@InteresEdit');
	Route::get('{post}/interes_transportador/delete/{id}','TransportadorController@InteresDelete');
	Route::get('{post}/interes_importador/delete/{id}','ImportadorController@InteresDelete');


	Route::post('{post}/interes_transportador/edit/interes_importador','ImportadorController@postIntereses');	
	Route::get('{post}/interes_importador/edit/{id}','ImportadorController@InteresEdit');
	Route::post('{post}/interes_importador/edit/interes_importador','ImportadorController@postIntereses');
	Route::post('{post}/interes_importador','ImportadorController@postIntereses');	
	Route::post('{post}/interes_importador/interes_importador','ImportadorController@postIntereses');	
	Route::get('{post}/importador/interes/{id}','ImportadorController@interesById');




	Route::post('{post}/interes_transportador/interes_importador','ImportadorController@postIntereses');
	Route::get('{post}/interes_transportador/lista','TransportadorController@Interes');
	Route::get('{post}/interes_transportador/add','TransportadorController@InteresAdd');	
	Route::get('{post}/interes_transportador','TransportadorController@Interes');
	Route::post('{post}/interes_transportador','TransportadorController@postIntereses');	
	
	Route::get('{post}/interes_transportador/interes/{id}','TransportadorController@interesById');

	Route::get('{post}/transportador/interesedit/{id}','TransportadorController@interesByIdedit');

	// post para guardar la información comercial para las SIAS

		
	Route::get('{post}/info_sias/lista','SiasController@interes');
	Route::post('{post}/info_sias/info_sias','SiasController@postInfo');	
	Route::post('{post}/info_sias','SiasController@postInfo');	
	Route::get('{post}/info_sias','SiasController@interes');	
	Route::get('{post}/info_sias/add','SiasController@InteresAdd');	
	Route::get('{post}/info_sias/edit/{id}','SiasController@InteresEdit');	
	Route::post('{post}/info_sias/edit/info_sias','SiasController@postInfo');
	Route::get('{post}/info_sias/interes/{id}','SiasController@interesById');

	Route::get('{post}/info_sias/delete/{id}','SiasController@InteresDelete');

	

Route::get('json/taxonomy', 'ImportadorController@taxonomy');



Route::get('json/taxonomy/search', 'ImportadorController@search');

Route::get('demo/index', 'FrontendController@index');
Route::get('demo/busqueda', 'FrontendController@busqueda');
Route::get('demo/producto', 'FrontendController@producto');
Route::get('demo/lista', 'FrontendController@lista');

Route::get('api/buscar_cadena2','FrontendController@busqueda2');
Route::get('{post}/admin/backend', 'AdminController@index');
Route::get('{post}/admin/perfil/basico', 'AdminController@basico');
Route::get('{post}/admin/perfil/empresa', 'AdminController@empresa');

Route::get('{post}/admin/producto/lista', 'AdminController@producto_lista');
Route::get('{post}/admin/producto/add', 'AdminController@producto_add');
Route::get('{post}/admin/producto/edit', 'AdminController@producto_edit');
Route::get('{post}/admin/cambio/pass', 'AdminController@cambiopass');

Route::get('admin/noticias/lista', 'NoticiasController@index');
Route::get('admin/noticias/editar/{id}', 'NoticiasController@editar');
Route::get('admin/noticias/editar', 'NoticiasController@editar');
Route::post('admin/noticias/editar/{id}', 'NoticiasController@editarpost');
Route::post('admin/noticias/editar', 'NoticiasController@editarpost');

Route::get('admin/noticias/{id}/delete', 'NoticiasController@eliminar');

Route::get('{post}/interes_importador2/delete/{id}','ImportadorController@InteresDelete2');
Route::get('{post}/admin/producto/delete2/{borra}','AdminController@producto_delete');
Route::post('{post}/admin/perfil/datos_basicos','PerfilEmpresaController@postRegistroDatosBasicos');
Route::post('{post}/admin/perfil/registro_basico','PerfilEmpresaController@postRegistroBasico');
Route::post('{post}/admin/perfil/datos_basicos_detalle','PerfilEmpresaController@postRegistroBasico2');
Route::post('{post}/admin/producto/producto_exportador','ProductosController@postRegistroProductoExportador');





Route::get('api/producto2.json', 'HomeController@productojson2');
Route::get('api/producto.json', 'HomeController@productojson');
Route::get('api/interes.json', 'HomeController@interesesjson');
Route::get('api/productoex.json', 'HomeController@productoexjson');
Route::get('api/filtropais/{id}', 'BusquedaController@filtropais', array('only' => 'show'));
Route::get('api/filtroregion/{producto}', 'BusquedaController@filtroregion', array('only' => 'show'));
Route::get('api/filtroregioninteres/{producto}', 'BusquedaController@filtroregioninteres', array('only' => 'show'));


});
