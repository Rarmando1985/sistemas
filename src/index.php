<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...
}
?>

 <?php require( 'init.php' ); ?>
 <?php require( 'templates/header.php' ); ?>
 <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
     <label for="expediente">Buscar expediente:</label>
     <input type="text" name="expediente" id="expediente" required>
     <input type="submit" value="Buscar">
 </form>


<?php

$conn=$app_db;
// Crear
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  ?>
  <!-- Formulario HTML -->




  <?php

    // Obtener el término de búsqueda del formulario
    $expediente = $_POST["expediente"];

    // Consulta a la base de datos
    $sql = "SELECT * FROM comentarios WHERE expediente = '$expediente'";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result = $conn->query($sql);

    $sql1 = "SELECT * FROM solicitudes WHERE solicitud = '$expediente'";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result1 = $conn->query($sql1);

    echo "<li><a target='_blank' href=\"consultasol.php?expediente=".$_POST["expediente"]. "\" >Ver Solicitud completa</a></li>";  // Cambia los nombres de las columnas según tu estructura de datos

echo "Solicitud: ".$expediente."<br>";

    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            echo "Cliente :            ".$row1["ncliente"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Monto solicitado : Q.".$formateado = number_format($row1["montosolicitado"], 2, '.', ',')."<br>";
            echo "Tasa de interes :    ".$row1["tasa"]."<br>";
            echo "Plazo Solicitado :   ".$row1["plazomeses"]." Meses."."<br>";
            echo "Cuota :              ".$formateado = number_format($row1["cuota"], 2, '.', ',')."<br>";
            echo "Estado :              ".$row1["estado"]."<br>";

            $dpi=$row1["dpicliente"];
          //  echo "Cuota :              ".$dpi."<br>";

        }

    } else {
        echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
  $dpi=0;
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

      $directorio = 'Archivos\expedientes'."/". $expediente; // Reemplaza con la ruta de la carpeta que deseas mostrar los archivos
      // Obtener los archivos de la carpeta

?>
<h4>Solcitudes Anteriores</h4>

<?php

    $con=$app_db;
    $sql = "SELECT * FROM solicitudes WHERE dpicliente = '$dpi'";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);

?>
<div class="container mt-5">
        <div class="row">

            <div class="col-md-3">
                <br>
            </div>

            <div class="col-md-8">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th></th>
                            <th>Solicitud</th>
                            <th>Agencia</th>
                            <th>Cliente</th>
                            <th>Monto</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                            <?php
                                while($row=mysqli_fetch_array($query)){

                            ?>
                                <tr>
                                    <th></th>
                                    <th><?php  echo $row['solicitud']?></th>
                                    <th><?php  echo $row['agencia']?></th>
                                    <th><?php  echo $row['ncliente']?></th>
                                    <th><?php  echo "Q. ".$row['montosolicitado']?></th>
                                    <th><?php  echo $row['estado']?></th>
                                    <th><a href="solicitudesanteriores.php?expediente= <?php echo $row['solicitud'] ?>"  class="btn btn-info">VER</a></th>
                                </tr>
                            <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>



<h4>Archivos del expediente</h4>
<?php
$directorio = 'Archivos\expedientes'."/"; // Reemplaza con la ruta de la carpeta que deseas mostrar los archivos

echo "<table>";
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
        echo "<li><a target='_blank' href=\"subirnuevoarchivo.php?expediente=".$_POST["expediente"]. "\" ><img src='assets\descarga.jfif' alt='Imagen'></a></li>";
    } else {

  }
    echo "</ul>";


}


?>



<?php

// Cerrar la conexión a la base de datos
$conn->close();
?>


<?php require( 'templates/footer.php' );?>
