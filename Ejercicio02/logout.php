<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['nombre']);
unset($_SESSION['esAdmin']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="estilo.css">
    <meta content="text/html; charset=utf-8">
    <title>logout</title>
</head>

<body>
    <div id=contenedor>

        <?php include 'cabecera.php' ?>

        <?php include 'sidebarIzq.php' ?>

        <main>
            <article>
                <h1>Logout</h1>
                <p>La sesión ha sido cerrada. Tenga un buen día</p>
            </article>

        </main>

        <?php include 'sidebarDer.php' ?>

        <?php include 'pie.php' ?>

    </div> <!-- Fin del contenedor -->

</body>

</html>