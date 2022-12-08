<div id="content">

    <h1>Crear Marcaje</h1>

    <form name="formMarcaje" method="post" action="/creaMarcaje">
        <input name="IdMarcaje" type="hidden" value="<?php if (isset($IdMarcaje)) echo $IdMarcaje; ?>">
        <label>
            Trabajador
            <input name="Trabajador" type="text" disabled value="<?php echo $Trabajador->Trabajador; ?>">
        </label>
        <label>
            Empresa
            <input name="Empresa" type="text" disabled value="<?php echo $Empresa->Empresa; ?>">
        </label>
        <label>
            Ultimo Marcaje
            <input name="Ultimo" type="text" disabled value="<?php if (isset($IdMarcaje)) echo "Inicio "; else echo "Fin "; ?> <?php if (isset($Ultimo)) echo $Ultimo; ?>">
        </label>
        <label>
            Tiempo Jornada
            <input name="Jornada" type="text" disabled value="<?php if (isset($Jornada)) echo $Jornada; ?>">
        </label>

        <button type="submit" <?php if (isset($IdMarcaje)) echo "disabled"; ?>>Crear Inicio Jornada</button>
        <button type="submit" <?php if (!isset($IdMarcaje)) echo "disabled"; ?>>Crear Fin Jornada</button>
    </form>
</div>