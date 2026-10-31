<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...
}
?>
<?php require( 'templates/header.php' ); ?>
<?php require( 'init.php' ); ?>

<?php

    $con=$app_db;

    $sql="SELECT *  FROM productos";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Ingreso Expedientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h3>Seleccione Producto</h3>
                                <form action="direccionador.php" method="POST">
                                  <label><select  name="a">
                                      <?php
                                          $con=$app_db;
                                          $sql1="SELECT *  FROM productos";
                                          $query1=mysqli_query($con,$sql1);
                                      ?>
                                      <?php
                                        foreach ($query1 as $opciones) {?>
                                            <option  placeholder="Seleccione producto" value="<?php echo $opciones['id_producto']?>"><?php echo $opciones['id_producto'].'-'.$opciones['producto'] ?></option>
                                      <?php  }    ?>


                                      </label>
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </body>
</html>
<?php require( 'templates/footer.php' );?>
