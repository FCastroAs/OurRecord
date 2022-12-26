<div class="container-fluid px-1 py-4 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Listado de Marcajes</h3>
            <p class="blue-text">Marcajes dados de alta</p>

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