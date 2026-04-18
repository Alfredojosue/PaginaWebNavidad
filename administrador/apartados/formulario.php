<?php
session_start();
if($_POST){
    if(($_POST["usuario"] == "administrador") && ($_POST["contrasegna"] == "sistema")){
        $_SESSION["usuario"] = "ok";
        $_SESSION["nombreUsuario"] = "administrador";
        header('Location:inicio.php');
    }else{
        $mensaje = "Error: El usuario o contraseña son incorrectos";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Administrador web" content="">
    <meta name="josue Ramirez" content="">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles2.css">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Hoja de estilos Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- JQuery Primero -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Toastr.js Después -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>MAR&SOL</title>

</head>
<body>
    <div class="bg-image p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main">
                            <div class="_social_04" style="text-align: left;">
                                <ol>
                                    <li><a href="../../index.php" class="bi bi-arrow-left"></a></li>
                                </ol>
                            </div>
                            <div class="logo">
                                <img src="../assets/images/marsol.png" width="600" height="100">
                            </div>
                            <hr>
                            <div class="row justify-content-around">
                                <div class="col-4" style="text-align: center;">
                                    <!-- <a href="#" class="active" id="login-form-link">Iniciar sesión de Administrador</a> -->
                                    <p class="h6">Inicio de sesión del Administrador</p>
                                </div>
                                <hr>
                                <form id="login-form" method="POST" role="form" style="display: block;">

                                    <?php if (isset($mensaje)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $mensaje; ?>
                                    </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <input type="text" name="usuario" class="form-control _ge_de_ol"
                                            placeholder="Ingresa el usuario" required="" aria-required="true">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="contrasegna" class="form-control _ge_de_ol"
                                            placeholder="Ingresa la contraseña" required="" aria-required="true">
                                    </div>

                                    <div class="checkbox form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="">
                                            <label class="form-check-label" for="">
                                                Recordar contraseña
                                            </label>
                                        </div>
                                        <a href="#" class="fw-bold">¿Olvidaste la contraseña?</a>
                                    </div>

                                    <div class="form-group">
                                        <button class="_btn_04" type="submit" name="btnIngresar">Entrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
document.getElementById('btnEnviar')
    .addEventListener('click', function() {
        toastr.success('¡Registro guardado exitosamente!');
        setTimeout(() => 3000);
    })
</script>



</html>