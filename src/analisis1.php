<?php
session_start();
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 5 && $_SESSION['rol'] != 2)) {

  exit();
}
?>
 <?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
 <?php
 $expediente = $_GET["expediente"];
 $conn=$app_db;
  ?>
  <?php
    $sql = "SELECT * FROM comentarios WHERE expediente = $expediente";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result = $conn->query($sql);

    $sql1 = "SELECT * FROM solicitudes WHERE solicitud = $expediente";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
    $result1 = $conn->query($sql1);

    echo "<li><a target='_blank' href=\"consultasol.php?expediente=".$_GET["expediente"]. "\" >Ver Solicitud completa</a></li>";  // Cambia los nombres de las columnas según tu estructura de datos

    date_default_timezone_set('America/Guatemala');

    $fechaActual = date("d-m-Y");
    $horaActual = date("H:i:s");
    $nsolicitud= date("Y").date("m").date("d").date("H").date("i").date("s");
    $afactual=date('d-m-Y H:i:s');

    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $subproducto=$row1["subproducto"];
            $dpi=$row1["dpicliente"];
            $supervisor=$row1["supervisor"];
            $agencia=$row1["agencia"];
            $ncliente=$row1["ncliente"];
            $fnac=$row1["fnac"];
            $edad=$row1["edad"];
            $fingreso=$row1["fingreso"];
            $ltrabajo=$row1["ltrabajo"];
            $tiempolaboral=$row1["tiempolaboral"];
            $ingresos=$row1["ingresos"];
            $puesto=$row1["puesto"];
            $monto=$row1["montosolicitado"];
            $plazo=$row1["plazomeses"];
            $tasa=$row1["tasa"];
            $cuota=$row1["cuota"];
            $prospeccion=$row1["prospeccion"];
            $destino=$row1["destino"];


        }

    } else {
        echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
    }
 ?>
 <?php

    $con=$app_db;
    $sql = "SELECT * FROM solicitudes WHERE dpicliente = '$dpi'";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);

 ?>
 <h4>Archivos del expediente</h4>
 <?php
 $directorio = 'Archivos/expedientes/'.ltrim($expediente)  ; // Reemplaza con la ruta de la carpeta que deseas mostrar los archivos
 echo "<table>";
  if (file_exists($directorio) && is_dir($directorio)) {
      $archivos = scandir($directorio);
      echo "<ul>";
      foreach ($archivos as $archivo) {
          if ($archivo !== "." && $archivo !== "..") {
              echo "<tr><td><li><a target='_blank' href=\"ver_archivo.php?archivo=" . urlencode($archivo)."&expediente=".ltrim($expediente) . "\" >" . $archivo . "</a></li></td></tr>";
                  }

      }
 echo "</table>";
 //echo "<li><a target='_blank' href=\"subirnuevoarchivo.php?expediente=".$expediente. "\" ><img src='assets\descarga.jfif' alt='Imagen'></a></li>";

} else {
//echo "<li><a target='_blank' href=\"subirnuevoarchivo.php?expediente=".$expediente. "\" ><img src='assets\descarga.jfif' alt='Imagen'></a></li>";

}

 ?>

