<?php
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
        <title>Happy PetShop | Acerca de nosotros</title>
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
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <!-- for bootstrap working -->
        <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
        <!-- //for bootstrap working -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
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
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                    <li class="active">Acerca de nosotros</li>
                </ol>
            </div>
        </div>
        <!-- //breadcrumbs -->
        <!--typography-page -->
        <div class="typo">
            <div class="container">
                <div class="typo-grids">
                    <h3 class="title animated wow zoomIn" data-wow-delay=".5s"><img src="images/Logo hueso (provisional).png"></h3>
                    <br>
                    <p class="est animated wow zoomIn" data-wow-delay=".5s" style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id consequat erat. Vivamus nisi ante, blandit quis dolor vitae, aliquam dignissim tortor. Nunc commodo sed metus in vehicula. Aliquam tempus risus sem. Integer euismod non tortor eget volutpat. Donec ornare arcu in nunc convallis, a faucibus turpis fermentum. Nunc sed purus at ipsum aliquam suscipit. Nunc ut metus aliquet erat vehicula fringilla pulvinar placerat velit. Mauris tempus metus in convallis vehicula. Proin tellus ligula, ultricies quis commodo ac, suscipit et erat. Fusce eu efficitur lectus. Praesent sit amet felis nec lacus hendrerit tincidunt vel vitae elit. Nam feugiat urna a est facilisis pretium. Donec sit amet volutpat eros. Pellentesque non lacinia mi.</p>
                    <br>
                    <br>
                    <h3 class="title animated wow zoomIn" data-wow-delay=".5s">Proyecto</h3>
                    <p class="est animated wow zoomIn" data-wow-delay=".5s" style="column-count: 2; text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec aliquam purus. Nunc consectetur sodales urna nec auctor. Vestibulum sit amet metus non ipsum mattis placerat. Suspendisse efficitur lorem suscipit eleifend pharetra. Integer venenatis nulla vitae malesuada pretium. Donec sed arcu et sapien fringilla eleifend a sit amet tellus. Nulla odio arcu, luctus vel massa eget, scelerisque vestibulum ex. Praesent ornare tempor nisl ac pretium. Quisque convallis lacus sed ligula ultricies viverra.

Quisque malesuada dapibus fermentum. Nunc nec mauris vel dui tincidunt venenatis vitae pulvinar diam. Suspendisse at maximus quam, non dictum erat. Duis pretium molestie augue, et dictum leo lobortis sed. Praesent vel sapien et turpis posuere elementum. Maecenas a vestibulum justo. Curabitur blandit, lorem eu tristique auctor, velit tellus lacinia felis, interdum molestie erat metus id est. Curabitur vitae dolor neque. Donec cursus quis dolor in accumsan. Cras tempor sit amet ipsum vel pharetra. Cras id risus fringilla, rutrum urna rutrum, finibus augue. Quisque ultrices tellus ut nunc aliquet gravida. Proin dictum imperdiet mauris, ullamcorper fringilla velit interdum congue. Phasellus vel viverra lacus. Nullam egestas tortor ac tortor mattis, in pellentesque mauris luctus.

Etiam vulputate mi sit amet nibh tempus, eu varius ipsum placerat. Donec sodales a enim non vehicula. Pellentesque et metus risus. Vestibulum risus elit, bibendum at congue sit amet, iaculis non elit. Morbi quis libero nec dui hendrerit volutpat a at mi. Morbi et ex diam. Ut vitae mi quis lacus pellentesque sodales sit amet id ex. Aenean bibendum arcu quis mauris ornare, ac gravida lorem posuere. Etiam hendrerit ut arcu vitae ultrices. Aliquam porta ipsum mauris, vitae mattis nulla ultrices id. Cras et neque lacinia quam facilisis porta. Aenean eu dictum massa. Duis molestie felis ut urna bibendum ullamcorper. In sed turpis sed nisl maximus tincidunt.

Suspendisse in ipsum a felis varius ullamcorper. Cras dignissim faucibus libero id scelerisque. Maecenas consequat eros sit amet sem faucibus, sit amet fringilla massa ullamcorper. Ut a libero cursus, finibus augue nec, efficitur quam. Quisque eget elit sed quam vulputate consequat. Cras maximus lorem nec nisl dignissim hendrerit. Curabitur non odio ante. Sed et mattis mauris, sed auctor nulla. Nullam efficitur lectus ante, quis porttitor dolor rhoncus et. Ut id ex dui. Phasellus eu lacinia sem. Mauris sit amet est dictum, rhoncus ex at, luctus nibh. Nullam suscipit luctus felis, a aliquet lorem hendrerit at. In hac habitasse platea dictumst. Sed venenatis rhoncus tristique.</p>                   
                </div>
            </div>
        </div>
        <!-- //typography-page -->
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
