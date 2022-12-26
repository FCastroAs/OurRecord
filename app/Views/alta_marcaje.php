<div class="container-fluid px-1 py-4 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Crear Marcaje</h3>
            <p class="blue-text">Cree un marcaje de inicio o fin de jornada</p>
            <div class="card pb-4 pt-4">
                <form class="form-card" method="post" action="/creaMarcaje">
                    <input name="IdMarcaje" type="hidden" value="<?php if (isset($IdMarcaje)) echo $IdMarcaje; ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Trabajador</label> <input type="text" id="Trabajador" name="Trabajador" disabled value="<?php echo $Trabajador->Trabajador; ?>"> </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Empresa</label> <input type="text" id="Empresa" name="Empresa" disabled value="<?php echo $Empresa->Empresa; ?>"> </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Ultimo Marcaje</label> <input type="text" id="Ultimo" name="Ultimo" disabled value="<?php if (isset($IdMarcaje)) echo "Inicio "; else echo "Fin "; ?> <?php if (isset($Ultimo)) echo $Ultimo; ?>"> </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Tiempo Jornada</label> <input type="text" id="Jornada" name="Jornada" disabled value="<?php if (isset($Jornada)) echo $Jornada; ?>"> </div>
                    </div>

                    <div class="row justify-content-center pt-2 pt-2">
                        <div class="form-group col-sm-6"> <button type="submit" <?php if (isset($IdMarcaje)) echo "disabled"; ?> class="btn-block btn-outline-primary btn">Iniciar Jornada</button> </div>
                        <div class="form-group col-sm-6"> <button type="submit" <?php if (!isset($IdMarcaje)) echo "disabled"; ?> class="btn-block btn-outline-primary btn">Finalizar Jornada</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>