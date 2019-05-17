<?php
    require_once "cargartodo.php";   

    class listaRutas{
        protected $stack;
        protected $limit;
        
        public function __construct($limit = 999) {
            $this->stack = array();
            $this->limit = $limit;
        }

        public function push($item) {
            // trap for stack overflow
            if (count($this->stack) < $this->limit) {
                // prepend item to the start of the array
                array_unshift($this->stack, $item);
            } else {
                throw new RunTimeException('Stack is full!'); 
            }
        }

        public function pop() {
            if ($this->isEmpty()) {
                // trap for stack underflow
              throw new RunTimeException('Stack is empty!');
          } else {
                // pop item from the start of the array
                return array_shift($this->stack);
            }
        }

        public function top() {
            return current($this->stack);
        }
    
        public function isEmpty() {
            return empty($this->stack);
        }

    }

    function cargarDocumentos($contador, $rutas){
        $contador++;
        $archivos=scandir($rutas->top());
        foreach($archivos as $archivo){
            if ($archivo === '.' or $archivo === '..') continue;
            if (is_dir($rutas->top() . '/' . $archivo)) {
                $rutas->push($rutas->top().'/'.$archivo);
                echo "<ul class='nested'>";
                echo "<li><span class='caret'>".$rutas->top()."</span>";
                cargarDocumentos($contador,$rutas);
                echo "</li>";
                echo "</ul>";
                $rutas->pop();
            }
        }
    }
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
                 
                $rutas=new listaRutas();
                $rutas->push("BlueDLS");
                 echo "<ul id='myUL'>";
                 echo "<li><span class='caret'>BlueDLS</span>";
                     cargarDocumentos(0,$rutas);
                 echo "</li>";
                 echo "</ul>";

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