<?php
require('dbconn.php');

session_start();

//Comprobacion de ingreso de user y password

if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (empty($_POST['user'])) {
    header("Location: index.php?nouser");
  }
  else {
    $currentuser=$_POST['user'];
    if (empty($_POST['pass'])) {
      header("Location: index.php?nopass");
    }
    else {
      $currentpass=$_POST['pass'];
    }

    //Comprobacion de user y password validos e inicio de sesion

    if (!empty($_POST['user'] && !empty($_POST['pass']))) {
      $userlog=mysqli_query($dbconn, "SELECT usuario, clave FROM usuarios WHERE usuario='$currentuser'");

      $row=mysqli_fetch_assoc($userlog);

      if (in_array($currentuser, $row)) {
        if (password_verify($_POST['pass'], $row[clave])) {
          $_SESSION['user']=$currentuser;
          header("Location: welcome.php");
        }
        else{
          header("Location: index.php?wrongpass");
        }
      }
      else{
        header("Location: index.php?wronguser");
      }
    }
  }

}

mysqli_close($dbconn);

?>
