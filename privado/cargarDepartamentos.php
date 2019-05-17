<?php
require_once "bd.php";
require_once "departamento.php";

$listaDepartamentos=Departamento::cargarDepartamentosTodo();
echo "<button>Registrar</button>";
echo "<br>";
echo "<table>";
echo "<tr><th>Departamento</th><th>Encargado</th><th></th></tr>";
foreach ($listaDepartamentos as $departamento) {
    echo "<tr>";
    echo "<th>".$departamento[0]."</th>";
    echo "<th>".$departamento[1]."</th>";
    echo "<th><a href='modificarDepartamento.php'>Modificar</a></th>";
    echo "</tr>";
}
echo "</table>";