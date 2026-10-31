<?php require( 'templates/header.php' ); ?>
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
	// code...
}else {

}
?>

 <?php require( 'init.php' ); ?>



 <?php


 $expediente = $_GET["expediente"];
echo "Solicitud: ".$expediente;
 $conn=$app_db;

  ?>

  <?php
    $sql = "SELECT * FROM comentarios WHERE expediente = $expediente";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result = $conn->query($sql);

    $sql1 = "SELECT * FROM solicitudes WHERE solicitud = $expediente";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result1 = $conn->query($sql1);

    echo "<li><a target='_blank' href=\"consultasol.php?expediente=".$_GET["expediente"]. "\" >Ver Solicitud completa</a></li>";  // Cambia los nombres de las columnas según tu estructura de datos



    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            echo "Cliente :            ".$row1["ncliente"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Monto solicitado : Q.".$formateado = number_format($row1['montosolicitado'], 2, '.', ',')."<br>";
            echo "Tasa de interes :    ".$row1["tasa"]."<br>";
            echo "Plazo Solicitado :   ".$row1["plazomeses"]." Meses."."<br>";
            $dpi=$row1["dpicliente"];
          //  echo "Cuota :              ".$dpi."<br>";

        }

    } else {
        echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
    }


    // Crear la tabla HTML
      echo "<table>";
      echo "<tr><th>Expediente</th><th>usuario</th><th>Estado</th><th>comentarios</th><th>FECHA</th></tr>";  // Cambia los encabezados según tu estructura de datos

      // Mostrar los resultados de la consulta
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row["expediente"]."</td><td>".$row["usuario"]."</td><td>".$row["estado"]."</td><td>".$row["comentarios"]."</td><td>".$row["fechahora"]."</td></tr>";  // Cambia los nombres de las columnas según tu estructura de datos

          }
      } else {
          echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
      }

      echo "</table>";

      // Obtener los archivos de la carpeta

 ?>





 <h4>Archivos del expediente</h4>
  <?php
 $directorio = 'Archivos/expedientes/'.ltrim($expediente)  ; // Reemplaza con la ruta de la carpeta que deseas mostrar los archivos
 echo "<table>";
  if (file_exists($directorio) && is_dir($directorio)) {
      $archivos = scandir($directorio);

      // Mostrar los archivos en una lista con enlaces
      echo "<ul>";
      foreach ($archivos as $archivo) {
          // Ignorar los directorios "." y ".."
          if ($archivo !== "." && $archivo !== "..") {
              // Crear un enlace para cada archivo
              echo "<tr><td><li><a target='_blank' href=\"ver_archivo.php?archivo=" . urlencode($archivo)."&expediente=".$expediente . "\" >" . $archivo . "</a></li></td></tr>";
              //echo "---------------------------------------------------------------------------------------------------";
          }

      }
 echo "</table>";
    //  echo "<li><a target='_blank' href=\"subirnuevoarchivo.php?expediente=".$_POST["expediente"]. "\" >" . "Subir Nuevo Archivo" . "</a></li>";
/// Botones

    } else {

  }
    echo "</ul>";





 ?>



 <?php

 // Cerrar la conexión a la base de datos

 ?>
 <h4>Seleccione Analista</h4>

 <form action="asig.php?expediente=<?php echo $expediente; ?>" method="post">
   <label><select  name="analista">
     <?php
         $con=$app_db;
         $sql1="SELECT * FROM usuarios WHERE rol_id=5 OR rol_id=2  ";
         $query1=mysqli_query($con,$sql1);
       foreach ($query1 as $opciones) {?>
           <option name="analista" value="<?php echo $opciones['username'] ?>"><?php echo $opciones['username'] ?></option>
     <?php  }    ?>
       </label>
       <textarea name="comentariosasignacion" rows="5"  cols="10" placeholder="Ingrese Comentarios o informacion relevante para el caso si existiera"></textarea><br><br>

      <button name="submit" value="Si">Asignar</button>

 </form>

 <?php
$conn->close();
?>
 <?php  require( 'templates/footer.php' );?>
