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


<?php

    $con=$app_db;

    $sql="SELECT *  FROM agencia";
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> INGRESAR AMPLIACION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h3>Ingrese datos Solicitud Ampliacion </h3>
                                <form action="insertarfiduciario.php" method="POST" enctype="multipart/form-data">
Tipo Ampliacion
                                  <select name="Subproducto" placeholder="">
                                  <option>Ampliacion Fiduciaria</option>
                                  <option>Ampliacion Al Trabajador</option>
                                  </select>

                                  <label><select  name="sagencia">
                                    <?php
                                        $con=$app_db;

                                        $sql1="SELECT *  FROM agencia";
                                        $query1=mysqli_query($con,$sql1);

                                    ?>
                                    <?php
                                      foreach ($query1 as $opciones) {?>
                                          <option   placeholder="Seleccione sector" value="<?php echo $opciones['cod_agencia']?>"><?php echo $opciones['cod_agencia'].'-'.$opciones['Agencia'] ?></option>
                                    <?php  }    ?>


                                    <input type="text" class="form-control mb-3" name="nom_cliente" placeholder="Nombre" required>

                                    <input type="text" class="form-control mb-3" name="dpi_num" placeholder="DPI" required>

                                    Fecha de nacimiento
                                    <input type="date" id="start" name="fecha_nac" value="1985-07-27" min="1950-01-01" max="3000-12-31" required>
                                    <input type="text" class="form-control mb-3" name="direccion" placeholder="Direccon completa" required>


                                     <input type="text" name="Municipio" placeholder="Municipio" required>
                                     <input type="text"  name="Departamento" placeholder="Departamento" required>

                                    Genero
                                    <select name="genero">
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                    </select>
                                    Estado Civil
                                    <select name="estadocivil" width: 10px>
                                    <option>Soltero</option>
                                    <option>Casado</option>
                                    <option>Unido</option>
                                    <option>Divorsiado</option>
                                    </select>
                                    <input type="text" class="form-control mb-3" name="nacionalidad" placeholder="Nacionalidad" required>
                                    <input type="text" class="form-control mb-3" name="profesion" placeholder="Profecion u oficio" required>
                                    <input type="text" class="form-control mb-3" name="trabajo" placeholder="Lugar de trabajo / nombre de negocio" required>
                                    Fecha de Ingreso/ Inicio de operaciones
                                    <input type="date" id="start1" name="finicio" value="2018-07-22" min="1950-01-01" max="3000-12-31">
                                    <input type="text" class="form-control mb-3" name="puesto" placeholder="Puesto" required>
                                    <input type="number" step="0.01" class="form-control mb-3" name="ingresos" placeholder="Ingresos mensuales" required>

                                    <script>
                                    function calcular() {
                                        mont=eval(document.getElementById('monto').value);
                                        plaz1=eval(document.getElementById('plazo').value);
                                        tas=eval(document.getElementById('tasa').value);
                                      mor=eval(document.getElementById('montooriginal').value);
                                      sald=eval(document.getElementById('saldoactual').value);
                                      plazoo=eval(document.getElementById('plazooriginal').value);
                                      cuotasp=eval(document.getElementById('cuotaspagadas').value);
                                        plaz= plaz1/12;
                                        tas1=(tas+0.0044)/100;
                                        tiv = mont + plaz+ tas;
                                        tot1 = (mont*(tas1/12)*(1+tas1/12)**(plaz*12))/((1+tas1/12)**(plaz*12)-1);
                                        tot= tot1.toFixed(2);
                                        amp= mont-sald;
                                        plpend=plazoo-cuotasp;
                                        mamp=plaz1-plpend;
                                        document.getElementById('total').value=tot;
                                        document.getElementById('montoampliar').value=amp;
                                        document.getElementById('plazopendiente').value=plpend;
                                        document.getElementById('mesesaampliar').value=mamp;


                                    }
                                    </script>

                                    <body>
                                    Datos de Ampliacion (Antecedentes)
                                    <br>

                                    <input type="number" step="0.01" class="form-control mb-3" id="montooriginal" name="montooriginal" placeholder="Monto Original" required>
                                    <input type="number" step="0.01" id="saldoactual" class="form-control mb-3" name="saldoactual" onkeyup="calcular()" placeholder="Saldo Actual" required>
                                    <input type="number" step="0.01" id="tasaanterior" class="form-control mb-3" name="tasaanterior" onkeyup="calcular()" placeholder="Tasa de interes actual" required>

                                    Plazo original (Meses)
                                    <select id="plazooriginal" name ="plazooriginal" onclick="calcular()"  required>
                                    <option>6</option>
                                    <option>12</option>
                                    <option>18</option>
                                    <option>24</option>
                                    <option>30</option>
                                    <option>36</option>
                                    <option>42</option>
                                    <option>48</option>
                                    <option>54</option>
                                    <option>60</option>
                                    </select>

                                    <input type="number" step="0.01" class="form-control mb-3" id="cuotaspagadas" name="cuotaspagadas" placeholder="cuotaspagadas" onkeyup="calcular()" required>
Datos de la nueva operacion (Ampliacion)
<input type="text" id="monto" name ="monto"  placeholder="Ingrese Monto total Solicitado" onkeyup="calcular()" required />

