<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?php
        if(!empty($_SESSION['jugador'])){
            include "./Sudoku.php";
            ?>
            <div>
                <div>
                    <h1 id="nombre">Bienvenido: <?php echo $_SESSION['jugador']; ?></h1>
                </div>
                <div>
                    <form action="doinback.php" method="POST">
                        <input type="submit" name="logout" value="logout">
                    </form>
                </div>
            </div>
            <div style="display: flex">
                <div>
                <pre>
                <?php
                echo "se esta ejecutando";
                    $tablero = new Sudoku();
                    $tablero->InicializarTablero();
                    print_r($tablero->generarSudoku());
                    //print_r($tablero->crearSudoku());
                    ?>
                    </pre>
                </div>
                <div>
                    <pre>
                    <?php
                    print_r($tablero->cambiarIguales());
                ?>
                </pre>
                </div>
            </div>
            <?php
        }else{
            ?>
            <script>
                function validar(e) {
                    const NOMBREMIN = 2;
                    const NOMBREMAX = 10;
                    const REDIRECCIONAMIENTO = 3;
                    let nombre = document.getElementById('nombre');
                    let estado = document.getElementById('estado');
                    let ERROR = "<span style='color: red;'>[ERROR]</span> ";
                    let CORRECTO = "<span style='color: green;'>[CORRECTO]</span> ";
                    const NOMBRE_VACIO = ERROR+"Tienes que poner un nombre";
                    const NOMBRE_CORTO = ERROR+"Tu nombre tiene que ser más largo que "+NOMBREMIN+" y más corto que "+NOMBREMAX+" carácteres";
                    const NOMBRE_LARGO = ERROR+"Tu nombre tiene que ser más corto que "+NOMBREMAX+" y más largo que "+NOMBREMIN+" carácteres";
                    const MENSAJE_CORRECTO = CORRECTO+"Correcto. Todo Listo, te vas a loguear con el nombre: "+nombre.value+" te redireccionaremos en "+REDIRECCIONAMIENTO+" segundos";
                    e.preventDefault();
                    if(nombre.length != 0 && nombre.value != ''){
                        if(nombre.value.length > NOMBREMIN){
                            if(nombre.value.length < NOMBREMAX){
                                estado.innerHTML = MENSAJE_CORRECTO;
                                setTimeout(function(){
                                window.location.reload()
                                }, 3000);
                                document.forms[0].submit();
                            }else{
                                estado.innerHTML = NOMBRE_LARGO;
                                return false;
                            }
                        }else{
                            estado.innerHTML = NOMBRE_CORTO;
                            return false;
                        }
                            
                    }else{
                        estado.innerHTML = NOMBRE_VACIO;
                        return false;
                    }
                    
                }
            </script>
            <div class="">
                <form id="form" action="./doinback.php" onsubmit="return validar(event)" method="POST">
                    <label for="nombre">Ingresa tu nombre:</label>
                    <input type="text" id="nombre" name="nombre" maxlength="10" placeholder="Nombre....">
                    <label for="dias">Quieres que se guarde la partida?</label>
                    <input id="guardar" name="guardar" type="radio">
                    <input id="dias" name="dias" type="" placeholder="Nombre....">
                    <input type="submit" value="enviar">
                </form>
                <div id="estado"></div>
            </div>
            
            <?php
        }
    ?>
</body>
</html>