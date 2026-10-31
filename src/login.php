<?php
session_start();
if(isset($GET['cerrar_sesion'])){
  session_unset();
  session_destroy();
}
if (isset($_SESSION['rol'])) {
  switch ($_SESSION['rol']) {
    case 1:
      header('location: index.php');
      break;

      case 2:
        header('location: index.php');
        case 3  :
          header('location: index.php');
          case 4:
            header('location: index.php');
            case 5  :
              header('location: index.php');
              case 6:
                header('location: index .php');
                case 7  :
                  header('location: colab.php');
                  case 8:
                    header('location: colab.php');
                    case 9  :
                      header('location: colab.php');

      break;


  }
  // code...
}



if(isset($_POST['username']) && isset($_POST['password'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  require( 'init.php' );

  $app_db=  mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
if ($app_db=== false) {
	die('Eror al conectar con la base de datos');
	// code...
}

  $result = mysqli_query($app_db,'SELECT*FROM usuarios');
	$all_post = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$post_found=false;
if (isset($username)) {
	// code...

	$query="SELECT*FROM usuarios WHERE username='" . $username. "'";
	$result= mysqli_query($app_db,$query);

if($result){
 	$post_found= mysqli_fetch_assoc($result);
	$all_posts= [$post_found];

	if ($post_found['username']==$username AND $post_found['password']==$password) {
		$rol= $post_found['rol_id'];
    $correoingreso= $post_found['correo'];
    	$username= $post_found['username'];

      $codigoempleado= $post_found['codigoempleado'];
      $nombrecolaborador= $post_found['nombrecolaborador'];
      $sectorsupervisor= $post_found['id_sector'];

  $_SESSION	['rol']=$rol;
  $_SESSION	['username']=$username;
  $_SESSION	['correoingreso']=$correoingreso;


  $_SESSION	['codgigoempleado']=$codigoempleado;
  $_SESSION	['nombrecolaborador']=$nombrecolaborador;
  $_SESSION	['sectorsupervisor']=$sectorsupervisor;

  if (isset($_SESSION['rol'])) {
	  switch ($_SESSION['rol']) {
	    case 1:
	      header('location: admin.php');
	      case 2:
	        header('location: colab.php');
          case 3  :
            header('location: colab.php');
            case 4:
              header('location: colab.php');
              case 5  :
                header('location: colab.php');
                case 6:
                  header('location: colab.php');
                  case 7  :
                    header('location: colab.php');
                    case 8:
                      header('location: colab.php');
                      case 9  :
                        header('location: colab.php');

        break;


	  }
	  // code...
	}
	}

}

}
}
require( 'templates/header1.php' );
?>



<form action "#" method="POST">
		Usuario:<br/><input type="text" name="username"></br>
		Password: <br/><input type="password" name="password"></br>
		<input type="submit" name="Ingresar"></br>

</form>
					</span>
				</footer>
			</article>

	</div>
<?php require( 'templates/footer.php' );
