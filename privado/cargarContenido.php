<?php

$ruta=$_REQUEST["ruta"];

$archivos=scandir($ruta);
foreach($archivos as $archivo){
    if ($archivo === '.' or $archivo === '..') continue;
    if (is_dir($ruta . '/' . $archivo)) {
    }else{
        $ext = substr($archivo, strrpos($archivo, ".") + 1);
        echo "<div class='grid-item'><img src='../img/documentos/".$ext.".png' class='iconoDocumento'><div>".$archivo."</div></div>";
    }
}