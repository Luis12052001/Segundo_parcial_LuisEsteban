<?php

  require 'database.php';

  $nombre = $_POST['nombre'];
  $tipousuario = $_POST['tipousuario'];

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (nombre, email, password, tipousuario) VALUES ('$nombre', :email, :password, '$tipousuario')";
    //echo $nombre;
    //echo $tipousuario;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //echo $password;
    $stmt->bindParam(':password', $password);

    //var_dump($stmt);
    if ($stmt->execute()) {
      $message = 'usuario registrado correctamente';
    } else {
      $message = 'Lo sentimos no se pudo registrar el usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Inicia sesion</a></span>

    <form action="signup.php" method="POST">
      <input name="nombre" type="text" placeholder="Ingresa tu nombre">
      <input name="email" type="email" placeholder="Ingresa tu correo">
      <input name="password" type="password" placeholder="Ingresa una contraseña">
      <input name="confirm_password" type="password" placeholder="Confirma la contraseña">
      <input name="tipousuario" type="text" placeholder="Ingresa el tipo de usuario, puede ser cualquier tipo">
      <input type="submit" value="Iniciar sesion">
    </form>

  </body>
</html>