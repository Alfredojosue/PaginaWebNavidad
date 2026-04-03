<?php include("templates/cabecera.php"); ?>
<div class="overlay">
    <h1>CONFIA EN LA MAGIA</h1>
</div>
    <div class="logo"><a href="./administrador/apartados/formulario.php"><img src="assets/marsol.png" width="100"
        height="100" style="margin-left: 8px;" class="rounded" alt="Logo mar&sol"></a>
    </div>
        <div class="wrapper">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link link-light" href="productos.php">
                        <p class="h5">Productos</p>
                    </a>
                </li>
            </ul>
        </div>
<!-- <div class="social-media">
        <ul>
            <li><i class="fa fa-user fa-fw"></i></li>
        </ul>
    </div> -->
    <!-- <div class="side-strip">
        <span>LO MEJOR DEL AÑO</span>
    </div> -->
    <div class="header">
        <h1>MAR&SOL - <br>Productos navideños</h1>
        <p>Tu mejor aventura comienza aqui, encontrás productos sorprendentes para estas fiestas decembrinas..</p>
        <!-- <button>ADENTRATE EN LA MAGIA</button> -->
    </div>
    <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h6>Esferas</h6>
                        <p>Disfrutaras de diversas variedades de esferas, las cuales pueden ser planas, redondas, con un estilo
                            unico
                            y 100% artesanales.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h6>Adornos</h6>
                        <p>De la vista nace el amor, decora esta navidad a lo grande y disfruta con tu familia</p>
                    </div>
                    <div class="col-lg-4">
                        <h6>Luces</h6>
                        <p>Encuenta esa luz que ilumine tu hogar, para que disfrutes en compañia de los que mas amas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
//Overlay es la frase que aparece al momento de llegar a la pagina
TweenMax.to(".overlay h1", 2, {
    opacity: 0,
    y: -60,
    ease: Expo.easeInOut
})

TweenMax.to(".overlay", 2, {
    delay: 1,
    top: "-100%",
    ease: Expo.easeInOut
})
//referencia al logo
TweenMax.from(".logo", 1, {
    delay: 2.4,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
})
//LINKS PARA REDIRECCIONAR A LAS PAGINAS (contenido interactivo)
TweenMax.staggerFrom(".nav ul li", 1, {
    delay: 2.4,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
}, 0.2)

TweenMax.staggerFrom(".social-media ul li", 1, {
    delay: 2.4,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
}, 0.2)

TweenMax.from(".side-strip", 2, {
    delay: 2.4,
    opacity: 0,
    y: 40,
    ease: Expo.easeInOut
})

TweenMax.from(".row", 2, {
    delay: 2.4,
    opacity: 0,
    x: 40,
    ease: Expo.easeInOut
})

TweenMax.from(".row h6", 2, {
    delay: 3,
    opacity: 0,
    y: 40,
    ease: Expo.easeInOut
})

TweenMax.from(".row p", 2, {
    delay: 3.2,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
})

TweenMax.from(".header h1", 2, {
    delay: 3.2,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
})

TweenMax.from(".header p", 2, {
    delay: 3.4,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
})

TweenMax.from(".header button", 2, {
    delay: 3.6,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
})
</script>