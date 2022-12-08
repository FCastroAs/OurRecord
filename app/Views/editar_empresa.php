<div id="content">

    <h1>Editar Empresa</h1>

    <form name="formEmpresa" method="post" action="/editaEmpresa">
        <input name="IdEmpresa" type="hidden" value="<?php echo $empresa->IdEmpresa; ?>">
        <label>
            Empresa
            <input name="Empresa" type="text" value="<?php echo $empresa->Empresa; ?>">
        </label>
        <label>
            CIF
            <input name="CIF" type="text" value="<?php echo $empresa->CIF; ?>">
        </label>
        <label>
            Email
            <input name="Email" type="text" value="<?php echo $empresa->Email; ?>">
        </label>
        <label>
            Usuario
            <input name="Usuario" type="text" disabled value="<?php echo $usuario->Login; ?>">
        </label>
        <label>
            Contraseña
            <input name="Contraseña" type="text">
        </label>

        <h2>Listado de Trabajadores</h2>

        <table class="table table-bordered table-condensed table-striped">
            <thead>
            <th scope="col">Trabajador</th>
            <th scope="col">NIF</th>
            <th scope="col">Email</th>
            <th scope="col">Activo</th>
            </thead>
            <?php foreach ($trabajadores as $trabajador) { ?>
                <tr>
                    <td><?php echo $trabajador->Trabajador; ?></td>
                    <td><?php echo $trabajador->NIF; ?></td>
                    <td><?php echo $trabajador->Email; ?></td>
                    <td><?php echo $trabajador->Activo; ?></td>
                </tr>
            <?php } ?>
        </table>

        <button type="submit">Guardar</button>
    </form>
</div>