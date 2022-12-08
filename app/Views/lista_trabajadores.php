<div id="content">

    <h1>Listado de Trabajadores</h1>

    <table class="table table-bordered table-condensed table-striped table-hover">
        <thead>
            <th scope="col">Trabajador</th>
            <th scope="col">NIF</th>
            <th scope="col">Email</th>
            <th scope="col">Activo</th>
        </thead>
        <?php foreach ($trabajadores as $trabajador) { ?>
            <tr class='clickable-row' data-href='editarTrabajador/<?php echo($trabajador->IdTrabajador); ?>' >
                <td><?php echo $trabajador->Trabajador; ?></td>
                <td><?php echo $trabajador->NIF; ?></td>
                <td><?php echo $trabajador->Email; ?></td>
                <td><?php echo $trabajador->Activo; ?></td>
            </tr>
        <?php } ?>
    </table>

    <form name="formLogin" method="post" action="altaTrabajador">
        <button type="submit">Crear Trabajador</button>
    </form>
</div>

<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>