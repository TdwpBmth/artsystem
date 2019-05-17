<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/principal.css">
    <script src="dropzone.js"></script>
    <link rel="stylesheet" href="../css/dropzone.css">

</head>

<body>

    <header>

    </header>
    <div id="contenedor">
        <div id="nav" class="noSeleccionable">
        </div>

        <section id="main" class="noSeleccionable">
            <div class="grid-container">
                <div class="grid-item"><img src="../img/documentos/Excel.png" class="iconoDocumento">
                    <p>nombre.docx</p>
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
    <script></script>
</body>


</html>