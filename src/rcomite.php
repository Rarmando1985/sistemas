<?php
session_start();
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 5 && $_SESSION['rol'] != 2)) {

  exit();
}
?>
 <?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
 <?php
 $expediente = $_GET["expediente"];
 $conn=$app_db;
  ?>
  <?php
    $sql = "SELECT * FROM comentarios WHERE expediente = $expediente";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result = $conn->query($sql);

    $sql1 = "SELECT * FROM solicitudes WHERE solicitud = $expediente";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result1 = $conn->query($sql1);

    echo "<li><a target='_blank' href=\"consultasol.php?expediente=".$_GET["expediente"]. "\" >Ver Solicitud completa</a></li>";  // Cambia los nombres de las columnas según tu estructura de datos

    date_default_timezone_set('America/Guatemala');

    $fechaActual = date("d-m-Y");
    $horaActual = date("H:i:s");
    $nsolicitud= date("Y").date("m").date("d").date("H").date("i").date("s");
    $afactual=date('d-m-Y H:i:s');

    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $subproducto=$row1["subproducto"];
            $dpi=$row1["dpicliente"];
            $supervisor=$row1["supervisor"];
            $agencia=$row1["agencia"];
            $ncliente=$row1["ncliente"];
            $fnac=$row1["fnac"];
            $edad=$row1["edad"];
            $fingreso=$row1["fingreso"];
            $ltrabajo=$row1["ltrabajo"];
            $tiempolaboral=$row1["tiempolaboral"];
            $ingresos=$row1["ingresos"];
            $puesto=$row1["puesto"];
            $monto=$row1["montosolicitado"];
            $plazo=$row1["plazomeses"];
            $tasa=$row1["tasa"];
            $cuota=$row1["cuota"];
            $prospeccion=$row1["prospeccion"];
            $destino=$row1["destino"];


        }

    } else {
        echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
    }
 ?>
 <?php

    $con=$app_db;
    $sql = "SELECT * FROM solicitudes WHERE dpicliente = '$dpi'";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);

 ?>
 <h4>Archivos del expediente</h4>
 <?php
 $directorio = 'Archivos/expedientes/'.ltrim($expediente)  ; // Reemplaza con la ruta de la carpeta que deseas mostrar los archivos
 echo "<table>";
  if (file_exists($directorio) && is_dir($directorio)) {
      $archivos = scandir($directorio);
      echo "<ul>";
      foreach ($archivos as $archivo) {
          if ($archivo !== "." && $archivo !== "..") {
              echo "<tr><td><li><a target='_blank' href=\"ver_archivo.php?archivo=" . urlencode($archivo)."&expediente=".ltrim($expediente) . "\" >" . $archivo . "</a></li></td></tr>";
                  }

      }
 echo "</table>";
 //echo "<li><a target='_blank' href=\"subirnuevoarchivo.php?expediente=".$expediente. "\" ><img src='assets\descarga.jfif' alt='Imagen'></a></li>";

} else {
//echo "<li><a target='_blank' href=\"subirnuevoarchivo.php?expediente=".$expediente. "\" ><img src='assets\descarga.jfif' alt='Imagen'></a></li>";

}

 ?>

