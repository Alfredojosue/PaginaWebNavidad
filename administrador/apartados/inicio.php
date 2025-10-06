<?php include('../template/cabecera.php'); ?>
           <div class="col-md-12">
                <div class="jumbotron" style="background-image: url(../assets/images/fondo3.jpg); color:white;">
                    <h1 class="display-4">Bienvenido <?php echo $nombreUsuario; ?></h1>
                    <p class="lead">Vamos a administrar nuestros productos en el sitio web</p>
                    <hr class="my-2">
                    <p class="lead">
                        <a class="btn btn-success btn-lg" href="productos.php" role="button">Productos navideños</a>
                        <!-- <a class="btn btn-primary btn-lg" href="secciones/usuarios.php" role="button">Usuarios</a> -->
                    </p>
                </div>
            </div>
<?php include('../template/pie.php'); ?>