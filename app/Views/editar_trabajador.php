<div id="content">

    <h1>Editar Trabajador</h1>

    <form name="formTrabajador" method="post" action="/editaTrabajador">
        <input name="IdTrabajador" type="hidden" value="<?php echo $trabajador->IdTrabajador; ?>">
        <input name="IdEmpresa" type="hidden" value="<?php echo $trabajador->IdEmpresa; ?>">
        <label>
            Trabajador
            <input name="Trabajador" type="text" value="<?php echo $trabajador->Trabajador; ?>">
        </label>
        <label>
            NIF
            <input name="NIF" type="text" value="<?php echo $trabajador->NIF; ?>">
        </label>
        <label>
            Email
            <input name="Email" type="text" value="<?php echo $trabajador->Email; ?>">
        </label>
        <label>
            Usuario
            <input name="Usuario" type="text" disabled value="<?php echo $usuario->Login; ?>">
        </label>
        <label>
            Contraseña
            <input name="Contraseña" type="text">
        </label>

        <table class="table table-bordered table-condensed table-striped table-hover">
            <thead>
            <th scope="col">Fecha Jornada</th>
            <th scope="col">Entrada</th>
            <th scope="col">Salida</th>
            <th scope="col">Tiempo Total</th>
            </thead>
            <?php foreach ($marcajes as $marcaje) { ?>
                <tr>
                    <td><?php echo(date_create($marcaje->FechaInicio)->format("d/m/Y")); ?></td>
                    <td><?php echo $marcaje->FechaInicio; ?></td>
                    <td><?php if(isset($marcaje->FechaFin)) echo $marcaje->FechaFin; ?></td>
                    <td><?php echo $marcaje->GetTiempoTotal(); ?></td>
                </tr>
            <?php } ?>
        </table>

        <button type="submit">Guardar</button>
    </form>
    <form name="formInforme" method="post" action="/informe/<?php echo $idTrabajador; ?>">
        <button type="submit">Informe Jornadas</button>
    </form>
</div>