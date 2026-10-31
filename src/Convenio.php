<?php
session_start();
if (!isset($_SESSION['rol'])) {
}
 ?>

<?php require( 'init.php' ); ?>

<?php

    $con=$app_db;
?>
<?php require( 'templates/header.php' ); ?>
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener los valores del formulario
  $tipo_convenio = $_POST["tipo_convenio"];


  // Realizar la conexión a la base de datos
  $conexion = $con;

  // Verificar si la conexión fue exitosa
  if (!$conexion) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
  }

  // Escapar los valores para evitar ataques de inyección SQL
  $tipo_convenio = mysqli_real_escape_string($conexion, $tipo_convenio);

  // Obtener las condiciones del convenio y empresa seleccionados
  $consulta = "SELECT * FROM convenios WHERE tconvenio = '$tipo_convenio' ";
  $resultado = mysqli_query($conexion, $consulta);


  // Cerrar la conexión a la base de datos
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Convenios</title>
</head>
<body>
  <h2>Formulario de Convenios</h2>

  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="tipo_convenio">Tipo de Convenio:</label>
    <select name="tipo_convenio" id="tipo_convenio" onchange="this.form.submit()">
      <option value="">Seleccione</option>
      <option value="Al Trabajador">Al Trabajador</option>
    <option value="Pastores">Pastores</option>
    </select>

    <label for="empresa">Empresa:</label>
    <select name="empresa" id="empresa" onchange="this.form.submit()">
      <?php

      if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
      }
      $tipo_convenio = mysqli_real_escape_string($conexion, $tipo_convenio);
      $consulta = "SELECT * FROM convenios WHERE tconvenio = '$tipo_convenio' ";
      $resultado = mysqli_query($conexion, $consulta);
      if (mysqli_num_rows($resultado) > 0) {
        ?>

        <option value="">Seleccione</option>
<?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
          ?>
          <option value="<?php echo $fila['empresa']?>"><?php echo $fila['empresa']  ?></option>
          <?php
        }
      } else {

      }

      // Cerrar la conexión a la base de datos

            ?>

            <?php


            ?>
    </select>

    <div id="condiciones_empresa">
      <?php
      // Verificar si se ha seleccionado una empresa
  if (!empty($empresa)) {
      $empresa = "";
}else {
      $empresa = $_POST["empresa"];
}

      if (!empty($empresa)) {
        // Obtener las condiciones de la empresa seleccionada
        $conexion = $con;
        $empresa = mysqli_real_escape_string($conexion, $empresa);
        $consulta = "SELECT * FROM convenios WHERE empresa = '$empresa'";
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se obtuvieron resultados
        if (mysqli_num_rows($resultado) > 0) {
          // Mostrar las condiciones en pantalla
          while ($fila = mysqli_fetch_assoc($resultado)) {

              ?>
              <div style="width: 100%;">
               <table border="4px solid" style="width: 100%">

                    <tr>
                        <th><?php    echo 'Corporacion ' . $fila['corporacion'];?> </th>
                        <th><?php    echo 'Empresa  ' . $fila['empresa'];?></th>
                       <th><?php    echo 'Tasa sin fiador' . $fila['tasa']."%";?></th>
                       <th><?php    echo 'Tasa con fiador  ' . $fila['tasacf']."%";?></th>
                       <th><?php    echo 'Prospeccion  ' . $fila['prospeccion']."%";?></th>
<?php
$tas=$fila['tasa'];
$tas1=$fila['tasacf'];
$tconvenio=$fila['tconvenio'];
$prospeccion=$fila['prospeccion'];

?>


                  </tr>

               <tbody>
                 <tr>
                     <th><?php    echo 'Plazo con fiador ' . $fila['plazocf']." meses";?> </th>
                     <th><?php    echo 'Plazo sin fiador  ' . $fila['plazcosf']." meses";?></th>
                    <th><?php    echo 'Forma de analis ' . $fila['formamedir'];?></th>
                    <th><?php    echo 'RCI Maximo  ' . $fila['rcimax']." %";?></th>
                    <th><?php    echo 'Estado  ' . $fila['estado'];?></th>
               </tr>
               </thead>
               <tbody>
                 <tr>
                     <th><?php    echo 'S/Fiador 1 año: ' . $fila['sf1año']." salarios";?> </th>
                     <th><?php    echo 'S/Fiador 2 año: ' . $fila['sf2año']." salarios";?> </th>
                    <th><?php    echo 'S/Fiador 3 año: ' . $fila['sf3año']." salarios";?> </th>
                    <th><?php    echo 'S/Fiador 4 año: ' . $fila['sf4año']." salarios";?> </th>
                    <th><?php    echo 'S/Fiador 5 año: ' . $fila['sf5año']." salarios";?> </th>
               </tr>
                      </tr>
               </thead>
               <tbody>
                 <tr>
                     <th><?php    echo 'C/Fiador 1 año: ' . $fila['cf1año']." salarios";?> </th>
                     <th><?php    echo 'C/Fiador 2 año: ' . $fila['cf2año']." salarios";?> </th>
                    <th><?php    echo 'C/Fiador 3 año: ' . $fila['cf3año']." salarios";?> </th>
                    <th><?php    echo 'C/Fiador 4 año: ' . $fila['cf4año']." salarios";?> </th>
                    <th><?php    echo 'C/Fiador 5 año: ' . $fila['cf5año']." salarios";?> </th>
               </tr>
                      </tr>
               </thead>

           </table>
           </div>
           <?php

          }
        } else {
          echo '<p>No hay condiciones disponibles para esta empresa</p>';
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
      }
      ?>
    </div>

  </form>

    <form method="POST" action="conv.php?empresa=<?php echo $empresa?>& tas=<?php echo $tas?>& tas1=<?php echo $tas1?>& tipo_convenio=<?php echo $tconvenio?>& prospeccion=<?php echo $prospeccion?>">
      Tipo de tasa
      <select name="ttasa">
      <option>sin_fiador</option>
      <option>con_fiador</option>
      </select>
  <input type="submit" value="Enviar">
</form>

</body>
</html>
<?php require( 'templates/footer.php' );?>