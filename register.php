<?php
session_start();
if (isset($_SESSION["datos-usuario"])) {
    header("Location:index.php");
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
        <title>Happy Petshop | Registro</title>
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
        <!-- header -->
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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos<b class="caret"></b></a>
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
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                    <li class="active">Página de registro</li>
                </ol>
            </div>
        </div>
        <!-- //breadcrumbs -->
        <!-- register -->
        <div class="register">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">Regístrate aquí</h3>
                <p class="est animated wow zoomIn" data-wow-delay=".5s">Inicia tu registro ¡HOY! en Happy PetShop y disfruta de grandes beneficios, ademas se el primero en enterarte de las ofertas diarias en artículos para tus mascotas y mucho más</p>
                <div class="login-form-grids">
                    <h5 class="animated wow slideInUp" data-wow-delay=".5s">Información de perfil</h5>                  
                    <form id="frmSubirImagenUsuario">
                        <center><img id="blah" src="images/no-image-icon.png" width="250px" class="img-responsive" style="border: 1px solid black"/></center>
                        <input type="hidden" name="MAX_FILE_SIZE"  />
                        <input type="hidden" name="accion" value="SubirImagenUsuario">
                        Escoge tu imagen de perfil: <input type="file" name="file" id="file" accept="image/png, .jpeg, .jpg, image/gif" onchange="document.getElementById('nomImagen').value = document.getElementById('file').files[0].name"/>
                        <br>
                    </form>                    
                    <form class="animated wow slideInUp" data-wow-delay=".5s" id="frmRegistro">
                        <input type="text" placeholder="Nombre..." required=" " name="Nombre" ><small id="small_alerta_Nombre" style="opacity: 0">*Campo vacio</small>
                        <input type="text" placeholder="Apellido..." required=" " name="Apellido"><small id="small_alerta_Apellido" style="opacity: 0">* Campo vacio</small>
                        <div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="Subscripcion"><i> </i>Suscríbete y recibe ofertas</label>
                            </div>
                        </div>
                        <h6 class="animated wow slideInUp" data-wow-delay=".5s">Información de inicio de sesión</h6>

                        <input type="email" placeholder="Correo electrónico" required=" " name="Email" ><small id="small_alerta_Email" style="opacity: 0">* Campo vacio o formato incorrecto</small>
                        <input type="password" placeholder="Contraseña" required=" " name="Contrasena"><small id="small_alerta_Contrasena" style="opacity: 0">* Campo vacio</small>
                        <input type="password" placeholder="Confirmar contraseña" required=" " name="ConfContrasena">
                        <small id="small_alerta_ConfContrasena" style="opacity: 0">La contraseña no concuerda</small>
                        <div class="register-check-box">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="Terminos"><i> </i>Acepto los terminos y condiciones</label>
                                <small id="small_alerta_Terminos" style="opacity: 0">* Debes aceptar los terminos para continuar</small>
                            </div>
                        </div>
                        <input type="text" id="nomImagen" name="NomImagenUsuario">  
                        <input type="button" id="btnRegistro" value="Registrarse"><br>
                        <small id="small_alerta_registro" style="opacity: 0">Algunos datos son erroneos o estan vacios</small>
                    </form>
                </div>
                <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                    <br>
                    <p>Ya tienes una cuenta en Happy PetShop? <a href="login.php">Inicia sesion</a>!</p>
                </div>
            </div>
        </div>
        <!-- //register -->
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
