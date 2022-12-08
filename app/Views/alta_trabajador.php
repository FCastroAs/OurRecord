<div id="content">

    <h1>Alta Trabajador</h1>

    <form name="formAltaTrabajador" method="post" action="creaTrabajador">
        <label>
            Trabajador
            <input name="Trabajador" type="text">
        </label>
        <label>
            NIF
            <input name="NIF" type="text">
        </label>
        <label>
            Email
            <input name="Email" type="text">
        </label>
        <label>
            Usuario
            <input name="Usuario" type="text">
        </label>
        <label>
            Contraseña
            <input name="Contraseña" type="text">
        </label>
        <button type="submit">Crear Trabajador</button>
    </form>

    <?php
    $session = session();
    if ($session->getFlashdata("error") != null){
        echo("<div>");
        echo($session->getFlashdata("error"));
        echo("</div>");
    }
    ?>

</div>