<form action="dic.php?expediente=<?php echo $expediente?>" method="POST">

  <table>
		<tr>
			<td><input type="text" class="form-control mb-3" name="toperacion" value="<?php echo $subproducto; ?>" placeholder="Tipo de Operacion"  readonly></td>
			<td>  <input type="text" class="form-control mb-3" name="fechadictamen" placeholder="Fecha de dictamen"value="<?php echo $afactual; ?>"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="supervisor" value="<?php echo $supervisor; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td>  <input type="text" class="form-control mb-3" name="agencia" placeholder="Fecha de dictamen"value="<?php echo $agencia; ?>"  readonly></td>

  	</tr>
		<tr style="background-color: green;">
			<td align="center">Datos Personales</td>
		</tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="ncliente" value="<?php echo $ncliente; ?>" placeholder="Tipo de Operacion"  readonly></td>
			<td>  <input type="text" class="form-control mb-3" name="fnac" placeholder="Fecha de dictamen"value="<?php echo $fnac; ?>"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="edad" value="<?php echo $edad. " años"; ?>" placeholder="Tipo de Operacion"  readonly></td>
    </tr>
  </tr>
  <tr style="background-color: green;">
    <td align="center">Datos Laborales</td>
  </tr>

    <tr>
    	<td>  <input type="text" class="form-control mb-3" name="ltrabajo" placeholder="Fecha de dictamen"value="<?php echo $ltrabajo; ?>"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="fingreso" value="<?php echo $fingreso; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="tiempolaboral" value="<?php echo $tiempolaboral. " años"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" id= "ingresos" name="ingresos" value="<?php echo $ingresos; ?>" placeholder="Ingresos"  readonly></td>

    </tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="puesto" value="<?php echo $puesto; ?>" placeholder="Tipo de Operacion"  readonly></td>

    </tr>

  </tr>
  <tr style="background-color: green;">
    <td align="center">Solicitado</td>
  </tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="monto" value="Q. <?php echo $formateado = number_format($monto, 2, '.', ','); ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="plazo" value="<?php echo $plazo ." meses"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="tasa" value="<?php echo $tasa." %"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="cuota" value="Q. <?php echo $formateado = number_format($cuota, 2, '.', ','); ?>" placeholder="Tipo de Operacion"  readonly></td>

    </tr>

    <tr>
      <td><input type="text" class="form-control mb-3" name="prospeccion" value="<?php echo $prospeccion." %"; ?>" placeholder="Tipo de Operacion"  readonly></td>
      <td><input type="text" class="form-control mb-3" name="destino" value="<?php echo $destino; ?>" placeholder="Tipo de Operacion"  readonly></td>
    </tr>


    <tr style="background-color: green;">
      <td align="center">Sugeridos</td>
    </tr>

      <tr>
        <td><input type="text" class="form-control mb-3" id="montos" name="montos" value="<?php echo $formateado = number_format($monto, 2, '.', ','); ?>" placeholder="Monto Sugerido" onkeyup="calcular()"></td>
        <td><input type="text" class="form-control mb-3" id="plazos" name="plazos" value="<?php echo $plazo; ?>" placeholder="Plazo sugerido" onkeyup="calcular()" ></td>
          <td><input type="text" class="form-control mb-3" id="tasas" name="tasas" value="<?php echo $tasa; ?>" placeholder="Tasa sugerida" onkeyup="calcular()" ></td>

        <script>
        function calcular() {
            mont=eval(document.getElementById('montos').value);
            plaz1=eval(document.getElementById('plazos').value);
            tas=eval(document.getElementById('tasas').value);
            plaz= plaz1/12;
            tas1=(tas+0.0044)/100;
            tiv = mont + plaz+ tas;
            tot1 = (mont*(tas1/12)*(1+tas1/12)**(plaz*12))/((1+tas1/12)**(plaz*12)-1);
            tot= tot1.toFixed(2);
            document.getElementById('cuotas').value=tot;
        }
        </script>

        <td><input type="text" class="form-control mb-3"id="cuotas" name="cuotas" value="Q. <?php echo $formateado = number_format($cuota, 2, '.', ','); ?>" placeholder="Cuota" onkeyup="calcular()"></td>

      </tr>


          <tr style="background-color: green;">
            <td align="center">Tarjeta de credito sugerida</td>
          </tr>

            <tr>

              <td><select name="select">
  <option value="value1"selected>No</option>
  <option value="value2" >Si</option>

</select></td>
              <td><input type="text" class="form-control mb-3" id="monto" name="montos" value=0 placeholder="Monto Sugerido" onkeyup="calcular()"></td>

            </tr>



<tr style="background-color: green;">
  <td align="center">Capacidad de pago y Referencias</td>
