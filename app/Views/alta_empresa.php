<div class="container-fluid px-1 py-4 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Alta Empresa</h3>
            <p class="blue-text">Introduzca los datos de la empresa que quiera dar de alta</p>
            <div class="card pb-4 pt-4">
                <form class="form-card" method="post" action="creaEmpresa">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Empresa<span class="text-danger"> *</span></label> <input type="text" id="Empresa" name="Empresa" placeholder="Introduzca el nombre de la Empresa"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">CIF<span class="text-danger"> *</span></label> <input type="text" id="CIF" name="CIF" placeholder="Código Identificación Fiscal"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="text" id="Email" name="Email" placeholder="Dirección email" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Usuario<span class="text-danger"> *</span></label> <input type="text" id="Usuario" name="Usuario" placeholder=""> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Contraseña<span class="text-danger"> *</span></label> <input type="text" id="Contraseña" name="Contraseña" placeholder="" > </div>
                    </div>

                    <div class="row justify-content-center pt-2 pt-2">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-outline-primary btn">Crear Empresa</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <?php
    $session = session();
    if ($session->getFlashdata("error") != null) {
        echo("<div>");
        echo($session->getFlashdata("error"));
        echo("</div>");
    }
    ?>

