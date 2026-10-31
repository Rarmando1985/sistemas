<?php
session_start();
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 5 && $_SESSION['rol'] != 2)) {

  exit();
}

?>
<?php require( 'init.php' );

 $expediente = $_GET["expediente"];
 $conn=$app_db;

    $sql1 = "SELECT * FROM solicitudes WHERE solicitud = $expediente";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $ugarantia=$row1["ugarantia"];
            $subproducto=$row1["subproducto"];
          }

} else {
}

      switch ($ugarantia) {
        case 1:

        switch ($subproducto) {

          case "Ampliacion Al Trabajador":
            header("Location: ampliacion2.php?expediente=$expediente");
            exit;

          case "Ampliacion Fiduciaria":
            header("Location: ampliacion2.php?expediente=$expediente");
            exit;

          default:
            header("Location: analisis2.php?expediente=$expediente");
            exit;
        }



        case 0:

        switch ($subproducto) {
          case "Ampliacion Al Trabajador":
            header("Location: ampliacion1.php?expediente=$expediente");
            exit;
          case "Ampliacion Fiduciaria":
            header("Location: ampliacion1.php?expediente=$expediente");
            exit;
          default:
          header("Location: analisis1.php?expediente=$expediente");
            exit;

        }  exit;

        default:
          header("Location: index.php");
          exit;
      }

 $conn->close();
 ?>
