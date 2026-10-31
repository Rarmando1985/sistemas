<?php require( 'init.php' ); ?>
<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...
}
?>
<?php

    $con=$app_db;

?>
<?php require( 'templates/header.php' ); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Visita</title>
</head>
<body>
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores ingresados en el formulario
        $promotor = $_POST['promotor'];
        $tipoVisita = $_POST['tipo_visita'];
        $nombreCliente = $_POST['nombre_cliente'];
        $direccion = $_POST['direccion'];
        $ubicacion = $_POST['ubicacion'];

        // Obtener las imágenes subidas
        $imagenes = array();
        for ($i = 1; $i <= 5; $i++) {
            $imagen = $_FILES['imagen'.$i];
            // Verificar si se subió una imagen
            if ($imagen['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = $imagen['name'];
                $rutaArchivo = 'carpeta_destino/'.$nombreArchivo;
                // Mover la imagen a la carpeta de destino
                move_uploaded_file($imagen['tmp_name'], $rutaArchivo);
                $imagenes[] = $rutaArchivo;
            }
        }

        // Guardar los datos en la base de datos
        $conexion = new mysqli('localhost', 'usuario', 'contrasena', 'basedatos');
        if ($conexion->connect_error) {
            die('Error de conexión: '.$conexion->connect_error);
        }

        // Escapar los valores para evitar inyección de SQL
        $promotor = $conexion->real_escape_string($promotor);
        $tipoVisita = $conexion->real_escape_string($tipoVisita);
        $nombreCliente = $conexion->real_escape_string($nombreCliente);
        $direccion = $conexion->real_escape_string($direccion);
        $ubicacion = $conexion->real_escape_string($ubicacion);

        // Insertar los datos en la tabla de visitas
        $sql = "INSERT INTO visitas (promotor, tipo_visita, nombre_cliente, direccion, ubicacion)
                VALUES ('$promotor', '$tipoVisita', '$nombreCliente', '$direccion', '$ubicacion')";
        if ($conexion->query($sql) === true) {
            $visitaId = $conexion->insert_id;

            // Insertar los nombres de archivo de las imágenes en la tabla de imágenes
            foreach ($imagenes as $imagen) {
                $sql = "INSERT INTO imagenes (visita_id, nombre_archivo) VALUES ($visitaId, '$imagen')";
                $conexion->query($sql);
            }

            echo 'Los datos se han guardado correctamente.';
        } else {
            echo 'Error al guardar los datos: '.$conexion->error;
        }

        $conexion->close();
    }
    ?>

    <h1>Formulario de Visita</h1>

    <form method="POST" enctype="multipart/form-data">
        <label>Promotor:</label>
        <input type="text" name="promotor" required><br><br>

        <label>Tipo de Visita:</label>
        <select name="tipo_visita" required>
            <option value="Papeleria">Papelería</option>
            <option value="Cobranza">Cobranza</option>
            <option value="Desembolso">Desembolso</option>
        </select><br><br>

        <label>Nombre del Cliente:</label>
        <input type="text" name="nombre_cliente" required><br><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" required><br><br>

        <label>Ubicación (Geolocalización):</label>
        <input type="text" name="ubicacion" id="ubicacion" required readonly><br><br>

        <label>Imágenes:</label>
        <input type="file" name="imagen1"><br>
        <input type="file" name="imagen2"><br>
        <input type="file" name="imagen3"><br>
        <input type="file" name="imagen4"><br>
        <input type="file" name="imagen5"><br><br>

        <input type="submit" value="Guardar">
    </form>

    <script>
        // Obtener la ubicación del dispositivo y actualizar el campo de ubicación en el formulario
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;
                var ubicacionInput = document.getElementById("ubicacion");
                ubicacionInput.value = latitud + ", " + longitud;
            });
        }
    </script>
</body>
</html>
