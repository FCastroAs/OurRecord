<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" >OurRecord</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/listaTrabajadores">Listado Trabajadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/altaTrabajador">Crear Trabajador</a>
                </li>
            </ul>
            <label class="navbar-text d-flex usuarioLogado"> Usuario: <?php echo $Login; ?> </label>
            <form class="d-flex" method="post" action="/desconectarse">
                <button class="btn btn-outline-primary" type="submit">Desconectarse</button>
            </form>
        </div>
    </div>
</nav>