<br>
    Seleccione Plazo (Meses plazo total del credito a partir de desembololso de ampliacion)
                                    <select id="plazo" name ="plazo" onclick="calcular()"  required>
                                    <option>6</option>
                                    <option>12</option>
                                    <option>18</option>
                                    <option>24</option>
                                    <option>30</option>
                                    <option>36</option>
                                    <option>42</option>
                                    <option>48</option>
                                    <option>54</option>
                                    <option>60</option>
                                    </select>
                                    <input type="text" id="tasa" name ="tasa" placeholder="Ingre tasa de interes propuesta" onkeyup="calcular()" required />
                                    <input type="text" id="total" name ="total" placeholder="Cuota Mensual" onkeyup="calcular()" />
                                    <input type="text" class="form-control mb-3" name="prospeccion" placeholder="% por Prospeccion"/ required>
                                    Fecha de pago cada mes
                                    <input type="text" class="form-control mb-3" name="fechapago" value="5" placeholder="Fecha de pago"/ required>
                                    <input type="text" class="form-control mb-3" name="destino" placeholder="Destino de credito"/ required>
                                    </label>
                                    Ampliacion
                                    <br>
                                    Moto a ampliar
                                  <input type="text" id="montoampliar" name ="montoampliar" placeholder="Monto a Ampliar" onkeyup="calcular()" />
                                  Plazo Pendiente (Meses)
                                  <input type="text" id="plazopendiente" name ="plazopendiente" placeholder="Plazo Pendiente" onkeyup="calcular()" readonly />
                                  Plazo a ampliar (Meses)
                                  <input type="text" id="mesesaampliar" name ="mesesaampliar" placeholder="Meses a Ampliar" onkeyup="calcular()" readonly />


 <textarea name="comentarios" rows="5"  cols="50" placeholder="Ingrese Comentarios o informacion relevante para el caso si existiera"></textarea><br><br>

                                    <input type="file"  name="archivo" id="archivo"/ required>
                                    <br>



<script type="text/javascript">
<!--
function showMe (it, box) {
var vis = (box.checked) ? "block" : "none";
document.getElementById(it).style.display = vis;
}
//-->
</script>
</head>
<body>
<input type="checkbox" name="c1" onclick="showMe('div1', this)">Testigo a Ruego
 <div id="div1" style="display:none">
<table id="t1">
<tr>
  Ingrese datos de Testigo a Ruego
<td>
  <input type="text" class="form-control mb-3" name="nom_testigo" placeholder="Nombre Testigo" >
  <input type="text" class="form-control mb-3" name="dpi_testigo1" placeholder="DPI Testigo">
</td>
</tr>
</table>
</div>
<br>


</script>
</head>
<body>
<input type="checkbox" name="c2" onclick="showMe('div2', this)">Fiador/ codeudor

 <div id="div2" style="display:none">
<table id="t2">
<tr>
  Ingrese datos
<td>



  <fieldset>
    <legend>Ingresar Fiador/Codeudor</legend>
    <ul>
      <li>
        <label for="soup">Fiador</label>
        <input  type="radio" id="fiador" name="garantia" value="fiador" checked>
        <label for="curry">codeudor</label>
        <input style="float:left" type="radio" id="codeudor" name="garantia" value="codeudor">
      </li>
    </ul>
  </fieldset>



  <input type="text" class="form-control mb-3" name="nom_cliente1" placeholder="Nombre" >
  <input type="text" class="form-control mb-3" name="dpi_num1" placeholder="DPI">
  Fecha de nacimiento
  <input type="date" id="start3" name="fecha_nac1" value="1985-07-27" min="1950-01-01" max="3000-12-31" >
  <input type="text" class="form-control mb-3" name="direccion1" placeholder="Direccon completa">
  <input type="text" name="Municipio1" placeholder="Municipio" >
  <input type="text"  name="Departamento1" placeholder="Departamento">
  Genero
  <select name="genero1">
  <option>Masculino</option>
  <option>Femenino</option>
  </select>
  Estado Civil
  <select name="estadocivil1" width: 10px>
  <option>Soltero</option>
  <option>Casado</option>
  <option>Unido</option>
  <option>Divorsiado</option>
  </select>
  <input type="text" class="form-control mb-3" name="nacionalidad1" placeholder="Nacionalidad" >
  <input type="text" class="form-control mb-3" name="profesion1" placeholder="Profecion u oficio">
  <input type="text" class="form-control mb-3" name="trabajo1" placeholder="Lugar de trabajo / nombre de negocio" >
  Fecha de Ingreso/ Inicio de operaciones
  <input type="date" id="star4" name="finicio1" value="2018-07-22" min="1950-01-01" max="3000-12-31">
  <input type="text" class="form-control mb-3" name="puesto1" placeholder="Puesto" >
  <input type="number"  class="form-control mb-3" name="ingresos1" placeholder="Ingresos mensuales" >

</td>
</tr>
</table>
</div>

<p>



<script type="text/javascript">
<!--
function showMe (it, box) {
var vis = (box.checked) ? "block" : "none";
document.getElementById(it).style.display = vis;
}
//-->
</script>
</head>
<body>
<input type="checkbox" name="c3" onclick="showMe('div3', this)">Testigo a Ruego fiador o codeudor
<div id="div3" style="display:none">
<table id="t3">
<tr>
Ingrese datos de Testigo a Ruego fiador o codeudor
<td>
<input type="text" class="form-control mb-3" name="nom_testigo1" placeholder="Nombre Testigo" >
<input type="text" class="form-control mb-3" name="dpi_testigo2" placeholder="DPI Testigo">

</td>
</tr>
</table>
</div>


                                    <input type="submit"  name="upload" class="btn btn-primary">
                                </form>
                        </div>

                            <?php
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </body>
</html>
