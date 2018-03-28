<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Idioma</title>
    <meta charset="UTF-8">
  </head>
  <body> 

       
    <?php
      if($_GET["lang"]=="es")
              {
                    echo "<h1>Bienvenido a la página web</h1>";
              }
      if($_GET["lang"]=="en")
              {
                    echo "<h1>Welcome to the website</h1>";
              }
      ?>
  </body>
</html>