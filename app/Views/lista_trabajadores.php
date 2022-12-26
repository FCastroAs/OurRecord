<div class="container-fluid px-1 py-4 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Listado de Trabajadores</h3>
            <p class="blue-text">Trabajadores dados de alta en la empresa</p>
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
            <script>
                $(document).ready(function($) {
                    $(".clickable-row").click(function() {
                        window.document.location = $(this).data("href");
                    });
                });
            </script>
        </div>
    </div>
</div>