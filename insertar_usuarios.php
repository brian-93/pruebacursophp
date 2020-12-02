<?php

$user=$_POST['usuario'];
$clave=$_POST['clave'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$email=$_POST['email'];
$website=$_POST['sitio_web'];

$respuesta='<html>
<head>
<meta charset="utf-8">
<title>Registro exitoso</title>
</head>
<body style="background: #323232; color: #FFFFFF;">
  <p style="text-align: center; font-size: 200%;">
    Su registro en la web ha sido exitoso!<br>Su nombre de usuario es: '.$user.'<br>Su contraseña es: '.$clave.'
  </p>
</body>
</html>';

$headers='MIME-Version: 1.0' . "\r\n";
$headers.= 'Content-type: text/html; charset=UTF-8' . "\r\n";

require('dbconn.php');

//Comprobacion de users registrados

$userqr=mysqli_query($dbconn, "SELECT usuario FROM usuarios WHERE usuario='$user'");

$arruserqr=mysqli_fetch_row($userqr);

if (isset($arruserqr)) {
  header("Location: index.php?registro&usedus");
}

//Guardado de informacion del user en la base de datos y envio de email

else {
  $hash=password_hash($_POST['clave'], PASSWORD_BCRYPT);
  $form=mysqli_query($dbconn, "INSERT INTO usuarios VALUES('$user', '$hash', '$nombre', '$apellido', $edad, '$email', '$website')") or die ("Error al guardar los datos en la base de datos. ".mysqli_error($dbconn));
  mail($email,"Registro exitoso.",$respuesta,$headers);
  header("Location: index.php?succes");
}


mysqli_close($dbconn);

?>
