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

            <h1 class="mb-5 text-center">Agregar Propiedad</h1>
          
            <form class="add-form"action=<?php	echo FRONT_ROOT?>Store\AddRealEstate method="post" enctype="multipart/form-data">
         
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="title" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="">Descripción</label>
                    <input type="text" name="description" class="form-control form-control-lg">
                    <textarea class="form-control form-control-lg"></textarea>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Habitaciones</label>
                            <input type="number" name="bedrooms" class="form-control form-control-lg">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="defaultCheck1">Parking</label>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="parking" value="true" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    ¿Tiene cochera?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="text" name="price " class="form-control form-control-lg">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">city</label>
                            <input type="text" name="city" class="form-control form-control-lg">
                        </div>
                    </div>
                <div class="form-group">
                    <label for="">Imagen Destacada</label>
                    <input type="file" name="foto" class="d-block">
                </div>

                <button type="submit" name="button" class="btn btn-secondary d-block ml-auto px-4">Agregar</button>
            </form>
        </div>

    </div>

</body>

<?php include('footer.php'); ?>
