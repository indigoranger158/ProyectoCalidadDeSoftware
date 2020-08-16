<?php
/* Revisa si se ha iniciado sesion */
session_start();
if (!isset($_SESSION["datos-usuario"])) {
    $visitante = true;
} else {
    $visitante = false;
    $Id = $_SESSION["datos-usuario"]["Id"];
    $Nombre = $_SESSION["datos-usuario"]["Nombre"];
    $Apellido = $_SESSION["datos-usuario"]["Apellido"];
    $Rol = $_SESSION["datos-usuario"]["Rol"];
    if ($Rol == "Admin") {
        /* Ya que los administradores no pueden comprar objetos si el usuario iniciado es Admin se devolvera al index */
        header("Location:index.php");
    }
}

$codigo = ($_GET["codigo"]);
/* Revisa si se ha enviado un codigo y si el usuario a iniciado sesion */
if (!isset($codigo) && $visitante == true) {
    /* Si el usuario no ha enviado un codigo y no ha iniciado sesion lo envia al index.php */
    header("Location:index.php");
}
if (!isset($codigo) && $visitante == false) {
    /* Si el usuario no ha enviado un codigo y ha iniciado sesion lo envia al user-index.php */
    header("Location:user-index.php");
}
/* Obtiene el tipo de producto */
$tipo_producto = ($_GET["tipo"]);

/* Objeto de la clase producto */
include './clases/Producto.php';
$producto = new Producto();

/* Objeto de la clase usuario */
include './clases/Usuario.php';
$usuario = new Usuario();

/* Obtiene el producto de acuerdo al id de producto que se envio y el tipo de producto */
$prod = $producto->obtenerProducto($codigo, $tipo_producto);
/* Revisa el tipo de producto para realizar la respectiva consulta a la base de datos */
if ($tipo_producto == "Ropa") {
    $lista_productos = $producto->obtenerListaRopaRelacionada($tipo_producto, $prod["TipoRopa"], $prod["Precio"]);
}
if ($tipo_producto == "Accesorio") {
    $lista_productos = $producto->obtenerListaAccesorioRelacionada($tipo_producto, $prod["TipoAccesorio"], $prod["Precio"]);
}

