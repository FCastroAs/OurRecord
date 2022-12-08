<div id="content">

    <h1>Listado de Marcajes</h1>

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

    <form name="formLogin" method="post" action="informe">
        <button type="submit">Informe Jornadas</button>
    </form>
</div>