<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Operación</title>
    <meta charset="UTF-8">
  </head>
  <body> 
      <h1>Operación</h1>
  
    <?php
      if($_GET["op"]=="suma")
              {
                    echo "La suma es ".($_GET["op1"]+$_GET["op2"]);
              }
      if($_GET["op"]=="resta")
              {
                    echo "La resta es ".($_GET["op1"]-$_GET["op2"]);
              }
      if($_GET["op"]=="multiplicacion")
              {
                    echo "La multiplicación es ".($_GET["op1"]*$_GET["op2"]);
              }
      if($_GET["op"]=="division")
              {
                    echo "La divisin es ".($_GET["op1"]/$_GET["op2"]);
              }
      ?>
  </body>
</html>

