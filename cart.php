<?php
/* Objeto de la clase producto */
include './clases/Producto.php';
$producto = new Producto();

/* Revisa si hay una sesion iniciada para verificar si es un visitante o un usuario registrado */
session_start();
if (!isset($_SESSION["datos-usuario"])) {
    $visitante = true;
    $Rol = "Cliente";
} else {
    $visitante = false;
    $Id = $_SESSION["datos-usuario"]["Id"];
    $Nombre = $_SESSION["datos-usuario"]["Nombre"];
    $Apellido = $_SESSION["datos-usuario"]["Apellido"];
    $Rol = $_SESSION["datos-usuario"]["Rol"];

    include './clases/Tarjeta.php';
    include './clases/Facturacion.php';
    /* Crea objeto de la clase Tarjeta */
    $tarjeta = new Tarjeta();
    /* Obtiene las tarjetas del usuario */
    $lista_tarjetas = $tarjeta->obtieneTarjetasUsuario($Id);
    /* Crea objeto de la clase Facturacion */
    $facturacion = new Facturacion();
    /* Obtiene los datos de facturacion del usuario */
    $datos_facturacion = $facturacion->obtenerDatosFacturacion($Id);
}
/* Verifica si existe un carrito con producto */
if (isset($_SESSION["productos-carrito"])) {
    $carrito = $producto->obtenerProductosCarrito($_SESSION["productos-carrito"]);
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Happy PetShop | Carro de compras</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery/jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <link href="js/jquery/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery/jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="js/scripts/UsuarioJS.js" type="text/javascript"></script>
        <script src="js/scripts/ProductoJS.js" type="text/javascript"></script>
        <script src="js/scripts/FacturacionJS.js" type="text/javascript"></script>
        <script src="js/scripts/TarjetaJS.js" type="text/javascript"></script>
        <script src="js/scripts/CompraJS.js" type="text/javascript"></script>
        <!-- //js -->
        <!-- cart -->
        <script src="js/simpleCart.min.js"></script>
        <!-- cart -->
        <!-- for bootstrap working -->
        <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
        <!-- //for bootstrap working -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- timer -->
        <link rel="stylesheet" href="css/jquery.countdown.css" />
        <!-- //timer -->
        <!-- animation-effect -->
        <link href="css/animate.min.css" rel="stylesheet"> 
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!-- //animation-effect -->
    </head>
    <body>
        <!--        Cambia el header de acuerdo si es un vistante o un usuario registrado-->
        <?php if (!$visitante) { ?>
            <!-- header de un usuario registrado-->
            <div class="header">
                <div class="container">
                    <div class="header-grid">
                        <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                            <ul>
                                <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:happypetstore@hotmail.com">happypetstore@hotmail.com</a></li>
                                <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+(506)22454729</li>
                                <li><i class="glyphicon glyphicon-user" aria-hidden="true"></i>Bienvenid@: <a href="miPerfil.php"><?php echo $Nombre . " " . $Apellido; ?></a></li>
                                <?php if ($Rol == "Admin") { ?><li><h3 style="color: red">Administrador</h3></li><?php } ?>
                            </ul>
                        </div>
                        <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                            <ul class="social-icons">
                                <li><a href="#" class="facebook"></a></li>
                                <li><a href="#" class="twitter"></a></li>
                                <li><a href="#" class="g"></a></li>
                                <li><a href="#" class="instagram"></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="logo-nav-right">
                        <?php if ($Rol != "Admin") { ?>
                            <div class="search-box">
                                <div id="sb-search" class="sb-search">
                                    <form>
                                        <input class="sb-search-input" placeholder="Ingrese su busqueda..." type="search" id="search">
                                        <input class="sb-search-submit" id="btnBuscar" type="button" value="">
                                        <span class="sb-icon-search"> </span>
                                    </form>
                                </div>
                            </div>
                            <!-- search-scripts -->
                            <script src="js/classie.js"></script>
                            <script src="js/uisearch.js"></script>
                            <script>
                    new UISearch(document.getElementById('sb-search'));
                            </script>
                        <?php } ?>
                        <!-- //search-scripts -->
                    </div>
                    <div class="logo-nav">
                        <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">

                            <h1><a href="index.php"><img src="images/Logo hueso (provisional).png" height="70px" width="70" alt=""/>Happy PetShop<span>La tienda de tu mascota</span></a></h1>
                        </div>
                        <div class="logo-nav-left1">
                            <nav class="navbar navbar-default">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header nav_2">
                                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <?php if ($Rol == "Cliente") { ?>
                                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="index.php" class="act">Inicio</a></li>	
                                            <!-- Mega Menu -->
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                                                <ul class="dropdown-menu multi-column columns-3">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <ul class="multi-column-dropdown">
                                                                <a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Ropa para perro</h6></a>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Camiseta&montoMin=0&montoMax=0&descuento=0&pagina=0">Camisetas</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Camisa&montoMin=0&montoMax=0&descuento=0&pagina=0">Camisas</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Overol&montoMin=0&montoMax=0&descuento=0&pagina=0">Overoles</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Pijama&montoMin=0&montoMax=0&descuento=0&pagina=0">Pijamas</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Abrigo&montoMin=0&montoMax=0&descuento=0&pagina=0">Abrigos</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <ul class="multi-column-dropdown">
                                                                <a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Ropa para perra</h6></a>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Vestido&montoMin=0&montoMax=0&descuento=0&pagina=0">Vestidos</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Blusa&montoMin=0&montoMax=0&descuento=0&pagina=0">Blusas</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Overol&montoMin=0&montoMax=0&descuento=0&pagina=0">Overoles</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Pijama&montoMin=0&montoMax=0&descuento=0&pagina=0">Pijamas</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Enagua&montoMin=0&montoMax=0&descuento=0&pagina=0">Enaguas</a></li>
                                                                <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Abrigo&montoMin=0&montoMax=0&descuento=0&pagina=0">Abrigos</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <ul class="multi-column-dropdown">
                                                                <a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Accesorios para perro</h6></a>
                                                                <li><a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=Collar&montoMin=0&montoMax=0&descuento=0&pagina=0">Collares</a></li>
                                                                <li><a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=Gorra&montoMin=0&montoMax=0&descuento=0&pagina=0">Gorras</a></li> 
                                                                <a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Accesorios para perra</h6></a>
                                                                <li><a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Collar&montoMin=0&montoMax=0&descuento=0&pagina=0">Collares</a></li>
                                                                <li><a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Gorra&montoMin=0&montoMax=0&descuento=0&pagina=0">Gorras</a></li>                                                                                         
                                                            </ul>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </ul>
                                            </li>
                                            <li><a href="aboutUs.php">Acerca de nosotros</a></li>
                                            <li><a href="mail.php">Contáctenos</a></li>
                                            <!-- Mega Menu -->
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi cuenta<b class="caret"></b></a>
                                                <ul class="dropdown-menu multi-column columns-1">
                                                    <form id="frmCerrarSesion">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <ul class="multi-column-dropdown">
                                                                    <h6>Mi Cuenta</h6>
                                                                    <li><a href="miPerfil.php">Mis datos</a></li>
                                                                    <li><a href="misDatosFacturacion.php">Información de facturación</a></li>
                                                                    <li><a href="misCompras.php">Mis compras</a></li>
                                                                    <h6></h6>
                                                                    <li><input type="text" name="accionCerrarSesion" value="CerrarSesion" hidden=""></li>
                                                                    <li><input type="button" id="btnCerrarSesion" value="Cerrar sesion"></li>
                                                                </ul>
                                                            </div>                                                
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </form>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <form id="frmCerrarSesion">
                                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                            <ul class="nav navbar-nav">
                                                <li class="active"><a href="ingresarProducto.php" class="act">Ingresar nuevo producto</a></li>	
                                                <li><a href="eliminarProducto.php">Eliminar un producto</a></li>
                                                <li><a href="actualizarProducto.php">Actualizar un producto</a></li>
                                                <li><a href="organizarMarcas.php">Organizar marcas</a></li>
                                                <li><a href="eliminarUsuario.php">Eliminar usuario</a></li>
                                                <li><a href="listarCompras.php">Lista de compras</a></li>
                                                <li><input type="text" name="accionCerrarSesion" value="CerrarSesion" hidden=""></li>
                                                <li><input type="button" id="btnCerrarSesion" value="Cerrar sesión"></li>
                                            </ul>
                                        </div>
                                    </form>
                                <?php } ?>
                            </nav>
                        </div>
                        <!--                        Carrito de compras-->
                        <div class="header-right">
                            <?php if ($Rol != "Admin") { ?>
                                <div class="cart box_1">
                                    <a href="cart.php">
                                        <h3> <div class="total">
                                                <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> articulos)</div>
                                            <img src="images/bag.png" alt="" />
                                        </h3>
                                    </a>
                                    <p><a href="javascript:;" class="simpleCart_empty">Vaciar carrito</a></p>
                                    <div class="clearfix"> </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <!-- //header -->
            <?php
        }
        if ($visitante) {
            ?>
            <!-- header de un usuario no registrado-->
            <div class="header">
                <div class="container">
                    <div class="header-grid">
                        <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                            <ul>
                                <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:happypetstore@hotmail.com">happypetstore@hotmail.com</a></li>
                                <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+(506)22454729</li>
                                <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Inicia Sesión</a></li>
                                <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">Registrate</a></li>
                            </ul>
                        </div>
                        <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                            <ul class="social-icons">
                                <li><a href="#" class="facebook"></a></li>
                                <li><a href="#" class="twitter"></a></li>
                                <li><a href="#" class="g"></a></li>
                                <li><a href="#" class="instagram"></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="logo-nav-right">
                        <div class="search-box">
                            <div id="sb-search" class="sb-search">
                                <form>
                                    <input class="sb-search-input" placeholder="Ingrese su busqueda..." type="search" id="search">
                                    <input class="sb-search-submit" id="btnBuscar" type="button" value="">
                                    <span class="sb-icon-search"> </span>
                                </form>
                            </div>
                        </div>
                        <!-- search-scripts -->
                        <script src="js/classie.js"></script>
                        <script src="js/uisearch.js"></script>
                        <script>
                new UISearch(document.getElementById('sb-search'));
                        </script>
                        <!-- //search-scripts -->
                    </div>
                    <div class="logo-nav">
                        <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                            <h1><a href="index.php"><img src="images/Logo hueso (provisional).png" height="70px" width="70" alt=""/>Happy PetShop<span>La tienda de tu mascota</span></a></h1>
                        </div>
                        <div class="logo-nav-left1">
                            <nav class="navbar navbar-default">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header nav_2">
                                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div> 
                                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="index.php" class="act">Inicio</a></li>	
                                        <!-- Mega Menu -->
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                                            <ul class="dropdown-menu multi-column columns-3">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <ul class="multi-column-dropdown">
                                                            <a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Ropa para perro</h6></a>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Camiseta&montoMin=0&montoMax=0&descuento=0&pagina=0">Camisetas</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Camisa&montoMin=0&montoMax=0&descuento=0&pagina=0">Camisas</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Overol&montoMin=0&montoMax=0&descuento=0&pagina=0">Overoles</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Pijama&montoMin=0&montoMax=0&descuento=0&pagina=0">Pijamas</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Abrigo&montoMin=0&montoMax=0&descuento=0&pagina=0">Abrigos</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <ul class="multi-column-dropdown">
                                                            <a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Ropa para perra</h6></a>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Vestido&montoMin=0&montoMax=0&descuento=0&pagina=0">Vestidos</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Blusa&montoMin=0&montoMax=0&descuento=0&pagina=0">Blusas</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Overol&montoMin=0&montoMax=0&descuento=0&pagina=0">Overoles</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Pijama&montoMin=0&montoMax=0&descuento=0&pagina=0">Pijamas</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Enagua&montoMin=0&montoMax=0&descuento=0&pagina=0">Enaguas</a></li>
                                                            <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Abrigo&montoMin=0&montoMax=0&descuento=0&pagina=0">Abrigos</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <ul class="multi-column-dropdown">
                                                            <a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Accesorios para perro</h6></a>
                                                            <li><a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=Collar&montoMin=0&montoMax=0&descuento=0&pagina=0">Collares</a></li>
                                                            <li><a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=Gorra&montoMin=0&montoMax=0&descuento=0&pagina=0">Gorras</a></li> 
                                                            <a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0"><h6>Accesorios para perra</h6></a>
                                                            <li><a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Collar&montoMin=0&montoMax=0&descuento=0&pagina=0">Collares</a></li>
                                                            <li><a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Gorra&montoMin=0&montoMax=0&descuento=0&pagina=0">Gorras</a></li>                                                                                         
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </ul>
                                        </li>
                                        <li><a href="aboutUs.php">Acerca de nosotros</a></li>
                                        <li><a href="mail.php">Contáctenos</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!--     USD:{code:"USD",symbol:"&#36;",name:"US Dollar"}                   carrito de compras-->
                        <div class="header-right">
                            <div class="cart box_1">
                                <a href="cart.php">
                                    <h3> <div class="total">
                                            <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> articulos)</div>
                                        <img src="images/bag.png" alt="" />
                                    </h3>
                                </a>
                                <p><a href="javascript:;" class="simpleCart_empty">Vaciar carrito</a></p>
                                <div class="clearfix"> </div>
                            </div>	
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <!-- //header -->
        <?php } ?>
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                    <li class="active">Carro de compras</li>
                </ol>
            </div>
        </div>
        <!-- //breadcrumbs -->
        <!-- checkout -->
        <div class="checkout">
            <div class="container">
                <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Tu carro de compras tiene: <span><?php
                        if (isset($_SESSION["productos-carrito"])) {
                            echo count($carrito);
                            if (count($carrito) > 1) {
                                echo " productos";
                            } else {
                                echo " procucto";
                            }
                        } else {
                            echo "0 productos";
                        }
                        ?> </span></h3>
                <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s"><?php if (isset($_SESSION["productos-carrito"])) { ?>
                        <table class="timetable_sub" id="carritoTabla">
                            <thead>
                                <tr>
                                    <th>Código</th>	
                                    <th>Producto</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Color</th>
                                    <th>Precio</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>
                            <?php
                            $p = 0;
                            foreach ($carrito as $prod) {
                                ?>
                                <tr class="rem1">
                                    <td class="invert"><?php echo $prod["Id"]; ?></td>
                                    <td class="invert-image"><a href="single.html"><img src="<?php echo $prod["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a></td>
                                    <td class="invert"><?php echo $prod["Nombre"]; ?></td>
                                    <td class="invert"><img src="<?php echo $prod["Dir_Imagen_Marca"]; ?>" width="80px"></td>
                                    <td class="invert"><?php
                                        $colores = $producto->obtenerColores($prod["Color"]);
                                        for ($i = 0; $i < count($colores); $i++) {
                                            ?>
                                            <?php if ($colores[$i] == "Blanco") { ?>
                                        <li style="list-style: none"><a><span style="background: #ffffff"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Blanco</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Rojo") { ?>
                                        <li style="list-style: none"><a><span style="background: red"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Rojo</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Azul") { ?>
                                        <li style="list-style: none"><a><span style="background: blue"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Azul</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Gris") { ?>
                                        <li style="list-style: none"><a><span style="background: grey"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Gris</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Verde") { ?>
                                        <li style="list-style: none"><a><span style="background: green"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Verde</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Amarillo") { ?>
                                        <li style="list-style: none"><a><span style="background: yellow"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Amarillo</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Rosa") { ?>
                                        <li style="list-style: none"><a><span style="background: pink"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Rosa</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Celeste") { ?>
                                        <li style="list-style: none"><a><span style="background: lightblue"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Celeste</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Morado") { ?>
                                        <li style="list-style: none"><a><span style="background: #990099"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Morado</a></li>
                                    <?php } ?>
                                    <?php if ($colores[$i] == "Cafe") { ?>
                                        <li style="list-style: none"><a><span style="background: #993300"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Café</a>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Negro") { ?>
                                        <li style="list-style: none"><a><span style="background: black"></span><input type="radio" name="<?php echo $prod["Nombre"]; ?>" checked=""> Negro</a></li>
                                    <?php } ?>
                                            <?php } ?></td>
                                <td class="invert"><?php
                                    $descuento = $prod["Descuento"] / 100;
                                    $rebaja = $prod["Precio"] * $descuento;
                                    $total = $prod["Precio"] - $rebaja;
                                    echo '₡' . $total . "<hr>Descuento " . $prod["Descuento"] . "%";
                                    ?></td>
                                <td class="invert">
                                    <div class="rem">
                                        <input type="hidden" id="IdProductoEliminarLista" value="<?php echo $prod["Id"]; ?>">
                                        <input type="hidden" id="posicionProductoEliminarLista" value="<?php echo $p; ?>">
                                        <div class="close1"></div>                                       
                                    </div>
                                    <script>$(document).ready(function (c) {
                                            $('.close1').on('click', function (c) {
                                                $('.rem1').fadeOut('slow', function (c) {
                                                    $('.rem1').remove();
                                                });
                                            });
                                        });
                                    </script>
                                </td>
                                </tr>
                                <?php
                                $p++;
                            }
                            ?>                        
                        </table>
                    <?php } else { ?><?php
                        echo "No tienes productos en tu carrito de compras!!";
                    }
                    ?>
                </div>
                <div class="checkout-left">	
                    <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                        <?php if (isset($_SESSION["productos-carrito"])) { ?>
                            <h4>Resumen de pago</h4>
                            <ul>
                                <?php
                                $pago = 0;
                                foreach ($carrito as $prod) {
                                    ?>
                                    <li><?php echo $prod["Nombre"]; ?> <i>-</i> <span><?php
                                            $descuento = $prod["Descuento"] / 100;
                                            $rebaja = $prod["Precio"] * $descuento;
                                            $total = $prod["Precio"] - $rebaja;
                                            echo '₡ ' . $total;
                                            $pago += $total;
                                            ?></span>
                                    </li>
                                <?php } ?>
                                <li>Cargos de envio <i>-</i> <span>₡ 1000</span></li>
                                <hr>
                                <li>Total <i>-</i> <span><?php
                                        echo '₡ ';
                                        echo $pago + 1000;
                                        ?></span></li>
                            </ul>
                            <input type="button" id="btnActivaFacturacion" value="DATOS DE FACURACIÓN">
                        <?php } ?>
                    </div>                   
                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continua comprando</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div id="divFacturacion">
                    <?php if ($visitante == false) { ?>
                        <?php if (isset($_SESSION["productos-carrito"])) { ?> 
                            <p style="color: #cc3300;">Importe:</p>
                            <br>
                            <input type="text" disabled="disable" style="width: 20%;" value="₡ <?php echo $pago + 1000; ?>">
                            <hr>
                            <p>Elige el tipo de pago:</p>
                            <br>
                            <label for="tipoPagoPayPal"><img id="imgPayPal" src="images/paypal-logo.png" width="100px"></label><input type="radio" hidden="" name="tipoPago" id="tipoPagoPayPal">
                            <label for="tipoPagoTarjeta" style="margin-left: 20px;"><img id="imgTarjeta" src="images/card-logo.png" width="100px"></label><input type="radio" hidden="" name="tipoPago" id="tipoPagoTarjeta">
                            <div id="DatosDePago">
                                <br>
                                <p style="color: #cc3300;">Datos de pago:</p>
                                <form id="frmCompra">
                                    <br> 
                                    <?php if ($lista_tarjetas["valido"] == "true") { ?>
                                        <p>Selecciona una tarjeta:</p>
                                        <select name="idTarjeta">
                                            <?php foreach ($lista_tarjetas["datos-tarjetas"] as $card) { ?>
                                                <option value="<?php echo $card["Id"]; ?>"><?php echo $card["Nombre"]; ?> - <?php echo $card["Numero_Tarjeta"]; ?> - <?php echo $card["Titular"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <br>
                                        <p>No tienes tarjetas guardadas:</p>
                                        <p><a href="misDatosFacturacion.php">Registra una tarjeta</a> para poder realizar esta compra, tranquilo te esperamos.</p>
                                        <br>
                                    <?php } ?>
                                    <input type="hidden" name="idUsuario" value="<?php echo $Id; ?>">
                                    <input type="hidden" name="idProductos" value="<?php
                                    $productos = "";
                                    foreach ($carrito as $prod) {
                                        $productos = $productos . "/" . $prod["Id"];
                                    }echo $productos;
                                    ?>">
                                    <p>Dirección:</p>
                                    <input type="text" required="" name="Direccion" value="<?php
                                    if (count($datos_facturacion) != 0) {
                                        echo $datos_facturacion["Direccion"];
                                    }
                                    ?>">
                                    <p>Ciudad:</p>
                                    <input type="text" required="" name="Ciudad" value="<?php
                                    if (count($datos_facturacion) != 0) {
                                        echo $datos_facturacion["Ciudad"];
                                    }
                                    ?>">
                                    <p>Provincia:</p>
                                    <input type="text" required="" name="Provincia" value="<?php
                                    if (count($datos_facturacion) != 0) {
                                        echo $datos_facturacion["Provincia"];
                                    }
                                    ?>">
                                    <p>Código postal:</p>
                                    <input type="number" required="" name="CodigoPostal" value="<?php
                                    if (count($datos_facturacion) != 0) {
                                        echo $datos_facturacion["Codigo_Postal"];
                                    }
                                    ?>">
                                    <br>
                                </form>
                                <input type="button" id="btnAceptarPago" value="Pagar">
                                <input type="button" id="btnCancelarPago" value="Cancelar compra">
                            </div>
                            <br>
                            <a href="http://www.paypal.com" id="aPayPal">Página de PayPal</a>
                        <?php } else { ?>
                            <p>Que tal si primero añade productos a tu carro de compras y luego pagas. </p>
                        <?php } ?> 
                    <?php } else { ?>
                        <p>Debes <a href="login.php">Iniciar sesión</a> o <a href="register.php">Registrarte</a> en Happy PetShop para realizar una compra, asi que tranquilo, te esperamos :D</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- //checkout -->
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="footer-grids">
                    <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
                        <h3>Acerca de nosotros</h3>
                        <p>En Happy PetShop ofrecemos prendas de calidad al mejor precio para tus mascotas.<span>En nuestra tienda en línea encontraras prendas a la
                                moda para tu mejor amigo/a canino/a</span></p>
                    </div>
                    <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                        <h3>Información de contacto</h3>
                        <ul>
                            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>San Pedro, Barrio Pinto, 100mts Este del bar Las Brumas<span>Ciudad de San José</span></li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:happypetshop@hotmail.com">happypetshop@hotmail.com</a></li>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>(506)22454729</li>
                        </ul>
                    </div>                   
                    <div class="clearfix"> </div>
                </div>
                <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
                    <h2><a href="index.php"><img src="images/Logo hueso (provisional).png" height="70px" width="70" alt=""/>Happy PetShop<span>La tienda de tu mascota</span></a></h2>
                </div>
                <div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
                    <p>&copy 2016 Best Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
                </div>
            </div>
        </div>
        <!-- //footer -->
    </body>
</html>