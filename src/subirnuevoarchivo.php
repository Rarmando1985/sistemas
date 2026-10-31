<?php require( 'templates/header.php' ); ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    exit;
	// code...
}else {

}
 ?>

<?php require( 'init.php' ); ?>
<?php
$expediente=$_GET['expediente'];
echo "Subir archivos para el expediente: ";
 ?>
<br>
 <form action="nuevoarchivo.php" method="POST" enctype="multipart/form-data">
<input type="text"   id="fname" value="<?php echo $expediente; ?>" name="expediente" readonly="readonly" ><br>
<textarea name="comentarios" rows="1"  cols="10" placeholder="Ingrese Comentarios o informacion relevante para el caso si existiera"></textarea><br><br>

 <input type="file"  name="archivo" id="archivo"/ required>
 <br>
 <input type="submit" value="Subir" name="upload" class="btn btn-primary">

</form>
