<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
}
?>

<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>

<?php

    $con=$app_db;

    $sql="SELECT *  FROM productos";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Producto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h3>Ingrese Productos</h3>
                                <form action="insertarproducto.php" method="POST">
                                    <input type="text" class="form-control mb-3" name="id_producto" placeholder="Id producto"  disabled>

                                    <input type="text" class="form-control mb-3" name="producto" placeholder="Producto">

                                      <?php

                                          $con=$app_db;

                                          $sql1="SELECT *  FROM productos";
                                          $query1=mysqli_query($con,$sql1);

                                      ?>


        </label>
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th></th>
                                        <th>Id_Producto</th>
                                        <th>Producto</th>

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
                                                <th><?php  echo $row['id_producto']?></th>
                                                <th><?php  echo $row['producto']?></th>
                                                <th><a href="actualizarproducto.php?id= <?php echo $row['id_producto'] ?>"  class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteproducto.php?id=<?php echo $row['id_producto'] ?>" class="btn btn-danger">Eliminar</a></th>
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