<form action="dic.php?expediente=<?php echo $expediente?>" method="POST">

  <table>
		<tr>
			<td><input type="text" class="form-control mb-3" name="toperacion" value="<?php echo $subproducto; ?>" placeholder="Tipo de Operacion"  readonly></td>
			<td>  <input type="text" class="form-control mb-3" name="fechadictamen" placeholder="Fecha de dictamen"value="<?php echo $afactual; ?>"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="supervisor" value="<?php echo $supervisor; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td>  <input type="text" class="form-control mb-3" name="agencia" placeholder="Fecha de dictamen"value="<?php echo $agencia; ?>"  readonly></td>

  	</tr>
		<tr style="background-color: green;">
			<td align="center">Datos Personales</td>
		</tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="ncliente" value="<?php echo $ncliente; ?>" placeholder="Tipo de Operacion"  readonly></td>
			<td>  <input type="text" class="form-control mb-3" name="fnac" placeholder="Fecha de dictamen"value="<?php echo $fnac; ?>"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="edad" value="<?php echo $edad. " años"; ?>" placeholder="Tipo de Operacion"  readonly></td>
    </tr>
  </tr>
  <tr style="background-color: green;">
    <td align="center">Datos Laborales</td>
  </tr>

    <tr>
    	<td>  <input type="text" class="form-control mb-3" name="ltrabajo" placeholder="Fecha de dictamen"value="<?php echo $ltrabajo; ?>"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="fingreso" value="<?php echo $fingreso; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="tiempolaboral" value="<?php echo $tiempolaboral. " años"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" id= "ingresos" name="ingresos" value="<?php echo $ingresos; ?>" placeholder="Ingresos"  readonly></td>

    </tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="puesto" value="<?php echo $puesto; ?>" placeholder="Tipo de Operacion"  readonly></td>

    </tr>

  </tr>
  <tr style="background-color: green;">
    <td align="center">Sugerido</td>
  </tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="monto" value="Q. <?php echo $formateado = number_format($monto, 2, '.', ','); ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="plazo" value="<?php echo $plazo ." meses"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="tasa" value="<?php echo $tasa." %"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="cuota" value="Q. <?php echo $formateado = number_format($cuota, 2, '.', ','); ?>" placeholder="Tipo de Operacion"  readonly></td>

    </tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="prospeccion" value="<?php echo $prospeccion." %"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="destino" value="<?php echo $destino; ?>" placeholder="Destino"  readonly></td>
    </tr>


    <tr style="background-color: green;">
      <td align="center">Autorizado</td>
    </tr>

      <tr>
        <td><input type="text" class="form-control mb-3" id="montos" name="montos" value="<?php echo $formateado = number_format($monto, 2, '.', ','); ?>" placeholder="Monto Sugerido" onkeyup="calcular()"></td>
        <td><input type="text" class="form-control mb-3" id="plazos" name="plazos" value="<?php echo $plazo; ?>" placeholder="Plazo sugerido" onkeyup="calcular()" ></td>
          <td><input type="text" class="form-control mb-3" id="tasas" name="tasas" value="<?php echo $tasa; ?>" placeholder="Tasa sugerida" onkeyup="calcular()" ></td>

        <script>
        function calcular() {
            mont=eval(document.getElementById('montos').value);
            plaz1=eval(document.getElementById('plazos').value);
            tas=eval(document.getElementById('tasas').value);
            plaz= plaz1/12;
            tas1=(tas+0.0044)/100;
            tiv = mont + plaz+ tas;
            tot1 = (mont*(tas1/12)*(1+tas1/12)**(plaz*12))/((1+tas1/12)**(plaz*12)-1);
            tot= tot1.toFixed(2);
            document.getElementById('cuotas').value=tot;
        }
        </script>

        <td><input type="text" class="form-control mb-3"id="cuotas" name="cuotas" value="Q. <?php echo $formateado = number_format($cuota, 2, '.', ','); ?>" placeholder="Cuota" onkeyup="calcular()"></td>
        <td><input type="text" class="form-control mb-3" name="prospeccion" value="<?php echo $prospeccion." %"; ?>" placeholder="Tipo de Operacion"  readonly></td>
        <td><input type="text" class="form-control mb-3" name="destino" value="<?php echo $destino; ?>" placeholder="Destino"  readonly></td>

        <td><input type="text" class="form-control mb-3" name="inciso" value="" placeholder="Inciso"  readonly></td>

      </tr>

<tr>
      <td><input type="text" class="form-control mb-3" name="inciso" value="" placeholder="Inciso"  required></td>

    </tr>

	</table>

<textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>

</label>

   <button name="submit" value="Autorizado">Autorizado</button>
  <button name="submit" value="Pendiente">Pendiente</button>
  <button name="submit" value="Denegado">Denegado</button>

</form>


 <?php

 // Cerrar la conexión a la base de datos
 $conn->close();
 ?>


 <?php require( 'templates/footer.php' );?>
