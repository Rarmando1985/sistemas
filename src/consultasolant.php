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

$conn=$app_db;

  ?>
  <!-- Formulario HTML -->

  <?php

    // Obtener el término de búsqueda del formulario
    $expediente = $_GET["expediente"];

    $sql1 = "SELECT * FROM solicitudes WHERE solicitud = $expediente";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result1 = $conn->query($sql1);


    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
          echo "No Solicitud :            ".$row1["solicitud"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
          echo "Fecha/hora ingreso   :            ".$row1["fechahora"]."<br>";
          echo "Tipo Operacion   :            ".$row1["garntia"]."<br>";
          echo "Sector   :            ".$row1["sector"]."<br>";
          echo "Supervisor   :            ".$row1["supervisor"]."<br>";
          echo "Codigo Agencia   :            ".$row1["id_agencia"]."<br>";
          echo "Agencia   :            ".$row1["agencia"]."<br>";
          echo "<h3>Datos de Cliente</h3> ";

            echo "Cliente :            ".$row1["ncliente"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "DPI :            ".$row1["dpicliente"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Fecha Nacimiento :            ".$row1["fnac"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Edad :            ".$row1["edad"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Direccion :            ".$row1["direccion"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Municipio :            ".$row1["municipio"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Departamento :            ".$row1["departamento"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Genero :            ".$row1["genero"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Estado civil :            ".$row1["ecivil"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Nacionalidad :            ".$row1["nacionalidad"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Profesion :            ".$row1["profesion"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Lugar de trabajo :            ".$row1["ltrabajo"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Fecha de ingreso :            ".$row1["fingreso"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Tiempo Laboral :            ".$row1["tiempolaboral"]." años <br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Puesto :            ".$row1["puesto"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Lugar de trabajo :            ".$row1["ltrabajo"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Fecha de ingreso :            ".$row1["fingreso"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Tiempo Laboral :            ".$row1["tiempolaboral"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Puesto :            ".$row1["puesto"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Ingresos Mensuales :   Q.         ".$row1["ingresos"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Monto Solicitado :       Q.     ".$row1["montosolicitado"]."<br>";  // Cambia los nombres de las columnas según tu estructura de datos
            echo "Tasa de interes :    ".$row1["tasa"]." % <br>";
            echo "Plazo Solicitado :   ".$row1["plazomeses"]." Meses."."<br>";
            echo "Cuota :         Q.     ".$row1["cuota"]."<br>";
            echo "Comentarios : ".$row1["Comentarios"]."<br>";
if ($row1["usatestigo"]==1) {
echo "<h3>Usa Testigo </h3>";
  echo "Testigo : ".$row1["testigo"]."<br>";
  echo "Dpi testigo : ".$row1["dpitestigo"]."<br>";
}


if ($row1["ugarantia"]==1) {
  echo "<h3>Se presenta : ".$row1["tgarantia"]."</h3>";
  echo "Nombre : ".$row1["nomgarantia"]."<br>";
  echo "Edad : ".$row1["edadgarantia"]."<br>";
  echo "Direccion : ".$row1["direcciongarantia"]."<br>";
  echo "Municipio : ".$row1["municipio1"]."<br>";
  echo "Departamento : ".$row1["departamento1"]."<br>";
  echo "Genero : ".$row1["generogarantia"]."<br>";
  echo "Estado Civil : ".$row1["ecivilgarantia"]."<br>";
  echo "Nacionalidad : ".$row1["nacionalidadgarantia"]."<br>";
  echo "Profesion : ".$row1["profesiongarantia"]."<br>";
  echo "Lugar de trabajo : ".$row1["trabajogarantia"]."<br>";
  echo "Fecha de inicio : ".$row1["finiciogarantia"]."<br>";
  echo "Tiempo Laboral : ".$row1["tlabgarantia"]."<br>";
  echo "Puesto : ".$row1["puestogarantia"]."<br>";
  echo "Ingresos : ".$row1["ingresosgarantia1"]."<br>";
  echo "Dpi : ".$row1["dpigarantia"]."<br>";
  if ($row1["usatestigo1"]==1) {
  echo "<h3>Usa Testigo </h3>";
    echo "Testigo : ".$row1["testigo1"]."<br>";
    echo "Dpi testigo : ".$row1["dpitestigo1"]."<br>";
  }

}
        }




    } else {

    }



    // Crear la tabla HTML


// Cerrar la conexión a la base de datos
$conn->close();
?>

<?php require( 'templates/footer.php' );?>