</tr>

  <tr>
    <td><input type="text" class="form-control mb-3" id="pcreditos" name="pcreditos"  placeholder="Pagos Mensuales credito" onkeyup="calcularr()"></td>
    <td><input type="text" class="form-control mb-3" id="ptarjetas" name="ptarjetas" placeholder="Pagos Mensuales Tarjetetas"  onkeyup="calcularr()" ></td>

    <script>
    function calcularr() {
        pcreditos=eval(document.getElementById('pcreditos').value);
        ptarjetas=eval(document.getElementById('ptarjetas').value);
        ingresos=eval(document.getElementById('ingresos').value);

        rci=((pcreditos+ptarjetas) /ingresos)*100;
        rci1= rci.toFixed(2);
        document.getElementById('rci').value=rci1;
    }
    </script>

    <td><input type="text" class="form-control mb-3" id="rci" name="rci"  placeholder="Rci" onkeyup="calcularr()"></td>

  </tr>




      <tr>
        <td><input type="text" class="form-control mb-3" name="sib"  placeholder="Calificacion SIB"></td>
        <td><input type="text" class="form-control mb-3" name="transunion"  placeholder="Calificacion Transunion" ></td>
        <td><input type="text" class="form-control mb-3" name="infornet"  placeholder="Calificacion Infornet" ></td>

      </tr>

      <tr style="background-color: green;">
        <td align="center">Estados de cuenta</td>
      </tr>

      <tr>
        <td><input type="text" class="form-control mb-3" name="d"  value="Depositos" readonly placeholder="Depositos mes 1" ></td>
        <td><input type="text" class="form-control mb-3" name="s" value="Saldos" readonly placeholder="Saldo mes 1" ></td>
      </tr>
        <tr>
          <td><input type="text" class="form-control mb-3" value=0 id="dm1" name="dm1"  placeholder="Depositos mes 1" onkeyup="calcularrr()" onkeydown="dm1e(event)"></td>

          <script>
            function dm1e(event) {
              var tecla = event.key;

              if (tecla === "+" || tecla === "-") {
                event.preventDefault();

                var input = document.getElementById("dm1");
                var valor = input.value;

                var numeros = valor.split("+");
                var resultado = 0;
                for (var i = 0; i < numeros.length; i++) {
                  resultado += parseFloat(numeros[i]);
                }

              input.value = resultado + tecla;
              }
            }
          </script>

          <td><input type="text" class="form-control mb-3" value=0 id="sm1" name="sm1"  placeholder="Saldo mes 1" onkeyup="calcularrr()" onkeydown="sm1e(event)"></td>
          <script>
            function sm1e(event) {
              var tecla = event.key;

              if (tecla === "+" || tecla === "-") {
                event.preventDefault();

                var input = document.getElementById("sm1");
                var valor = input.value;

                var numeros = valor.split("+");
                var resultado = 0;
                for (var i = 0; i < numeros.length; i++) {
                  resultado += parseFloat(numeros[i]);
                }

              input.value = resultado + tecla;
              }
            }
          </script>


        </tr>
        <tr>
          <td><input type="text" class="form-control mb-3" value=0 id="dm2" name="dm2"  placeholder="Depositos mes 2" onkeyup="calcularrr()" onkeydown="dm2e(event)"></td>

          <script>
            function dm2e(event) {
              var tecla = event.key;

              if (tecla === "+" || tecla === "-") {
                event.preventDefault();

                var input = document.getElementById("dm2");
                var valor = input.value;

                var numeros = valor.split("+");
                var resultado = 0;
                for (var i = 0; i < numeros.length; i++) {
                  resultado += parseFloat(numeros[i]);
                }

              input.value = resultado + tecla;
              }
            }
          </script>


          <td><input type="text" class="form-control mb-3" value=0 id="sm2" name="sm2"  placeholder="Saldo mes 2" onkeyup="calcularrr()" onkeydown="sm2e(event)"></td>
          <script>
            function sm2e(event) {
              var tecla = event.key;

              if (tecla === "+" || tecla === "-") {
                event.preventDefault();

                var input = document.getElementById("sm2");
                var valor = input.value;

                var numeros = valor.split("+");
                var resultado = 0;
                for (var i = 0; i < numeros.length; i++) {
                  resultado += parseFloat(numeros[i]);
                }

              input.value = resultado + tecla;
              }
            }
          </script>


        </tr>
        <tr>
          <td><input type="text" class="form-control mb-3"value=0 id="dm3" name="dm3"  placeholder="Depositos mes 3" onkeyup="calcularrr()" onkeydown="dm3e(event)"></td>
          <script>
            function dm3e(event) {
              var tecla = event.key;

              if (tecla === "+" || tecla === "-") {
                event.preventDefault();

                var input = document.getElementById("dm3");
                var valor = input.value;

                var numeros = valor.split("+");
                var resultado = 0;
                for (var i = 0; i < numeros.length; i++) {
                  resultado += parseFloat(numeros[i]);
                }

              input.value = resultado + tecla;
              }
            }
          </script>



          <td><input type="text" class="form-control mb-3"value=0 id="sm3" name="sm3"  placeholder="Saldo mes 3" onkeyup="calcularrr()" onkeydown="sm3e(event)"></td>
          <script>
            function sm3e(event) {
              var tecla = event.key;

              if (tecla === "+" || tecla === "-") {
                event.preventDefault();

                var input = document.getElementById("sm3");
                var valor = input.value;

                var numeros = valor.split("+");
                var resultado = 0;
                for (var i = 0; i < numeros.length; i++) {
                  resultado += parseFloat(numeros[i]);
                }

              input.value = resultado + tecla;
              }
            }
          </script>

        </tr>
        <tr>

          <td><input type="text" class="form-control mb-3" id="dm4" name="dm4"  placeholder="Depositos Promedio" readonly ></td>
          <td><input type="text" class="form-control mb-3" id="sm4" name="sm4"  placeholder="Saldo Promedio" readonly></td>
        </tr>
        <script>
        function calcularrr() {
            dm1=eval(document.getElementById('dm1').value);
            dm2=eval(document.getElementById('dm2').value);
            dm3=eval(document.getElementById('dm3').value);

            sm1=eval(document.getElementById('sm1').value);
            sm2=eval(document.getElementById('sm2').value);
            sm3=eval(document.getElementById('sm3').value);

            sp=((sm1+sm2+sm3) /3);
            dp=((dm1+dm2+dm3) /3);
            sp1= sp.toFixed(2);
            dp1= dp.toFixed(2);
            document.getElementById('dm4').value=dp1;
            document.getElementById('sm4').value=sp1;
        }
        </script>




	</table>

<textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>

</label>

   <button name="submit" value="Espera_comite">Recomendado</button>
  <button name="submit" value="Pendiente">Pendiente</button>
  <button name="submit" value="Denegado">Denegado</button>

</form>

  <h4>Solcitudes Anteriores</h4>

 <div class="container mt-5">
        <div class="row">

            <div class="col-md-3">
            </div>
            <div class="col-md-8">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th></th>
                            <th>Solicitud</th>
                            <th>Agencia</th>
                            <th>Cliente</th>
                            <th>Monto</th>
                            <th>Estado</th>
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
                                    <th><?php  echo $row['solicitud']?></th>
                                    <th><?php  echo $row['agencia']?></th>
                                    <th><?php  echo $row['ncliente']?></th>
                                    <th><?php  echo "Q. ".$formateado = number_format($row['montosolicitado'], 2, '.', ',')?></th>
                                    <th><?php  echo $row['estado']?></th>
                                    <th><a target="_blank" href="solicitudesanteriores.php?expediente= <?php echo $row['solicitud'] ?>"  class="btn btn-info">VER</a></th>
                                </tr>
                            <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
 </div>


 <?php

 // Cerrar la conexión a la base de datos
 $conn->close();
 ?>


 <?php require( 'templates/footer.php' );?>
