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
        a{
            padding: 10px 20px;
            font-size: 1.3em;
            text-align: center;
        }
        .card-header{
            font-size: 1.3em;
        }
        .card-body{
            font-size: 1.2em;
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
  <h1>Pagos</h1>
</div>
  
<div class="container" id="contenido">

<?php
    require 'base.php';
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql=$conn->query("DELETE from usuarios where id=$id");
    }

if ($link = new mysqli("localhost:3305", "root", "", "formulario")){
    
   
    $result= $link->query("SELECT * FROM mensual");
    
    // 4) Ir Imprimiendo las filas resultantes
    $fila = $result->fetch_array(MYSQLI_ASSOC);
            ///while($fila = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<div class="card">';
                   echo '<div class="card-header">'.'Mes: '.$fila["mes"].'</div>';
                   echo '<div class="card-body ">Total de cuotas: '.$fila["total"].'</div>';
                   echo '<div class="card-body ">Propietarios sin pagar: '.$fila["falta"].'</div>';
                echo '</div>';
                echo '<br>';

           // }
            $link->close();
    
   // }
    
    }else{
    echo "<p> MySQL no conoce ese usuario y password</p>";
    }
    
?>
<div class="row">
<a href="perfilD.php">Volver</a>
</div>
</div>
</body>
</html>