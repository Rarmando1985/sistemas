<?php

session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}
 ?>
<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<?php

    $con=$app_db;

$id=$_GET['id'];
$sql="SELECT * FROM productos WHERE id_producto='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Actualizar</title>
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
                <div class="container mt-5">
                    <form action="updateproducto.php" method="POST">

                                <input type="text" class="form-control mb-3" name="id_producto" placeholder="Dni" value="<?php echo $row['id_producto']  ?>">
                                <input type="text" class="form-control mb-3" name="producto" placeholder="Apellidos" value="<?php echo $row['producto']  ?>">


    </label>

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>

                </div>
    </body>
</html>
