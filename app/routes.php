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
	// Completar registro empresa, get y post
	Route::get('{post}/registro','PerfilEmpresaController@Registro');
	Route::post('{post}/registro_basico','PerfilEmpresaController@postRegistroBasico');

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
	Route::post('{post}/interes_importador','ImportadorController@postIntereses');	

	// Obtiene el detalle de interes (para importador)  por el id
	Route::get('{post}/importador/interes/{id}','ImportadorController@interesById');
	
	// post para guardar los productos de interes para el transportador
	Route::post('{post}/interes_transportador','TransportadorController@postIntereses');	

	// Obtiene el detalle de interes (para importador)  por el id
	Route::get('{post}/transportador/interes/{id}','TransportadorController@interesById');

	// post para guardar la información comercial para las SIAS
	Route::post('{post}/info_sias','SiasController@postInfo');	

Route::get('api/producto.json', 'HomeController@productojson');




Route::get('api/filtropais/{id}', 'BusquedaController@filtropais', array('only' => 'show'));






});
