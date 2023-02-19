<?php include('header.php'); ?>

<body id="login-page" class="bg-living bg-cover">

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 bg-black-alpha d-flex align-items-center justify-content-center">
                <div class="">

                    <h1 class="mb-5 text-center">Crear cuenta</h1>

                    <form class="add-form" action=<?php	echo FRONT_ROOT?>Session\signup method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Contraseña">
                        </div>
                        <button type="submit" name="button" class="btn btn-secondary btn-lg btn-block">
                            Registrarme
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

<?php include('footer.php'); ?>
