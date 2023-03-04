<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <header>
        <h1>Mi gran página web</h1>
        <div class="saludo">
            <?php
            if (isset($_SESSION['login'])) {
                if (isset($_SESSION["esAdmin"])) {
                    echo "Bienvenido {$_SESSION['nombre']}. <a href='logout.php'>(logout)</a>";
                } else {
                    echo "Bienvenido {$_SESSION['nombre']}. <a href='logout.php'>(logout)</a>";
                }
            } else {
                echo "Usuario desconocido. <a href='login.php'>Login</a>";
            }
            ?>
        </div>
    </header>

</body>

</html>