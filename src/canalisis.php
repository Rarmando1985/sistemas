<?php
session_start();
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2)) {

  exit();
}

 ?>
 <?php require( 'templates/header.php' ); ?>
<?php require( 'init.php' ); ?>

<?php


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title> Asignasion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body background= "">
      <h3>Casos para Asignacion Analisis</h3>

            <div class="container mt-5">


                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="" >
                                    <tr>
                                        <th></th>
                                        <th>Solicitud</th>
                                        <th>Subproducto</th>
                                        <th>Agencia</th>
                                        <th>Cliente</th>
                                        <th>Monto</th>
                                        <th>Garantia</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php

                                        $con=$app_db;

                                        $sql = "SELECT * FROM solicitudes WHERE estado='Enviado'";
                                        $query = mysqli_query($con, $sql);

                                        while ($row = mysqli_fetch_array($query)) {

                                        ?>
                                            <tr>
                                                <th></th>
                                                <th><?php  echo $row['solicitud']?></th>
                                                <th><?php  echo $row['subproducto']?></th>
                                                <th><?php  echo $row['agencia']?></th>
                                                <th><?php  echo $row['ncliente']?></th>
                                                <th><?php  echo "Q. ".$formateado = number_format($row['montosolicitado'], 2, '.', ','); ?></th>
                                                <th><?php  echo $row['garntia']?></th>
                                                <th><a href="asignacion.php?expediente= <?php echo $row['solicitud'] ?>"  class="btn btn-info">VER</a></th>

                                            </tr>
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </body>
</html>
<?php require( 'templates/footer.php' );?>
