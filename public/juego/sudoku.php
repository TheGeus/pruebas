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
        if(isset($_COOKIE['jugador'])){
            ?>
            <div>
                <h1 id="nombre">Bienvenido: <?php echo $_COOKIE['jugador']; ?></h1>
            </div>
            <?php
        }else{
            ?>
            <script>
                function validar(e) {
                    e.preventDefault();
                    document.forms['']
                    return false;
                }
            </script>
            <form id="form" onsubmit="return validar(event)">
                <label for="nombre">Ingresa tu nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre....">
                <input type="button" value="enviar">
            </form>
            <?php
        }
    ?>
</body>
</html>