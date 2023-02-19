<?php include('header.php'); ?>

<body id="login-page" class="bg-living bg-cover">

    <?php include('nav.php'); ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3 bg-black-alpha d-flex align-items-center justify-content-center px-5">

                <div class="">

                    <span class="mb-5 text-center h1 d-block">Filtro</span>

                    <div class="mb-5">
                        <header class="mb-3">
                            <em class="font-weight-bold">¿Qué estas buscando?</em>
                        </header>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-outline-light btn-lg mr-1" href="<?php echo FRONT_ROOT ?>Store\ShowHomeView">
                                <i class="fas fa-home"></i>
                            </a>
                            <a class="btn btn-outline-light btn-lg mx-1" href="<?php echo FRONT_ROOT ?>Store\ShowVehicleView">
                                <i class="fas fa-car"></i>
                            </a>
                            <a class="btn btn-outline-light btn-lg mx-1" href="<?php echo FRONT_ROOT ?>Store\ShowTvView">
                                <i class="fas fa-tv"></i>
                            </a>
                            <a class="btn btn-outline-light btn-lg ml-1" href="<?php echo FRONT_ROOT ?>Store\ShowAvionView">
                                <i class="fas fa-plane"></i>
                            </a>
                        </div>
                    </div>


                    <div class="mb-5">
                        <header class="mb-3">
                            <em class="font-weight-bold">Precio</em>
                        </header>
                        <form class="add-form" action=<?php	echo FRONT_ROOT?>Store\ShowPriceView method="post">
                        <div class="row align-items-end">
                            <div class="col-lg-4">
                                <div class="form-gorup">
                                    <label for="">Min</label>
                                    <input type="text" name="min" class="form-control form-control-lg">
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="form-gorup">
                                    <label for="">Max</label>
                                    <input type="text" name="max" class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button type="submint"  class="btn btn-outline-light btn-lg btn-block" >
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                   
                    <div class="mb-5">
                        <header class="mb-3">
                            <em class="font-weight-bold">Habitaciones</em>
                        </header>
                        <form class="add-form" action=<?php	echo FRONT_ROOT?>Store\ShowBedrooms method="post">
                        <div class="row align-items-end">
                            <div class="col-lg-4">
                                <div class="form-gorup">
                                    <label for="">Min</label>
                                    <input type="text" name="min" class="form-control form-control-lg">
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="form-gorup">
                                    <label for="">Max</label>
                                    <input type="text" name="max"  class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-outline-light btn-lg btn-block">
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>

            <main class="col-lg-9 bg-white">
            <?php

if (isset($alert) && ($alert != "")) {
    echo $alert['text'];
}
?>
                <div class="row py-3">

                    <?php if (isset($estateList)) {

                        foreach ($estateList as $estate) { ?>
                            <article class="col-lg-3 mb-5">
                                <img src="../<?php echo $estate->getUrl(); ?>" class="img-fluid mb-2" alt="">
                                <h2 class="h5">title : <?php echo $estate->getTitle(); ?></h2>
                                <div class="description">
                                    <small>
                                        <p>description : <?php echo $estate->getDescription(); ?></p>
                                        <p>bedrooms : <?php echo $estate->getBedrooms(); ?></p>
                                        <p>parking : <?php echo $estate->getParking(); ?></p>
                                        <p>city : <?php echo $estate->getCity(); ?></p>
                                    </small>
                                </div>
                                <div class="price text-right">
                                    <em class="h3">
                                        <p>price : $<?php echo $estate->getPrice(); ?></p>
                                    </em>
                                </div>
                            </article>
                        <?php }
                    }


                    if (isset($vehiculoList)) {

                        foreach ($vehiculoList as $vehiculo) {
                        ?>
                            <article class="col-lg-3 mb-5">

                                <img src="../<?php echo $vehiculo->getUrl(); ?>" class="img-fluid mb-2" alt="">

                                <h2 class="h5">Title : <?php echo $vehiculo->getTitle(); ?></h2>
                                <div class="description">
                                    <small>
                                        <p>description : <?php echo $vehiculo->getDescription(); ?></p>
                                        <p>year : <?php echo $vehiculo->getYear(); ?></p>
                                        <p>city : <?php echo $vehiculo->getCity(); ?></p>
                                    </small>
                                </div>
                                <div class="price text-right">
                                    <em class="h3">
                                        <p>price : $<?php echo $vehiculo->getPrice(); ?></p>
                                    </em>
                                </div>
                            </article>
                    <?php }
                    } ?>
                  
                </div>
            </main>
        </div>
    </div>

</body>

<?php include('footer.php'); ?>