<div id="content">

    <h1>Listado de Empresas</h1>

    <table class="table table-bordered table-condensed table-striped table-hover">
        <thead>
            <th scope="col">Empresa</th>
            <th scope="col">CIF</th>
            <th scope="col">Email</th>
            <th scope="col">Activo</th>
        </thead>
        <?php foreach ($empresas as $empresa) { ?>
            <tr class='clickable-row' data-href='editarEmpresa/<?php echo($empresa->IdEmpresa); ?>' >
                <td><?php echo $empresa->Empresa; ?></td>
                <td><?php echo $empresa->CIF; ?></td>
                <td><?php echo $empresa->Email; ?></td>
                <td><?php echo $empresa->Activo; ?></td>
            </tr>
        <?php } ?>
    </table>

    <form name="formLogin" method="post" action="altaEmpresa">
        <button type="submit">Crear Empresa</button>
    </form>
</div>

<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>