<?php

session_start();

if (isset($_SESSION['user'])) {
  echo '<!DOCTYPE html>
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
      <h1>Bienvenido '.$_SESSION["user"].'</h1>
    </header>
    <section class="cuerpo_tabla">
      <div class="form">
      <table class="tabla">
        <caption>Usuarios registrados</caption>
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Email</th>
            <th>Sitio web</th>
          </tr>
        </thead>
        <tbody>';
        require('dbconn.php');

        //Trae de base de datos la informacion de Usuarios
        
        $info=mysqli_query($dbconn, "SELECT usuario, nombre, apellido, edad, email, sitioweb FROM usuarios");

        if (mysqli_num_rows($info)) {
          while  ($arrinfo=mysqli_fetch_row($info)) {
            echo '<tr>
                    <td>'.$arrinfo[0].'</td>
                    <td>'.$arrinfo[1].'</td>
                    <td>'.$arrinfo[2].'</td>
                    <td>'.$arrinfo[3].'</td>
                    <td>'.$arrinfo[4].'</td>
                    <td>'.$arrinfo[5].'</td>
                  </tr>';
          }
        }

        mysqli_close($dbconn);

        echo '
        </tbody>
      </table>
      </div>
    </section>
    <section>
      <div class="linkusers">
        <a href="logout.php">Salir</a>
      </div>
    </section>
  </body>
  </html>';
}
else {
  echo '<!DOCTYPE html>
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
      <div class="form">
        <h2>Debe iniciar sesión para visualizar los usuarios registrados.</h2>
      </div>
      <div>
        <a href="index.php?login" class="link">Iniciar sesión</a>
      </div>
    </section>
  </body>
  </html>
';
}
?>
