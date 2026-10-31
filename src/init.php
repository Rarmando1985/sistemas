<?php

if ( ! file_exists( 'config.php' ) ) {
	die( 'ERROR:No existe config.php' );
}

require 'config.php';

setlocale( LC_TIME, SITE_LANG );
date_default_timezone_set( SITE_TIMEZONE );

$Host = 'smtp.ionos.com';
$Username = 'ronychoche@ronychoche.cloud';
$Password = 'programacion1.';
$Port = 587;

$app_db = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
if ( $app_db === false ) {
	die( 'Error al conectar con la base de datos' );
}else {

}
?>
