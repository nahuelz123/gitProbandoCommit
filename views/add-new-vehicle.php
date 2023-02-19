<?php include('header.php'); ?>

<body id="login-page" class="bg-living bg-cover">

    <?php include('nav.php'); ?>

    <div class="container-fluid bg-black-alpha d-flex align-items-center justify-content-center">

        <div>
        <?php 
  
  if(isset($alert)&&($alert!= ""))
                  {
                  echo $alert['text'];
                  }
?>

            <h1 class="mb-5 text-center">Agregar Vehículo</h1>

            <form class="add-form" action=<?php	echo FRONT_ROOT?>Store\AddVehicle method="post" enctype="multipart/form-data">
                

                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="title" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="">Descripción</label>
                    <input type="text" name="Descripción" class="form-control form-control-lg">
                    <textarea class="form-control form-control-lg"></textarea>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Año</label>
                            <input type="number" name="year" class="form-control form-control-lg" min="1800" max="2018">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="text" name="price" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">city</label>
                            <input type="text" name="city" class="form-control form-control-lg" min="1800" max="2018">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Imagen Destacada</label>
                            <input type="file"name="foto" class="d-block">
                        </div>
                    </div>
                </div>

                <button type="submit" name="button" class="btn btn-secondary d-block ml-auto px-4">Agregar</button>
            </form>
        </div>

    </div>

</body>

<?php include('footer.php'); ?>
