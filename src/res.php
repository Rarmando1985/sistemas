<?php
session_start();
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 5 && $_SESSION['rol'] != 2)) {

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
    <body >
      <h3>Casos para Inlcuir a Acta</h3>

      <table border="0">
<tr>

</tr>
</table>

            <div class="container mt-">


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
                                        <th>Estado</th>

                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                        <?php
                                        $usua=$_SESSION['username'];
                                        $con=$app_db;


                                        $sql = "SELECT * FROM solicitudes WHERE estado IN ('Comite') AND analista = '$usua'";
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
                                                <th><?php  echo $row['estado']?></th>
                                                <th><?php  echo $row['fechahora']?></th>
                                              <th><a href="rcomite.php?expediente= <?php echo $row['solicitud'] ?>"  class="btn btn-info">VER</a></th>


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
