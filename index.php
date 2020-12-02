<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
  <title>Evaluación Integradora</title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <header>
    <h1>Bienvenido a la evaluación integradora del curso Programación web con PHP y MYSQL</h1>
  </header>
  <section class="cuerpo">
    <?php

    //Mensajes errores de login en pantalla

    if (isset($_GET['wronguser'])) {
      echo '<span>No hay una cuenta registrada con ese usuario.</span>';
    }

    if (isset($_GET['wrongpass'])) {
      echo '<span>La contraseña ingresada es incorrecta.</span>';
    }

    if (isset($_GET['nouser'])) {
      echo '<span>Ingrese un nombre de usuario.</span>';
    }

    if (isset($_GET['nopass'])) {
      echo '<span>Ingrese una contraseña.</span>';
    }

    ?>
<?php if(isset($_GET['registro'])){
  if (isset($_GET['usedus'])) {
    echo "<span>Ya existe una cuenta con ese nombre de usuario.</span>";
  }
  echo '<section>
    <div class="form">
      <form action="insertar_usuarios.php" method="POST" class="form_1">
        <div>
          <label>Usuario</label>
          <input type="text" name="usuario" maxlength="20" pattern="[a-zA-Z0-9]+" required>
        </div>
        <div>
          <label>Contraseña</label>
          <input type="password" name="clave" pattern="[a-zA-Z0-9]+" required>
        </div>
        <div>
          <label>Nombre</label>
          <input type="text" name="nombre" maxlength="30" required>
        </div>
        <div>
          <label>Apellido</label>
          <input type="text" name="apellido" maxlength="40" required>
        </div>
        <div>
          <label>Edad</label>
          <input type="number" name="edad" min="18" max="120">
        </div>
        <div>
          <label>Email</label>
          <input type="email" name="email" maxlength="50" required>
        </div>
        <div>
          <label>Sitio Web</label>
          <input type="text" name="sitio_web">
        </div>
        <div>
          <button type="submit">Registrarme</button>
        </div>
  </section>
  <section>
    <div>
      <a href="index.php?login" class="link">Iniciar sesión</a>
    </div>
  </section>';}
  elseif (isset($_GET['succes'])) {
    echo '<h2>Se ha registrado exitosamente. Ahora puede iniciar sesión.</h2><a href="index.php?login" class="link">Iniciar sesión</a>';
  }
  elseif (isset($_GET['login'])) {
    echo '<section>
      <div class="form">
        <form action="session.php" method="POST" class="form_1">
          <div>
            <label>Usuario</label>
            <input type="text" name="user" maxlength="20" pattern="[a-zA-Z0-9]+">
          </div>
          <div>
            <label>Contraseña</label>
            <input type="password" name="pass">
          </div>
          <div>
            <button type="submit">Iniciar sesión</button>
          </div>
    </section>
    <section>
      <div>
        <span>No está registrado? <a href="index.php?registro" class="link">Registrese aquí</a></span>
      </div>
    </section>';
  }
  else{
    echo '<section>
      <div class="form">
        <form action="session.php" method="POST" class="form_1">
          <div>
            <label>Usuario</label>
            <input type="text" name="user" maxlength="20" pattern="[a-zA-Z0-9]+">
          </div>
          <div>
            <label>Contraseña</label>
            <input type="password" name="pass">
          </div>
          <div>
            <button type="submit">Iniciar sesión</button>
          </div>
    </section>
    <section>
      <div>
        <span>No está registrado? <a href="index.php?registro" class="link">Registrese aquí</a></span>
      </div>
    </section>';
  }
?>
  </section>
  <section>
    <div class="linkusers">
        <a href="welcome.php">Ver usuarios registrados</a>
    </div>
    <div class="linkusers">
        <a href="mostrar_usuarios.php">Ver usuarios registrados (sin iniciar sesión)</a>
    </div>
  </section>
</body>
</html>
