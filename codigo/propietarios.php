<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    #NOPAGADA{
      color: red;
    }
    #pf{
      background-color: #F6CECE;
    }
    a{
      padding: 10px 20px;
      font-size: 1.3em;
      text-align: center;
    }
    table{
      margin-top: 3%;
    }
  </style>
  <script>
      
        function confirmarEliminación(id){
            var mensaje;
            var opcion = confirm("¿Está seguro de que desea eliminar este registro?");
            if (opcion == true) {
                mensaje = "Has clickado OK";
                location.href ="listar.php?id="+id;
                } else {
                    mensaje = "Has clickado Cancelar";
                }
                console.log(mensaje);
        }
  </script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Propietarios</h1>
</div>
  
<div class="container" id="contenido">

<?php
$contador =0;
$co =0;
$hoy = getdate();


    require 'base.php';
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql=$conn->query("DELETE from usuarios where id=$id");
    }

if ($link = new mysqli("localhost:3305", "root", "", "formulario")){
  if ($cons = new mysqli("localhost:3305", "root", "", "formulario"))
    if ($men = new mysqli("localhost:3305", "root", "", "formulario"))

    
    // 2) Preparar la orden SQL
    $consulta=$cons->query("SELECT * FROM usuarios WHERE NOT id= 18 AND cuota = 'PAGADA' ");
    
    // 3) Ejecutar la orden y obtener datos
   
    $result= $link->query("SELECT * FROM usuarios WHERE NOT id= 18 AND cuota = 'NO PAGADA' " );
    
    // 4) Ir Imprimiendo las filas resultantes
   
            while($fila = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<div class="card" id="'.$fila["id"].'">';
                echo '<div class="card-header">'.'Clave: '.$fila["id"].'</div>';
                echo '<div class="card-body">';
                   echo'<h5 class="card-title">'. $fila["nom"].'</h5>';
                   echo '<p class="card-text">Email: '.$fila["email"].'</p>';
                   echo '<p class="card-text">Fecha de nacimiento: '.$fila["cumple"].'</p>';
                   echo '<p class="card-text">Taxi: '.$fila["taxi"].'</p>';
                  echo 'Cuota:<p class="card-text" id="NOPAGADA"> '.$fila["cuota"].'</p>';
                   echo '<div class="row">
                   <div class="col-1"><button type="submit" onclick="confirmarEliminación('.$fila["id"].')" id="boton_eliminar">Eliminar</button></div>
                        </div>';
                echo '</div></div>';
                echo '<br>';
                $co=$co+1;
                $falta = $fila["nom"];
                
            }
            $link->close();

             while($fila = $consulta->fetch_array(MYSQLI_ASSOC)){
                echo '<div class="card" id="'.$fila["id"].'">';
                echo '<div class="card-header">'.'Clave: '.$fila["id"].'</div>';
                echo '<div class="card-body">';
                   echo'<h5 class="card-title">'. $fila["nom"].'</h5>';
                   echo '<p class="card-text">Email: '.$fila["email"].'</p>';
                   echo '<p class="card-text">Fecha de nacimiento: '.$fila["cumple"].'</p>';
                   echo '<p class="card-text">Taxi: '.$fila["taxi"].'</p>';
                   echo 'Cuota:<p class="card-text" id="'.$fila["cuota"].'"> '.$fila["cuota"].'</p>';
                   echo '<div class="row">
                   <div class="col-1"><button type="submit" onclick="confirmarEliminación('.$fila["id"].')" id="boton_eliminar">Eliminar</button></div>
                        </div>';
                echo '</div></div>';
                echo '<br>';
                $contador= $contador+500;
            }

            echo '<table class="table">';
	                echo '<tr><TH>Pagos del mes</TH>';
                    echo '<td>'.$hoy["mon"].'</td></tr>';
                  echo '<tr><TH>Cuota por Propietario</TH>';
                    echo '<td>$500</td></tr>';
                  echo '<tr><TH>Pagos Totales Mensuales</TH>';
                    echo '<td>$'.$contador.'</td></tr>';
                  echo '<tr><TH id="pf">Pagos Faltantes</TH>';
                    echo '<td id="pf">'.$co.'</td></tr>';
            echo '</table>';
         /*   echo '<div class="card">';
            echo '<div class="card-header">'.'Pagos del mes '.$hoy["mon"].'</div>';
            echo '<div class="card-header">'.'Cuota por Propietario:$500 </div>';
            echo '<div class="card-header">'.'Pagos Totales Mensuales: $'.$contador.'</div>';
            echo '<div class="card-header" id="pf">'.'Pagos Faltantes: '.$co.'</div>';
            echo '</di>';
            echo '</di>';
            echo '</div>';*/
            $cons->close();

            $mes = $hoy["mon"];
            $total = $contador;

            $sql = "INSERT INTO mensual (mes, total, falta) VALUES (:mes, :total, :falta)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':mes', $mes);
    $stmt->bindParam(':total', $total);
    $stmt->bindParam(':falta', $falta);
    $stmt->execute();
    
   // }
    
    }else{
    echo "<p> MySQL no conoce ese usuario y password</p>";
    }
    
?>
<br>
<div class="row">
    <div class="col">
      <a href="perfilD.php">Volver</a>
    </div>
    <div class="col">
      <a href="listar.php">Pagos anuales</a>
    </div>
</div>
<br>
</div>

</body>
</html>