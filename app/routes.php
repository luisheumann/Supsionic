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


	// Obtiene el producto por el id
	Route::get('{post}/producto/{id}','ProductosController@ProductoById');
	
	// post para guardar los productos de interes para el importador

	Route::get('{post}/interes_importador','ImportadorController@Interes');

	Route::get('{post}/interes_importador/add','ImportadorController@InteresAdd');

	Route::get('{post}/interes_transportador/edit/{id}','TransportadorController@InteresEdit');
	Route::get('{post}/interes_transportador/delete/{id}','TransportadorController@InteresDelete');




	Route::post('{post}/interes_transportador/edit/interes_importador','ImportadorController@postIntereses');	


	Route::post('{post}/interes_importador','ImportadorController@postIntereses');	
	Route::post('{post}/interes_importador/interes_importador','ImportadorController@postIntereses');	

	// Obtiene el detalle de interes (para importador)  por el id
	Route::get('{post}/importador/interes/{id}','ImportadorController@interesById');
	
	// post para guardar los productos de interes para el transportador
		Route::get('{post}/interes_transportador/add','TransportadorController@InteresAdd');	
			Route::get('{post}/interes_transportador','TransportadorController@Interes');


	Route::post('{post}/interes_transportador','TransportadorController@postIntereses');	

	// Obtiene el detalle de interes (para importador)  por el id
	Route::get('{post}/transportador/interes/{id}','TransportadorController@interesById');

		Route::get('{post}/transportador/interesedit/{id}','TransportadorController@interesByIdedit');

	// post para guardar la información comercial para las SIAS
	Route::post('{post}/info_sias','SiasController@postInfo');	

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
