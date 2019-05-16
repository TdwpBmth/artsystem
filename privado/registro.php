<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/registro.css">
    <title>Registro</title>
</head>
<body>
    <header>Registro</header>
    <section>
        <div id="registro">
            <form action="procesarregistro.php" method="POST">
                <label for="correo"><b>Correo</b></label>
                <p><input name="correo" type="mail" placeholder="correo@dominio.com" required></p>
                <label for="password"><b>Contraseña</b></label>
                <p><input name="password" type="password" placeholder="password" required></p>
                <label for="departamento"><b>Departamento</b></label>
                <?php

                ?>
                <label for="equipo"><b>Equipo</b></label>
                <p><input name="equipo" type="number" placeholder="1" required></p>
                <label for="tipoUsuario"><b>Tipo de Usuario</b></label>
                <p><select name="tipoUsuario">
                    <option value="GERENTE">Gerente</option>
                    <option value="SUPERVISOR">Supervisor</option>
                    <option value="EMPLEADO">Empleado</option>
                </select></p>
                <label for="nombreCompleto"><b>Nombre Completo</b></label>
                <p><input name="nombreCompleto" type="text" placeholder="Gonzalo Martín Gonzales Martinez"></p>
                <input class="btnRegistrar" type="submit" value="Registrar">
            </form>
        </div>
    </section>
</body>
</html>