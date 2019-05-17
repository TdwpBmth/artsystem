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
    <script src="dropzone.js"></script>
    <script src="php_file_tree.js"></script>
    <link rel="stylesheet" href="../css/dropzone.css">

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
            <div class="grid-container" id="aaa">

            </div>
        </section>
        <section id="drop">
            <div >
                <form action="/upload-target" class="dropzone drop">
                    <div class="dz-default dz-message">
                        <span>Arrastre archivos para subir</span>
                    </div> 
                </form>
            </div>
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