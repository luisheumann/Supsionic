<?php

class LoginController extends \BaseController {

	public function index()
	{
		return View::make('login.index');
	}

	public function postValidaEmail()
	{
		$email = Input::get('email');
		try
		{
		    $user = Sentry::findUserByLogin($email);
		    return Response::json(['success'=>true]);
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return Response::json(['success'=>false]);
		}		
	}

	public function postIndex()
	{
		
		$input = Input::all();
		$reglas =  array(
			'email'    => 'required|email',
			'password' => 'required'
			);

	   $validation = Validator::make($input, $reglas);

       if ($validation->fails())
        {
            return Response::json([
            	'success'=>false, 
            	'errors'=>$validation->errors()->toArray()
            ]);
        }

		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		    );

		    // Authenticate the user
		    $user = Sentry::authenticateAndRemember($credentials);
		    return Response::json(['success'=>true]);
		}

		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			$error = array('usuario' => 'El usuario no existe' );
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    $error = array('usuario' => 'El usuario no está activado' );
		}

        return Response::json([
        	'success'=>false, 
        	'errors'=>$error
        ]);		

	}

	public function postRegistro()
	{
		$input = Input::all();
		$reglas =  array(
			'rol'	    => 'required',
			'nombre' 	=> 'required|unique:empresas', // nombre de la empresa
			'rol'	    => 'required',
			'usuario'	=> 'required',
			'email'     => 'required|email|unique:users',
			'password'  => 'required|min:3|confirmed',
        	'password_confirmation' => 'required|min:3'
		);
		$messages = array(
		    'nombre.unique' => 'El campo :attribute de la empresa ya fue tomado.',
		);		

	   $validation = Validator::make($input, $reglas, $messages);

       if ($validation->fails())
        {
            return Response::json([
            	'success'=>false, 
            	'errors'=>$validation->errors()->toArray()
            ]);
        }		

		try{
			// se guarda los datos del usuario	
		    $user = Sentry::register(array(
		    	'first_name' => Input::get('usuario'),
		    	'email'      => Input::get('email'),
		    	'last_name'      => Input::get('apellido'),
		    	'password'   => Input::get('password'),		    	
		        'activated'  => true,
		    ));
            $userId = $user -> getId();
			
			// Agregamos la empresa
            $empresa = new Empresa();
            $empresa->user_id = $userId;
            $empresa->nombre = Input::get('nombre');
              $empresa->email = Input::get('email');
            $empresa->save();

            // Agregamos el perfil_empresa

            $perfil_empresa = new PerfilEmpresa();
            $perfil_empresa->empresa_id = $empresa->id;
            $perfil_empresa->perfil_id = Input::get('rol');
            $perfil_empresa->estado = 1;
            $perfil_empresa->save();

            // Se autentica de una
            $user_login = Sentry::findUserById($userId);
            Sentry::login($user_login, false);

		    return Response::json(['success'=>true]);

		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			$error = array('usuario' => 'Email es requerido' );
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			$error = array('usuario' => 'Password es requerido' );
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			$error = array('usuario' => 'El Email ya está registrado' );		 
		}

        return Response::json([
        	'success'=>false, 
        	'errors'=>$error
        ]);		

	}

	
   public function RecuperarPassword()
   {
   		return View::make('login.recuperar_password');
   }

  public function postRecuperarPassword()
  {

	  $email = Input::get('email');

	    try {

	        $user = Sentry::findUserByLogin($email);
	        $resetCode = $user->getResetPasswordCode();
	        // Enviamos los datos de reset al cliente
			return Response::json(['success'=>true,'resetCode'=>$resetCode, 'email'=>$email]);
	    } 
	    catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {

	    	$error = array('usuario' => 'El Usuario no existe' );
	    	return Response::json([
	        	'success'=>false, 
	        	'errors'=>$error
        	]);		
	    }
   }

   public function NuevoPassword()
   {

   	 return View::make('login.nuevo_password');
   }




   public function postNuevoPassword2() 
   {


$input = Input::all();
		try
{
    // Find the user using the user id
    $user = Sentry::findUserById($this->user_id);

$pass = Input::get('pass');
    if($user->checkPassword($pass))
    {

    	
		$input = Input::all();
		$reglas =  array(
			'password'  		    => 'required|min:3|confirmed',
        	'password_confirmation' => 'required|min:3'
			);

	   $validation = Validator::make($input, $reglas);

       if ($validation->fails())
        {
            return Response::json([
            	'success'=>false, 
            	'errors'=>$validation->errors()->toArray()
            ]);
        }	
	
 try
{
    // Find the user using the user id
$input = Input::all();
   $iduser = Input::get('id');

    $user = Sentry::findUserById($iduser);

    // Update the user details
    $user->password = Input::get('password');
   


    // Update the user
    if ($user->save())
    {
        // User information was updated
    }
    else
    {
        // User information was not updated
    }
}
catch (Cartalyst\Sentry\Users\UserExistsException $e)
{
    echo 'User with this login already exists.';
}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
    echo 'User was not found.';
}


      

		return Response::json(['success'=>true]);

   }
    else
    {


return Redirect::to('admin.perfil.basicos')->withFlashMessage('Group Created Successfully.');
    }


}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
	
return Redirect::to('admin.perfil.basicos')->withFlashMessage('Group Created Successfully.');
}

}









   public function postNuevoPassword() 
   {

		$input = Input::all();
		$reglas =  array(
			'password'  		    => 'required|min:3|confirmed',
        	'password_confirmation' => 'required|min:3'
			);

	   $validation = Validator::make($input, $reglas);

       if ($validation->fails())
        {
            return Response::json([
            	'success'=>false, 
            	'errors'=>$validation->errors()->toArray()
            ]);
        }	
	
        try {
            // Find the user using the user id
            $email = Input::get('email');
            $code  = Input::get('code');
            $user = Sentry::findUserByLogin($email);

            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode($code)) {
                // Attempt to reset the user password
                if ($user->attemptResetPassword($code, Input::get('password'))) {
                    // Password reset passed
                    //return http_redirect()::to('login')->with('message', 'Password Change Ok');
                    return Response::json(['success'=>true]);
                } else {
                    // Password reset failed
                    $error = array('usuario' => 'No se puede cambiar el password' );
			    	return Response::json([
			        	'success'=>false, 
			        	'errors'=>$error
		        	]);	
                }
            }else {
                
                  $error = array('usuario' => 'No se puede cambiar el password codigo invalido' );
			    	return Response::json([
			        	'success'=>false, 
			        	'errors'=>$error
		        	]);	
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
          	$error = array('usuario' => 'El Usuario no existe' );
	    	return Response::json([
	        	'success'=>false, 
	        	'errors'=>$error
        	]);	
        }

		return Response::json(['success'=>true]);

   }

}
