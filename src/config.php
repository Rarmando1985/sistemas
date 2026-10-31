<?php

// Configura la salida de errores por pantalla
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Configuración general del sitio
define( 'SITE_TIMEZONE', 'America/Guatemala' );
define( 'SITE_LANG', [ 'es', 'spa', 'es_ES' ] );

// Conexión a Base de Datos para Docker
define( 'DB_HOST', 'db' );
define( 'DB_USER', 'rc' );
define( 'DB_PASSWORD', '1234' );
define( 'DB_DATABASE', 'fabrica' );

?>