<?php

use App\Http\Controllers\Controller;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // check if email and password are not empty
        if (!empty($request->email) && !empty($request->password)) {
            $user = DB::table('users')->where('email', $request->email)->first();

            if ($user && password_verify($request->password, $user->password)) {
                session(['user_id' => $user->id]);
                return redirect()->route('dashboard');
            } else {
                // return error message or redirect to login page with error message
            }
        } else {
            // return error message or redirect to login page with error message
        }
    }

    // other methods for UserController
}


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <div class="login-box">
      <img src="{{ asset('img/emride_log_form.PNG') }}" class="avatar" alt="Avatar Image">
      <h1>Bienvenido</h1>
      <form action="{{ route('login') }}" method="POST">
        <!-- USERNAME INPUT -->
        <label for="username">Ususario</label>
        <input name="email" type="text" placeholder="Ingresa Tu Ususario">
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input name="password" type="password" placeholder="Ingresa tu Contraseña">
        <input type="submit" value="ENTRAR">
        @csrf
      </form>
    </div>
  </body>
</html>


// app/Http/Controllers/Auth/LoginController.php


// routes/web.php


