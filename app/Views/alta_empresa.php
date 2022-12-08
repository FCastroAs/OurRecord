<div id="content">

    <h1>Alta Empresa</h1>

    <form name="formAltaEmpresa" method="post" action="creaEmpresa">
        <label>
            Empresa
            <input name="Empresa" type="text">
        </label>
        <label>
            CIF
            <input name="CIF" type="text">
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
        <button type="submit">Crear Empresa</button>
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