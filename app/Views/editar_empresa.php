<div class="container-fluid px-1 py-4 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Editar Empresa</h3>
            <p class="blue-text">Modifique los valores que quiera actualizar</p>
            <div class="card pb-4 pt-4">
                <form class="form-card" method="post" action="/editaEmpresa">
                    <input name="IdEmpresa" type="hidden" value="<?php echo $empresa->IdEmpresa; ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Empresa<span class="text-danger"> *</span></label> <input type="text" id="Empresa" name="Empresa" placeholder="Introduzca el nombre de la Empresa" value="<?php echo $empresa->Empresa; ?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">CIF<span class="text-danger"> *</span></label> <input type="text" id="CIF" name="CIF" placeholder="Código Identificación Fiscal" value="<?php echo $empresa->CIF; ?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="text" id="Email" name="Email" placeholder="Dirección email" value="<?php echo $empresa->Email; ?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Usuario<span class="text-danger"> *</span></label> <input type="text" id="Usuario" name="Usuario" placeholder="" disabled value="<?php echo $usuario->Login; ?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Contraseña<span class="text-danger"> *</span></label> <input type="text" id="Contraseña" name="Contraseña" placeholder="" > </div>
                    </div>

                    <div class="row justify-content-center pt-2 pt-2">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-outline-primary btn">Guardar</button> </div>
                        <div class="form-group col-sm-6"> <a class="btn-block btn-outline-primary btn" href="/eliminaEmpresa/<?php echo $empresa->IdEmpresa; ?>"> Eliminar </a> </div>
                    </div>
                </form>
            </div>
            <br>
            <h3>Listado de Trabajadores</h3>
            <p class="blue-text">Listado de trabajadores dados de alta en la empresa</p>
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
        </div>
    </div>
</div>

