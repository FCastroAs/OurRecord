<div class="container-fluid px-1 py-4 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Listado de Empresas</h3>
            <p class="blue-text">Empresas dadas de alta actualmente en la plataforma</p>
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
