<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      
     ?>
      
     
     <?php
    } else {
      $message = 'Perdon, ocurrio un error con la creacion del usuario';
    }
  }
  else{
    
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


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <div class="Sing_up-box">
      <img src="img/book.jpg" class="avatar" alt="Avatar Image">
      <h1>HOLA :)</h1>
      <form action="singup.php" method="POST">
        <!-- USERNAME INPUT -->
        <label for="username">Ususario</label>
        <input name="email" type="text" placeholder="Ingresa Tu Ususario">
        <label for="email">Coreeo Electronico</label>
        <input type="text" placeholder="Ingresa Tu Coreeo">
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input name="password" type="password" placeholder="Ingresa tu Contraseña">
        <label for="password">Confirma tu contraseña</label>
        <input type="password" placeholder="Confirma tu contraseña">
        <input type="submit" value="Registrate :)">
        
        <a href="login.php">Ya tienes una cuenta?</a>
      </form>
    </div>
  </body>
</html>