/* Obtiene los comentarios de producto de acuerdo al codigo del producto */
$lista_comentarios = $producto->obtenerComentarios($codigo);
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
        <title>Happy PetStore | Producto</title>
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
                                                <li><a href="listarCompras.php">Lista de Compras</a></li>
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
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                    <li class="active">Página de producto</li>
                </ol>
            </div>
        </div>
        <!-- //breadcrumbs -->
        <!-- single -->
        <div class="single">
            <div class="container">
                <div class="col-md-4 products-left">
                    <div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
                        <h3>Filtrar por precio</h3>
                        <!--                        filtra los productos por el rango de precio-->
                        <form id="frmFiltrarProductos">
                            <ul class="dropdown-menu1">
                                <li><a>								               
                                        <div id="slider-range"></div>							
                                        <input type="text" id="amount" name="amount" style="border: 0" />
                                        <input type="button" id="btnFiltrarProductos" name="amount" value="Filtrar" />
                                    </a>
                                </li>	
                            </ul>
                        </form>
                        <script type='text/javascript'>//<![CDATA[ 
                            $(window).load(function () {
                                $("#slider-range").slider({
                                    range: true,
                                    min: 0,
                                    max: 20000,
                                    values: [10000, 60000],
                                    slide: function (event, ui) {
                                        $("#amount").val("₡" + ui.values[ 0 ] + " - ₡" + ui.values[ 1 ]);
                                    }
                                });
                                $("#amount").val("₡" + $("#slider-range").slider("values", 0) + " - ₡" + $("#slider-range").slider("values", 1));


                            });//]]>
                        </script>
                        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
                        <!---->
                    </div>
                    <!--                    Filtra los productos de acuerdo al precio-->
                    <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                        <h3>Productos</h3>
                        <ul class="cate">
                            <li><a href="products.php?tipoProducto=Ropa&genero=null&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0" id="aRopa">Ropa</a> <span  id="spanRopa">(0)</span></li>
                            <ul>
                                <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0" id="aRopaPerro">Ropa para perro</a> <span id="spanRopaPerro">(0)</span></li>
                                <ul>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Camiseta&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerroCamisetas">Camisetas</a> <span id="spanCamisetasPerro">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Camisa&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerroCamisas">Camisas</a> <span id="spanCamisasPerro">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Overol&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerroOveroles">Overoles</a> <span id="spanOverolesPerro">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Pijama&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerroPijamas">Pijamas</a> <span id="spanPijamasPerro">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Macho&tipo=Abrigo&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerroAbrigos">Abrigos</a> <span id="spanAbrigosPerro">(0)</span></li>
                                </ul>
                                <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=null&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerra">Ropa para perra</a> <span id="spanRopaPerra">(0)</span></li>
                                <ul>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Vestido&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerraVestidos">Vestidos</a> <span id="spanVestidosPerra">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Blusa&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerraBlusas">Blusas</a> <span id="spanBlusasPerra">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Overol&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerraOveroles">Overoles</a> <span id="spanOverolesPerra">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Pijama&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerraPijamas">Pijamas</a> <span id="spanPijamasPerra">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Enagua&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerraEnaguas">Enaguas</a> <span  id="spanEnaguasPerra">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Ropa&genero=Hembra&tipo=Abrigo&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aRopaPerraAbrigos">Abrigos</a> <span  id="spanAbrigosPerra">(0)</span></li>
                                </ul>
                            </ul>
                            <li><a href="products.php?tipoProducto=Accesorio&genero=null&tipo=null&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aAccesorio">Accesorios</a> <span  id="spanAccesorio">(0)</span></li>
                            <ul>
                                <li><a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0" id="aAccesorioPerro">Accesorios para perro</a> <span id="spanAccesorioPerro">(0)</span></li>
                                <ul> 
                                    <li><a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=Collar&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aAccesorioPerroCollares">Collares</a> <span id="spanCollaresPerro">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Accesorio&genero=Macho&tipo=Gorra&montoMin=0&montoMax=999999&descuento=0&pagina=0"id="aAccesorioPerroGorras">Gorras</a> <span id="spanGorrasPerro">(0)</span></li>
                                </ul>
                                <li><a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0" id="aAccesorioPerra">Accesorios para perra</a> <span id="spanAccesorioPerra">(0)</span></li>
                                <ul> 
                                    <li><a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Collar&montoMin=0&montoMax=999999&descuento=0&pagina=0" id="aAccesorioPerraCollares">Collares</a> <span id="spanCollaresPerra">(0)</span></li>
                                    <li><a href="products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Gorra&montoMin=0&montoMax=999999&descuento=0&pagina=0"id="aAccesorioPerraGorras">Gorras</a> <span id="spanGorrasPerra">(0)</span></li>
                                </ul>
                            </ul>
                        </ul>
                    </div>
                    <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                        <a href="products.php?tipoProducto=null&genero=null&tipo=null&montoMin=0&montoMax=999999&descuento=45&pagina=0"><img src="images/29.jpg" alt=" " class="img-responsive" /></a>
                        <div class="men-position-pos">
                            <h4>Precios increibles</h4>
                            <h5>Hasta <span>45%</span> de descuento</h5>
                        </div>
                    </div>
                </div>
                <!--                Informacion del producto-->
                <div class="col-md-8 single-right">
                    <!--                        Imagenes del producto-->
                    <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="<?php echo $prod["Dir_Imagen_Portada"]; ?>">
                                    <div class="thumb-image"> <img src="<?php echo $prod["Dir_Imagen_Portada"]; ?>" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="<?php echo $prod["Dir_Imagen_1"]; ?>">
                                    <div class="thumb-image"> <img src="<?php echo $prod["Dir_Imagen_1"]; ?>" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="<?php echo $prod["Dir_Imagen_2"]; ?>">
                                    <div class="thumb-image"> <img src="<?php echo $prod["Dir_Imagen_2"]; ?>" data-imagezoom="true" class="img-responsive"> </div>
                                </li> 
                            </ul>
                        </div>
                        <!-- flixslider -->
                        <script defer src="js/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
                        <script>
                            // Can also be used with $(document).ready()
                            $(window).load(function () {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>
                        <!-- flixslider -->
                    </div>
                    <!--                    Datos del producto-->
                    <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
                        <h3><?php echo $prod["Nombre"] . " - " . $prod["Marca"] ?></h3>
                        <h4><?php if ($prod["Descuento"] != 0) { ?><p><i style="color: grey"><?php echo "Antes ₡" . $prod["Precio"] . " - "; ?></i><span class="item_price"><?php
                                        $descuento = $prod["Descuento"] / 100;
                                        $rebaja = $prod["Precio"] * $descuento;
                                        $total = $prod["Precio"] - $rebaja;
                                        echo 'Ahora ₡' . $total;
                                        ?></span><br></p><?php } else { ?>
                                <p><span class="item_price"><?php echo "₡" . $prod["Precio"]; ?></span></p>
                            <?php } ?></h4>
                        <div class="rating1">
                            <div class="rating">
                                <?php
                                for ($i = 0; $i < 5; $i++) {
                                    ?>
                                    <?php if ($prod["Calificacion"] > $i && $prod["Calificacion"] >= $i + 1) { ?>
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
                        <div class="description">
                            <h5><i>Descripcion</i></h5>
                            <p><?php echo $prod["DescripcionP"]; ?></p>
                        </div>
                        <div class="color-quality">
                            <div class="color-quality-left">
                                <h5>Color : </h5>
                                <ul>
                                    <?php
                                    $colores = $producto->obtenerColores($prod["Color"]);
                                    for ($i = 0; $i < count($colores); $i++) {
                                        ?>
                                        <?php if ($colores[$i] == "Blanco") { ?>
                                            <li><a><span style="background: #ffffff"></span><input type="radio" value="Blanco" name="Color" checked=""> Blanco</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Rojo") { ?>
                                            <li><a><span style="background: red"></span><input type="radio" value="Rojo" name="Color" checked=""> Rojo</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Azul") { ?>
                                            <li><a><span style="background: blue"></span><input type="radio" value="Azul" name="Color" checked=""> Azul</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Gris") { ?>
                                            <li><a><span style="background: grey"></span><input type="radio" value="Gris" name="Color" checked=""> Gris</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Verde") { ?>
                                            <li><a><span style="background: green"></span><input type="radio" value="Verde" name="Color" checked=""> Verde</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Amarillo") { ?>
                                            <li><a><span style="background: yellow"></span><input type="radio" value="Amarillo" name="Color" checked=""> Amarillo</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Rosa") { ?>
                                            <li><a><span style="background: pink"></span><input type="radio" value="Rosa" name="Color" checked=""> Rosa</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Celeste") { ?>
                                            <li><a><span style="background: lightblue"></span><input type="radio" value="Celeste" name="Color" checked=""> Celeste</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Morado") { ?>
                                            <li><a><span style="background: #990099"></span><input type="radio" value="Morado" name="Color" checked=""> Morado</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Cafe") { ?>
                                            <li><a><span style="background: #993300"></span><input type="radio" value="Cafe" name="Color" checked=""> Café</a></li>
                                        <?php } ?>
                                        <?php if ($colores[$i] == "Negro") { ?>
                                            <li><a><span style="background: black"></span><input type="radio" value="Negro" name="Color" checked=""> Negro</a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="color-quality-right">
                                <h5>Cantidad :</h5>
                                <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                                    <?php for ($i = 1; $i <= $prod["Cantidad"]; $i++) { ?>
                                        <option value="null"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="occasional">
                            <h5>Tallas:</h5>
                            <?php
                            $tallas = $producto->obtenerTallas($prod["Talla"]);
                            for ($i = 0; $i < count($tallas); $i++) {
                                ?>
                                <div class="colr ert">
                                    <label class="radio"><input type="radio" name="Talla" checked=""><i></i><?php echo $tallas[$i]; ?></label>
                                </div>                           
                            <?php } ?>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="occasion-cart ProdId">
                            <input type="hidden" name="ProdId" id="ProdId" value="<?php echo $codigo; ?>"><a class="item_add" href="#">Agreg. al carro</a>
                        </div>
                        <div class="social">
                            <div class="social-left">
                                <p>Compartir :</p>
                            </div>
                            <div class="social-right">
                                <ul class="social-icons">
                                    <li><a href="#" class="facebook"></a></li>
                                    <li><a href="#" class="twitter"></a></li>
                                    <li><a href="#" class="g"></a></li>
                                    <li><a href="#" class="instagram"></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Descripcion</a></li>
                                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reseñas (<?php echo $producto->obtenerNumeroDeCalificaciones($codigo) . " "; ?>)</a></li>
                                <li role="presentation" class="dropdown">
                                    <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">Información<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                        <li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Marca</a></li>
                                        <li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Producto</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                                    <h5>Descripción del producto</h5>
                                    <p><?php echo $prod["DescripcionG"] ?></p>                                   
                                </div>
                                <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                                    <div class="bootstrap-tab-text-grids">
                                        <?php if ($lista_comentarios["valido"] == "true") { ?>
                                            <!--                                            Comentarios-->
                                            <?php foreach ($lista_comentarios["datos-comentarios"] as $comentario) { ?>
                                                <div class="bootstrap-tab-text-grid">
                                                    <div class="bootstrap-tab-text-grid-left">
                                                        <img src="<?php echo $comentario["Dir_Imagen_Perfil"]; ?>" alt=" " class="img-responsive" />
                                                    </div>
                                                    <div class="bootstrap-tab-text-grid-right">
                                                        <ul>
                                                            <li><a><?php echo $comentario["Nombre"]; ?></a></li>
                                                            <li><div class="rating">
                                                                    <?php
                                                                    for ($i = 0; $i < 5; $i++) {
                                                                        ?>
                                                                        <?php if ($comentario["Calificacion"] > $i && $comentario["Calificacion"] >= $i + 1) { ?>
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
                                                                </div></li>
                                                        </ul>
                                                        <p><?php echo $comentario["Asunto"]; ?></p>
                                                        <p><?php echo $comentario["Comentario"]; ?></p>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                                <br>
                                                <br>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <p>Se el primero en comentar este artículo</p>
                                        <?php } ?>
                                    </div>
                                    <?php
                                    if ($visitante == false) {
                                        $cantComentariosDeUsuarioAProducto = $usuario->obtnerNumeroDeComentariosDeUsuarioAProducto($Id = $_SESSION["datos-usuario"]["Id"], $codigo = ($_GET["codigo"]));
                                        ?>
                                        <?php if ($cantComentariosDeUsuarioAProducto >= 1) { ?>
                                            <br>
                                            <br>
                                            <p>Ya has comentado este producto</p>
                                        <?php } else { ?>
                                            <div class="add-review">
                                                <h4 id="tituloComentar">Agregar una reseña</h4>
                                                <form id="frmComentar">                                                                                                   
                                                    <input type="text" name="IdUsuario" hidden="" value="<?php echo $Id; ?>">
                                                    <input type="text" name="IdProducto" hidden="" value="<?php echo $codigo = ($_GET["codigo"]); ?>">
                                                    <br>
                                                    <p>Califica el producto</p>
                                                    <select name="Calificacion">
                                                        <option value="1">1 estrella</option>
                                                        <option value="2">2 estrellas</option>
                                                        <option value="3">3 estrellas</option>
                                                        <option value="4">4 estrellas</option>
                                                        <option value="5">5 estrellas</option>
                                                    </select>
                                                    <input type="text" name="Asunto" placeholder="Asunto..." required=""><br>
                                                    <textarea type="text" name="Comentario" placeholder="Comentario..." required=""></textarea>
                                                    <p id="alerta_comentario" style="opacity: 0">Debes completar los espacios</p>
                                                    <input type="button" id="btnComentar" value="Enviar" >
                                                </form>
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <br>
                                        <br>
                                        <p>Debes <a href="login.php">iniciar sesion</a> para poder comentar un producto</p>
                                    <?php } ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
                                    <img src="<?php echo $prod["Dir_Imagen_Marca"] ?>" width="80px" height="80px"><br>
                                    <strong><?php echo $prod["Marca"] ?></strong>
                                    <p><?php echo $prod["InfoMarca"] ?></p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
                                    <p><?php echo $prod["Informacion"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //single -->
        <!-- single-related-products -->
        <div class="single-related-products">
            <div class="container">
                <h3 class="animated wow slideInUp" data-wow-delay=".5s">Productos relacionados</h3>
                <?php if ($lista_productos["valido"] == "true") { ?>
                    <p class="est animated wow slideInUp" data-wow-delay=".5s">Algunos productos que te podrian interesar.</p>
                    <div class="col-lg-12 new-collections-grids">

                        <?php foreach ($lista_productos["datos-productos"] as $prod) { ?>
                            <div class="col-md-3 new-collections-grid">
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.php?codigo=<?php echo $prod["Id"]; ?>&tipo=<?php echo $prod["Tipo"]; ?>" class="product-image"><img src="<?php echo $prod["Dir_Imagen_Portada"]; ?>" alt=" " class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.php?codigo=<?php echo $prod["Id"]; ?>&tipo=<?php echo $prod["Tipo"]; ?>">Vista previa</a>
                                        </div>
                                        <!--                                rating de producto-->
                                        <div class="new-collections-grid1-right">
                                            <div class="rating">
                                                <?php
                                                for ($i = 0; $i < 5; $i++) {
                                                    ?>
                                                    <?php if ($prod["Calificacion"] > $i && $prod["Calificacion"] >= $i + 1) { ?>
                                                        <div class="rating-left">
                                                            <img src="images/2.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="rating-left">
                                                            <img src="images/1.png" alt=" " class="img-responsive" />
                                                        </div>
                                                    <?php } ?>                                               
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="single.php?codigo=<?php echo $prod["Id"]; ?>&tipo=<?php echo $prod["Tipo"]; ?>"><?php echo $prod["Nombre"]; ?></a></h4>
                                    <p><?php echo $prod["DescripcionP"]; ?></p>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <?php if ($prod["Descuento"] != 0) { ?><p class="ProdId"><i><?php echo "₡" . $prod["Precio"]; ?></i><span class="item_price"><?php
                                            $descuento = $prod["Descuento"] / 100;
                                            $rebaja = $prod["Precio"] * $descuento;
                                            $total = $prod["Precio"] - $rebaja;
                                            echo '₡' . $total;
                                            ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p><?php } else { ?>                                        
                                            <p class="ProdId"><span class="item_price"><?php echo "₡" . $prod["Precio"]; ?></span><br><input type="hidden" name="ProdId" id="ProdId" value="<?php echo $prod["Id"]; ?>"><a class="item_add" href="#">Agreg. al carro</a></p>
                                        <?php } ?>
                                    </div>
                                </div></div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <p class="est animated wow slideInUp" data-wow-delay=".5s">Esto es extraño...no hay productos relacionados prueba una nueva busqueda.</p>
                <?php } ?>
            </div>
        </div>
        <!-- //single-related-products -->
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
        <!-- zooming-effect -->
        <script src="js/imagezoom.js"></script>
        <!-- //zooming-effect -->
    </body>
</html>

