<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div id="logo"></div>
    </header>
    <section>
        
        <div id="login">
            <img src="img/sesion.png" >
            <form action="php/procesarlogin.php" method="POST">
               <p><input name="correo" type="mail" placeholder="correo@correo.com" required></p> 
                <p><input  name="contrasenia" type="password" placeholder="Contraseña" required> </p> 
                <input class="btningresar" type="submit" value="Ingresar">
            </form>
        </div>
    </section>
</body>
</html>