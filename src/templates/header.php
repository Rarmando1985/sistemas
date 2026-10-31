<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();

}else {
  if (empty($_SESSION['username'])) {
    header('location: login.php');
  }
}
?>

	<html lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Fabrica</title>
	<link rel="stylesheet" href="assets/style.css">
	<link rel="shortcut icon" href="r.ico" />

	<style type="text/css">
*{
	padding: 0px;
	margin:0px;
}

#header{
	margin: 0px;
	width: 5000px;
	font-family:Arial;
}
ul,ol{
	list-style: none;
}
.nav li a {
	background-color:green;
	color: #fff;
	text-decoration: none;
	padding: 10px 15px;
	display: block;
}
.nav li a:hover{
	background-color:  #434343;
}
.nav li ul{
	display: none;
	position: relative;
	min-width:140px;
}
.nav > li{
	float: 	left;
}
.nav li:hover > ul{

	display: block;
}
.nav li ul li{

	position:inherit;
}
.nav li ul li ul{
	right: -140px;
		top: 0px;
}

	</style>
<body>
<nav id="site-navigation" role="navigation" class="row row-center">
	<div id="header" >
		<h1>
			<a href="index.php">Creditos y Mipymes</a>
		</h1>


		<ul class="nav">
			<li><a href="index.php">Inicio</a>
				<ul >

				<li><a href="cambiopasswlrd.php">Cambio Password</a></li>


				</ul>

			</li>

			<li><a href="index.php">Administracion</a>

				<ul >

				<li><a href="agencias.php">Ingresar Agencia</a></li>
					<li><a href="usuarios.php">Ingreso Usuarios</a></li>
					<li><a href="sector.php">Ingresar Region/Supervisor</a></li>
					<li><a href="producto.php">Ingresar Producto</a></li>
				</ul>
			</li>


      <li><a href="index.php">Visitas</a>

				<ul >

				<li><a href="visita.php">Ingresar Visita</a></li>
				</ul>
			</li>

			<li><a href="index.php">Expedientes</a>
							<ul >
								<li><a href="seleccionarproducto.php">Ingresar</a></li>

								<li><a href="index.php">Buscar</a></li>
								<li><a href="rsupervisor.php">Revision Supervisor</a></li>
										</ul>
			</li>

      <li><a href="index.php">Analista</a>
              <ul >

                <li><a href="canalisis.php">Asignacion Analista</a></li>
                <li><a href="bandejaanalista.php">Bandeja analista</a></li>

                <li><a href="index.php">s</a>
                  <ul >
                    <li><a href="index.php">A</a></li>
                  <li><a href="new-post.php">N</a></li>
                    <li><a href="index.php">d</a></li>
                  </ul>
                </li>
                    </ul>
      </li>



        <li><a href="">Comite</a>

          <ul >

          <li><a href="bandejacomite.php">Bandeja comite</a></li>
          <li><a href="asignacionacta.php">Asignacion Acta</a></li>
          <li><a href="res.php">Resolucion Comite</a></li>

          </ul>


        </li>

        <li><a href="">Desembolsos</a>

          <ul >

          <li><a href="desembolsos.php">Desembolsos</a></li>
          </ul>
        </li>

        <li><a href="">Tarjetas</a>

          <ul >

          <li><a href="tarjetas.php">tarjetas</a></li>
          </ul>
        </li>



        <li><a href="index.php">Bandeja: <?php echo $_SESSION	['username']; ?></a>

      								<li><a href="logout.php">Salir</a></li>

      										</ul>

      			</li>



		</ul>
	</div>
</nav>
<div	 id="content" >
