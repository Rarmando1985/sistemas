<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $opcionSeleccionada = $_POST["tampliacion"];
  
  switch ($opcionSeleccionada) {
    case "1":
      header("Location: Amp1.php");
      break;
    case "2":
      header("Location: Amp2.php");
      break;
    case "3":
      header("Location: Amp3.php");
      break;
    default:
      // Opción por defecto si no se selecciona ninguna opción válida
      header("Location: index.php");
      break;
  }
}
?>