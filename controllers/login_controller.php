<?php
if(isset($_SESSION['CustomerID'])){
  require_once("views/user.php");
}else {
  //Llamada al modelo intermediario
  require_once("models/login_model.php");
  $mail = $_POST['usr'];
  $apell = $_POST['pas'];

  $login=comprobarLogin($conn,$mail,$apell);

  if (!$login) {
    //require_once("views/login.php");
    echo "<script>alert('Usuario o password incorrecto')</script>";
    echo "<script>console.log('error de login')</script>";
    header("location:index.php");
  }else {
    echo "<script>console.log('login ok')</script>";
    $_SESSION['CustomerID']=obtenerCustomerID($conn,$mail);
    require_once("views/user.php");
  }

}
 ?>
