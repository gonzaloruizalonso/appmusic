<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Descargar musica</title>
  </head>
  <body>

    <?php
    session_start();
    if(!isset($_SESSION['CustomerID'])){
         echo "<script>console.log('no hay sesion')</script>";
         header("location:../index.php");
      } else {
    function generarFormulario(){
      $canciones=$_SESSION['datoscanciones'];
      //var_dump($canciones);
      echo "
      <h1>Descargar musica</h1><br><br>
      <form action=\"\" method=\"POST\">
        <label for=\"cancion\">Cancion</label>
        <select name=\"cancion\">";
          foreach ($canciones as $key => $cancion) {
            echo "<option>".$cancion["Name"]."</option>";
          }
        echo "</select><br>
        <label for=\"cantidad\">Cantidad</label>
        <input type=\"number\" name=\"cantidad\" required><br>
        <input type=\"submit\" name=\"agregarcarrito\" value=\"Agregar cancion\">
      </form>
      ";
    }
    function agregarAlCarrito($cancion,$cantidad,$canciones,$carrito){
      $encontrado=false;
      //var_dump($carrito);
      for ($i=0; $i < sizeof($carrito); $i++) {
        echo "<script>console.log('".$carrito[$i]['cancion']['Name']."')</script>";
        if ($carrito[$i]['cancion']['Name']==$cancion) {
          echo "<script>console.log('encuentra igual')</script>";
          $carrito[$i]['cantidad']=$carrito[$i]['cantidad']+$cantidad;
          $encontrado=true;
        }
      }
      if (!$encontrado) {
        foreach ($canciones as $key => $value) {
          if ($value["Name"]==$cancion) {
            $cancioncompleta=$value;
          }
        }
        echo "<script>console.log('NO encuentra igual')</script>";
        $datoscancion = array('cancion' => $cancioncompleta, 'cantidad' => (int)$cantidad );
        array_push($carrito,$datoscancion);
      }
      //var_dump($carrito);
      return $carrito;
    }
    function mostrarCarrito($carrito){
      echo "<h2>Carrito</h2>";
      var_dump($carrito);

    }
    if (!isset($_POST['agregarcarrito']) || empty($_POST['agregarcarrito'])) {
      generarFormulario();
    }else {
      $canciones=$_SESSION['datoscanciones'];
      generarFormulario();
      $cancionAux=$_POST['cancion'];
      $cantidadAux=$_POST['cantidad'];
      //var_dump($_SESSION['carrito']);
      echo "<hr>";
      $carritoAux=agregarAlCarrito($cancionAux,$cantidadAux,$canciones,$_SESSION['carrito']);
      $_SESSION['carrito']=null;
      $_SESSION['carrito']=$carritoAux;
      mostrarCarrito($_SESSION['carrito']);

        echo "<a href=\"../controllers/procesar_controller.php\">Procesar carrito</a>";

    }
    //var_dump($_SESSION['carrito']);
    }
    ?>
    <br><br>
    Para volver al menu, pulsa: <a href="../index.php">aqui</a>
  </body>
</html>
