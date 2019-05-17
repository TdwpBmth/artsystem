<?php
include("php_file_tree.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/principal.css">
</head>

<body>

    <header>

    </header>
    <div id="contenedor">
        <div id="nav" class="noSeleccionable">
            <?php
		        echo php_file_tree("BlueDLS/", "");
            ?>
            
        </div>

        <section id="main" class="noSeleccionable">
            <div class="grid-container">
                <div class="grid-item"><img src="../img/documentos/Excel.png" class="iconoDocumento">
                    <p>nombre.xls</p>
                </div>
                <div class="grid-item"><img src="../img/documentos/Word.png" class="iconoDocumento"></div>
                <div class="grid-item"><img src="../img/documentos/Excel.png" class="iconoDocumento"></div>
                <div class="grid-item"><img src="../img/documentos/Excel.png" class="iconoDocumento"></div>
                <div class="grid-item">5</div>
                <div class="grid-item">6</div>
                <div class="grid-item">7</div>
                <div class="grid-item">8</div>
                <div class="grid-item">9</div>
            </div>
        </section>
        <section id="aside">
            <span>Arrastre para subir archivo</span><br>
            <button>Cargar</button>
            <button>Seleccionar archivo</button>
        </section>
    </div>

    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function () {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>
</body>


</html>