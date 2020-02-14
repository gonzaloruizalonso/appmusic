<?php
if(isset($_SESSION['CustomerID'])){
   require_once("views/user.php");
}else {

  if(isset($_POST['submit'])){
    echo "<script>console.log('se ha pulsado submit')</script>";
    require_once('controllers/login_controller.php');
  }else {
?>
<html><head><title>Login </title><link rel="stylesheet"></head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h1>Login</h1>
    Usuario (email): <input type="text" name="usr"><br>
    Clave (apellido): <input type="password" name="pas"><br>
    <br><input type="submit" name="submit" value="Entrar">
  </form>
</body>
</html>
<?php
  }
  ?>


<?php
}
?>
