<?php

  //session_start();

  include("templates/header.php");
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';
    if ($results && password_verify($_POST['password'], $results['password']))
    {
      $_SESSION['user_id'] = $results['id'];
      header("Location: .././Proyectos/index.php");
    } 
    else {
      //echo '<div class="error-message">Usuario o contraseña incorrectos. Por favor intente de nuevo.</div>';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="ccs/style1.css">
  </head>
  <body>
 

    <div class="login-box">
      <img src="img/emride_log_form.PNG" class="avatar" alt="Avatar Image">
      <h1>Bienvenido</h1>
      <form action="login.php" method="POST">
        <!-- USERNAME INPUT -->
        <label for="username">Ususario</label>
        <input name="email" type="text" placeholder="Ingresa Tu Ususario">
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input name="password" type="password" placeholder="Ingresa tu Contraseña">
        <input type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal" value="ENTRAR">
        
        
      </form>
    </div>
  </body>
</html>
