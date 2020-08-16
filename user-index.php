<?php
include './validaSesion.php';

/* Objeto de la clase producto */
include './clases/Producto.php';
$producto = new Producto();

/* Revisa si hay productos en la base de datos */
$lista_productos = $producto->obtenerListaProductos();

/* Revisa si hay una sesion iniciada para verificar si es un visitante o un usuario registrado */
if (!isset($_SESSION["datos-usuario"])) {
    $visitante = true;
    $Rol = "Cliente";
} else {
    $visitante = false;
    $Id = $_SESSION["datos-usuario"]["Id"];
    $Nombre = $_SESSION["datos-usuario"]["Nombre"];
    $Apellido = $_SESSION["datos-usuario"]["Apellido"];
    $Rol = $_SESSION["datos-usuario"]["Rol"];
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
        <title>Happy PetStore | Inicio</title>
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
                                                            <li><a href="roducts.php?tipoProducto=Ropa&genero=Hembra&tipo=Pijama&montoMin=0&montoMax=0&descuento=0&pagina=0">Pijamas</a></li>
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
                        <!--                        carrito de compras-->
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
        <!-- banner -->
        <div class="banner">
            <div class="container">
                <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
                    <h3>Tienda en línea</h3>
                    <h4>Descuentos de hasta <span>45%<i> </i></span></h4>
                    <div class="wmuSlider example1">
                        <div class="wmuSliderWrapper">
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                    <div class="banner-info1">
                                        <p>Camisetas+ Blusas + Pijamas + Overoles</p>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                    <div class="banner-info1">
                                        <p>Gorras + Vestidos + Enaguas + Collares</p>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                    <div class="banner-info1">
                                        <p>La mejor ropa al mejor precio.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <script src="js/jquery.wmuSlider.js"></script> 
                    <script>
            $('.example1').wmuSlider();
                    </script> 
                </div>
            </div>
        </div>
        <!-- //banner -->
        <!-- banner-bottom -->
        <div class="banner-bottom">
            <div class="container"> 
                <div class="banner-bottom-grids">
                    <div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                        <div class="grid">
                            <figure class="effect-julia">
                                <img src="images/4.jpg" alt=" " class="img-responsive" />
                                <figcaption>
                                    <h3>Happy <span>PetShop</span><i> tienda en línea</i></h3>
                                    <div>
                                        <p>La mejor ropa para tus mascotas</p>
                                        <p>Con la mejor calidad</p>
                                        <p>Al mejor precio</p>
                                    </div>
                                </figcaption>			
                            </figure>
                        </div>
                    </div>
                    <div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
                        <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                            <div class="banner-bottom-grid-left-grid1">
                                <img src="images/1.jpg" alt=" " class="img-responsive" />
                            </div>
                            <div class="banner-bottom-grid-left1-pos">
                                <p>45% de descuento</p>
                            </div>
                        </div>
                        <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                            <div class="banner-bottom-grid-left-grid1">
                                <img src="images/2.jpg" alt=" " class="img-responsive" />
                            </div>
                            <div class="banner-bottom-grid-left1-position">
                                <div class="banner-bottom-grid-left1-pos1">
                                    <p>Ultimas colecciones</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
                        <div class="banner-bottom-grid-left-grid grid-left-grid1">
                            <div class="banner-bottom-grid-left-grid1">
                                <img src="images/3.jpg" alt=" " class="img-responsive" />
                            </div>
                            <div class="grid-left-grid1-pos">
                                <p>Excelentes diseños<span>para este 2018</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //banner-bottom -->
        <!-- collections -->
        <!--        Si es un administrador omite el mostrar los productos del inicio-->
        <?php if ($Rol != "Admin") { ?>
            <?php if ($lista_productos["valido"] == "true") { ?>
                <div class="new-collections">
                    <div class="container">
                        <h3 class="animated wow zoomIn" data-wow-delay=".5s">Nuevas colecciones</h3>
                        <p class="est animated wow zoomIn" data-wow-delay=".5s">Nuevas colecciones en ropa y accesorios para tus mascotas al mejor precio para que las vistas con clase.</p>
                        <div class="new-collections-grids">
                            <!--                    productos izquierda-->
                            <div class="col-md-3 new-collections-grid">                            
                                <?php
                                /* Obtiene 8 productos aleatorios de la bas de datos para mostrarlos */
                                /* Producto 1 */$prod1 = $producto->obtenerProductoRandom();
                                /* Producto 2 */$prod2 = $producto->obtenerProductoRandom();
                                /* Producto 3 */$prod3 = $producto->obtenerProductoRandom();
                                /* Producto 4 */$prod4 = $producto->obtenerProductoRandom();
                                /* Producto 5 */$prod5 = $producto->obtenerProductoRandom();
                                /* Producto 6 */$prod6 = $producto->obtenerProductoRandom();
                                /* Producto 7 */$prod7 = $producto->obtenerProductoRandom();
                                /* Producto 8 */$prod8 = $producto->obtenerProductoRandom();
                                ?>
                                <!--                        producto 1-->
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.php?codigo=<?php echo $prod1["Id"]; ?>&tipo=<?php echo $prod1["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod1["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.php?codigo=<?php echo $prod1["Id"]; ?>&tipo=<?php echo $prod1["Tipo"]; ?>">Vista previa</a>
                                        </div>
                                        <!--                                rating de producto-->
                                        <div class="new-collections-grid1-right">
                                            <div class="rating">
                                                <?php
                                                for ($i = 0; $i < 5; $i++) {
                                                    ?>
                                                    <?php if ($prod1["Calificacion"] > $i && $prod1["Calificacion"] >= $i + 1) { ?>
                                                        <div class="rating-left">
                                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="rating-left">
                                                            <img src="images/1.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } ?>                                               
                                                <?php } ?>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="single.php?codigo=<?php echo $prod1["Id"]; ?>&tipo=<?php echo $prod1["Tipo"]; ?>"><?php echo $prod1["Nombre"]; ?></a></h4>
                                    <p><?php echo $prod1["DescripcionP"]; ?></p>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <?php if ($prod1["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod1["Precio"]; ?></i><span class="item_price"><?php
                                            $descuento = $prod1["Descuento"] / 100;
                                            $rebaja = $prod1["Precio"] * $descuento;
                                            $total = $prod1["Precio"] - $rebaja;
                                            echo '₡' . $total;
                                            ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod1["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                            <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod1["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod1["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--                        producto 2-->
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.php?codigo=<?php echo $prod2["Id"]; ?>&tipo=<?php echo $prod2["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod2["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.php?codigo=<?php echo $prod2["Id"]; ?>&tipo=<?php echo $prod2["Tipo"]; ?>">Vista previa</a>
                                        </div>
                                        <!--                                rating de producto-->
                                        <div class="new-collections-grid1-right">
                                            <div class="rating">
                                                <?php
                                                for ($i = 0; $i < 5; $i++) {
                                                    ?>
                                                    <?php if ($prod2["Calificacion"] > $i && $prod2["Calificacion"] >= $i + 1) { ?>
                                                        <div class="rating-left">
                                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="rating-left">
                                                            <img src="images/1.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } ?>                                               
                                                <?php } ?>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="single.php?codigo=<?php echo $prod2["Id"]; ?>&tipo=<?php echo $prod2["Tipo"]; ?>"><?php echo $prod2["Nombre"]; ?></a></h4>
                                    <p><?php echo $prod2["DescripcionP"]; ?></p>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <?php if ($prod2["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod2["Precio"]; ?></i><span class="item_price"><?php
                                            $descuento = $prod2["Descuento"] / 100;
                                            $rebaja = $prod2["Precio"] * $descuento;
                                            $total = $prod2["Precio"] - $rebaja;
                                            echo '₡' . $total;
                                            ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod2["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                            <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod2["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod2["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!--productos centro-->
                            <div class="col-md-6 new-collections-grid">
                                <!--                        productos centro 1-->
                                <div class="new-collections-grid-sub-grids">
                                    <div class="new-collections-grid1-sub">
                                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                            <div class="new-collections-grid1-image">
                                                <a href="single.php?codigo=<?php echo $prod3["Id"]; ?>&tipo=<?php echo $prod3["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod3["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                                <div class="new-collections-grid1-image-pos">
                                                    <a href="single.php?codigo=<?php echo $prod3["Id"]; ?>&tipo=<?php echo $prod3["Tipo"]; ?>">Vista previa</a>
                                                </div>
                                                <!--                                rating de producto-->
                                                <div class="new-collections-grid1-right">
                                                    <div class="rating">
                                                        <?php
                                                        for ($i = 0; $i < 5; $i++) {
                                                            ?>
                                                            <?php if ($prod3["Calificacion"] > $i && $prod3["Calificacion"] >= $i + 1) { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/2.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/1.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } ?>                                               
                                                        <?php } ?>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4><a href="single.php?codigo=<?php echo $prod3["Id"]; ?>&tipo=<?php echo $prod3["Tipo"]; ?>"><?php echo $prod3["Nombre"]; ?></a></h4>
                                            <p><?php echo $prod3["DescripcionP"]; ?></p>
                                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                                <?php if ($prod3["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod3["Precio"]; ?></i><span class="item_price"><?php
                                                    $descuento = $prod3["Descuento"] / 100;
                                                    $rebaja = $prod3["Precio"] * $descuento;
                                                    $total = $prod3["Precio"] - $rebaja;
                                                    echo '₡' . $total;
                                                    ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod3["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                                    <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod3["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod3["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-collections-grid1-sub">
                                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                            <div class="new-collections-grid1-image">
                                                <a href="single.php?codigo=<?php echo $prod4["Id"]; ?>&tipo=<?php echo $prod4["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod4["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                                <div class="new-collections-grid1-image-pos">
                                                    <a href="single.php?codigo=<?php echo $prod4["Id"]; ?>&tipo=<?php echo $prod4["Tipo"]; ?>">Vista previa</a>
                                                </div>
                                                <!--                                rating de producto-->
                                                <div class="new-collections-grid1-right">
                                                    <div class="rating">
                                                        <?php
                                                        for ($i = 0; $i < 5; $i++) {
                                                            ?>
                                                            <?php if ($prod4["Calificacion"] > $i && $prod4["Calificacion"] >= $i + 1) { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/2.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/1.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } ?>                                               
                                                        <?php } ?>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4><a href="single.php?codigo=<?php echo $prod4["Id"]; ?>&tipo=<?php echo $prod4["Tipo"]; ?>"><?php echo $prod4["Nombre"]; ?></a></h4>
                                            <p><?php echo $prod4["DescripcionP"]; ?></p>
                                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                                <?php if ($prod4["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod4["Precio"]; ?></i><span class="item_price"><?php
                                                    $descuento = $prod4["Descuento"] / 100;
                                                    $rebaja = $prod4["Precio"] * $descuento;
                                                    $total = $prod4["Precio"] - $rebaja;
                                                    echo '₡' . $total;
                                                    ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod4["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                                    <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod4["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod4["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                            productos centro 2-->
                                <div class="new-collections-grid-sub-grids">
                                    <!--                            producto 1-->
                                    <div class="new-collections-grid1-sub">
                                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                            <div class="new-collections-grid1-image">
                                                <a href="single.php?codigo=<?php echo $prod5["Id"]; ?>&tipo=<?php echo $prod5["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod5["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                                <div class="new-collections-grid1-image-pos">
                                                    <a href="single.php?codigo=<?php echo $prod5["Id"]; ?>&tipo=<?php echo $prod5["Tipo"]; ?>">Vista previa</a>
                                                </div>
                                                <!--                                rating de producto-->
                                                <div class="new-collections-grid1-right">
                                                    <div class="rating">
                                                        <?php
                                                        for ($i = 0; $i < 5; $i++) {
                                                            ?>
                                                            <?php if ($prod5["Calificacion"] > $i && $prod5["Calificacion"] >= $i + 1) { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/2.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/1.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } ?>                                               
                                                        <?php } ?>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4><a href="single.php?codigo=<?php echo $prod5["Id"]; ?>&tipo=<?php echo $prod5["Tipo"]; ?>"><?php echo $prod5["Nombre"]; ?></a></h4>
                                            <p><?php echo $prod5["DescripcionP"]; ?></p>
                                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                                <?php if ($prod5["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod5["Precio"]; ?></i><span class="item_price"><?php
                                                    $descuento = $prod5["Descuento"] / 100;
                                                    $rebaja = $prod5["Precio"] * $descuento;
                                                    $total = $prod5["Precio"] - $rebaja;
                                                    echo '₡' . $total;
                                                    ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod3["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                                    <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod5["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod5["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                            producto 2-->
                                    <div class="new-collections-grid1-sub">
                                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                            <div class="new-collections-grid1-image">
                                                <a href="single.php?codigo=<?php echo $prod6["Id"]; ?>&tipo=<?php echo $prod6["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod6["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                                <div class="new-collections-grid1-image-pos">
                                                    <a href="single.php?codigo=<?php echo $prod6["Id"]; ?>&tipo=<?php echo $prod6["Tipo"]; ?>">Vista previa</a>
                                                </div>
                                                <!--                                rating de producto-->
                                                <div class="new-collections-grid1-right">
                                                    <div class="rating">
                                                        <?php
                                                        for ($i = 0; $i < 5; $i++) {
                                                            ?>
                                                            <?php if ($prod6["Calificacion"] > $i && $prod6["Calificacion"] >= $i + 1) { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/2.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="rating-left">
                                                                    <img src="images/1.png" alt=" " class="img-responsive" />
                                                                </div>
                                                            <?php } ?>                                               
                                                        <?php } ?>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4><a href="single.php?codigo=<?php echo $prod6["Id"]; ?>&tipo=<?php echo $prod6["Tipo"]; ?>"><?php echo $prod6["Nombre"]; ?></a></h4>
                                            <p><?php echo $prod6["DescripcionP"]; ?></p>
                                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                                <?php if ($prod6["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod6["Precio"]; ?></i><span class="item_price"><?php
                                                    $descuento = $prod6["Descuento"] / 100;
                                                    $rebaja = $prod6["Precio"] * $descuento;
                                                    $total = $prod6["Precio"] - $rebaja;
                                                    echo '₡' . $total;
                                                    ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod6["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                                    <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod6["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod6["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <!--                    productos derecha-->
                            <div class="col-md-3 new-collections-grid">
                                <!--                        producto 1-->
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.php?codigo=<?php echo $prod7["Id"]; ?>&tipo=<?php echo $prod7["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod7["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.php?codigo=<?php echo $prod7["Id"]; ?>&tipo=<?php echo $prod7["Tipo"]; ?>">Vista previa</a>
                                        </div>
                                        <!--                                rating de producto-->
                                        <div class="new-collections-grid1-right">
                                            <div class="rating">
                                                <?php
                                                for ($i = 0; $i < 5; $i++) {
                                                    ?>
                                                    <?php if ($prod7["Calificacion"] > $i && $prod7["Calificacion"] >= $i + 1) { ?>
                                                        <div class="rating-left">
                                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="rating-left">
                                                            <img src="images/1.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } ?>                                               
                                                <?php } ?>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="single.php?codigo=<?php echo $prod7["Id"]; ?>&tipo=<?php echo $prod7["Tipo"]; ?>"><?php echo $prod7["Nombre"]; ?></a></h4>
                                    <p><?php echo $prod7["DescripcionP"]; ?></p>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <?php if ($prod7["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod7["Precio"]; ?></i><span class="item_price"><?php
                                            $descuento = $prod7["Descuento"] / 100;
                                            $rebaja = $prod7["Precio"] * $descuento;
                                            $total = $prod7["Precio"] - $rebaja;
                                            echo '₡' . $total;
                                            ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod7["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                            <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod7["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod7["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--                        producto 2-->
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.php?codigo=<?php echo $prod8["Id"]; ?>&tipo=<?php echo $prod8["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod8["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.php?codigo=<?php echo $prod8["Id"]; ?>&tipo=<?php echo $prod8["Tipo"]; ?>">Vista previa</a>
                                        </div>
                                        <!--                                rating de producto-->
                                        <div class="new-collections-grid1-right">
                                            <div class="rating">
                                                <?php
                                                for ($i = 0; $i < 5; $i++) {
                                                    ?>
                                                    <?php if ($prod8["Calificacion"] > $i && $prod8["Calificacion"] >= $i + 1) { ?>
                                                        <div class="rating-left">
                                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="rating-left">
                                                            <img src="images/1.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } ?>                                               
                                                <?php } ?>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="single.php?codigo=<?php echo $prod8["Id"]; ?>&tipo=<?php echo $prod8["Tipo"]; ?>"><?php echo $prod8["Nombre"]; ?></a></h4>
                                    <p><?php echo $prod8["DescripcionP"]; ?></p>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <?php if ($prod8["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod8["Precio"]; ?></i><span class="item_price"><?php
                                            $descuento = $prod8["Descuento"] / 100;
                                            $rebaja = $prod8["Precio"] * $descuento;
                                            $total = $prod8["Precio"] - $rebaja;
                                            echo '₡' . $total;
                                            ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod8["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>

                                            <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod8["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod8["Id"]; ?>"><a class="item_add" >Agreg. al carro</a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <h1>¡No hay productos en la base de datos!</h1>
            <?php } ?>
        <?php } ?>
        <!-- //collections -->
        <!-- collections-bottom -->
        <div class="collections-bottom">
            <div class="container">
                <div class="collections-bottom-grids">
                    <div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
                        <h3>45% de descuento en productos para<span style="color: #cccccc">tus perros</span></h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- //collections-bottom -->
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

