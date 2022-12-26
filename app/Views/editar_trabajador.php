<div class="container-fluid px-1 py-4 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Editar Trabajador</h3>
            <p class="blue-text">Modifique los valores que quiera actualizar</p>
            <div class="card pb-4 pt-4">
                <form class="form-card" method="post" action="/editaTrabajador">
                    <input name="IdTrabajador" type="hidden" value="<?php echo $trabajador->IdTrabajador; ?>">
                    <input name="IdEmpresa" type="hidden" value="<?php echo $trabajador->IdEmpresa; ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Trabajador<span class="text-danger"> *</span></label> <input type="text" id="Trabajador" name="Trabajador" placeholder="Nombre y Apellidos del Trabajador" value="<?php echo $trabajador->Trabajador; ?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">NIF<span class="text-danger"> *</span></label> <input type="text" id="NIF" name="NIF" placeholder="Número Identificación Fiscal" value="<?php echo $trabajador->NIF; ?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="text" id="Email" name="Email" placeholder="Dirección email" value="<?php echo $trabajador->Email; ?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Usuario<span class="text-danger"> *</span></label> <input type="text" id="Usuario" name="Usuario" placeholder="" disabled value="<?php echo $usuario->Login; ?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Contraseña<span class="text-danger"> *</span></label> <input type="text" id="Contraseña" name="Contraseña" placeholder="" > </div>
                    </div>

                    <div class="row justify-content-center pt-2 pt-2">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-outline-primary btn">Guardar</button> </div>
                        <div class="form-group col-sm-6"> <a class="btn-block btn-outline-primary btn" href="/informe/<?php echo $idTrabajador; ?>"> Informe de Jornadas </a> </div>
                    </div>
                </form>
            </div>
            <br>
            <h3>Listado de Marcajes</h3>
            <p class="blue-text">Listado de marcajes del trabajador</p>
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
        </div>
    </div>
</div>