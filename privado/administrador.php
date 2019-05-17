<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración</title>
    <link rel="stylesheet" href="../css/administrador.css">
</head>
<body>
    <div class="sidenav">
        <a onclick="cargarUsuarios()">Usuarios</a>
        <a onclick="cargarDepartamentos()">Departamentos</a>
      </div>
      
      <div id="main" class="main">

      </div>

      <script>
          function cargarUsuarios(){
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("main").innerHTML=this.responseText;
                  }
              };
              xmlhttp.open("GET","cargarUsuarios.php",true);
              xmlhttp.send();
          }
          function cargarDepartamentos(){
            var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("main").innerHTML=this.responseText;
                  }
              };
              console.log("a");
              xmlhttp.open("GET","cargarDepartamentos.php",true);
              xmlhttp.send();
          }
      </script>

</body>
</html>