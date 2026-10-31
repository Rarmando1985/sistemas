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


<head>
  <title>Tipo de  Ampliacion</title>
</head>
<body>
  <h2>Seleccione Tipo de Ampliacion</h2>
  <form action="Ampliacion1.php" method="POST">
    <label for="opciones">Selecciona una opción:</label>
    <select name="tampliacion" id="opciones">
      <option value="1">Ampliacion Plazo y monto</option>
      <option value="2">Ampliacion Plazo, monto y modificacion de Tasa</option>
      <option value="3">Prorroga de Plazo</option>
    </select>
    <br><br>
    <input type="submit" value="Enviar">
  </form>
</body>
</html>
<?php require( 'templates/footer.php' );?>