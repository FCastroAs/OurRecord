<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OurRecord</title>
    <meta name="description" content="Control de jornadas de trabajadores">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <script src="/jquery-3.6.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <link href="/estilos.css" rel="stylesheet" />

    <style>

    </style>

</head>
<body>

<!-- HEADER -->
<header>

</header>
    <div class="wrapperLogin fadeInDown">
        <div id="formContent">
            <h1>Our Record</h1>
            <?php
            $session = session();
            if ($session->getFlashdata("error") != null){
                echo("<div style='color: red'>" . $session->getFlashdata("error") . "</div>");
            }
            ?>
            <form name="formLogin" method="post" action="/login">
                <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuario">
                <input type="text" id="contraseña" class="fadeIn third" name="contraseña" placeholder="Contraseña">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
        </div>
    </div>



<footer>

</footer>

<!-- SCRIPTS -->

<!-- -->

</body>
</html>
