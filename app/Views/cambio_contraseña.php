<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OurRecord</title>
    <meta name="description" content="Control de jornadas de trabajadores">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="/estilos.css" rel="stylesheet" />
    <script src="/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>

    </style>

</head>
<body>

<!-- HEADER -->
<header>

</header>
    <div class="wrapperLogin fadeInDown">
        <div id="formContent">
            <h2>Debe establecer una nueva contraseña</h2>
            <form name="formLogin" method="post" action="actualizaContraseña">
                <input type="hidden" name="IdUsuario">
                <input type="text" class="fadeIn second" name="nuevaContraseña" placeholder="Contraseña">
                <input type="text" class="fadeIn third" name="nuevaContraseña2" placeholder="Repita Contraseña">
                <input type="submit" class="fadeIn fourth" value="Aceptar">
            </form>
        </div>
    </div>

    <?php
        $session = session();
        if ($session->getFlashdata("error") != null){
            echo("<div>" . $session->getFlashdata("error") . "</div>");
        }
    ?>

<footer>

</footer>

<!-- SCRIPTS -->

<!-- -->

</body>
</html>
