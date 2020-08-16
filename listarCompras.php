<?php
include './validaSesion.php';

$Id = $_SESSION["datos-usuario"]["Id"];
$Nombre = $_SESSION["datos-usuario"]["Nombre"];
$Apellido = $_SESSION["datos-usuario"]["Apellido"];
$Rol = $_SESSION["datos-usuario"]["Rol"];

/* A los usuario no administradores los devolvera al index de clientes */
if ($Rol != "Admin") {
    header("Location:index.php");
}

include './clases/Compra.php';
/* Crea objeto de la clase Compra */
$compra = new Compra();
/* Obtiene la lsia de compras realizadas por el usuario */
$lista_compras = $compra->obtenerComprasHappyPetShop();
?>
<html>
    <head>
        <title>Happy PetStore | Lista de compras</title>
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
                                            <li><a href="listarCompras.php.php">Lista de compras</a></li>
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
        <div class="typo">
            <div class="container">
                <div class="typo-grids">
                    <center>
                        <h3 class="animated wow zoomIn" data-wow-delay=".5s" style="font-size: 35">Lista de compras</h3> 
                    </center>
                    <br>
                    <center>
                        <p class="est animated wow zoomIn" data-wow-delay=".5s" style="text-align: center">Lista las compras hechas por usuario de Happy PetShop</p>
                        <br>
                        <img src="images/compras-icon.jpg" width="100px">
                    </center>
                    <center>
                        <div class="page-header animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                            <h3 class="bars">Ver detalles de compra</h3>
                            <form id="frmVerCompra">
                                <p>Digite el numero de factura para ver sus detalles</p>
                                <input type="number" name="Id" id="IdCompra">
                                <input type="button" value="Ver detalles" id="btnAbrirDetallesCompra">
                                <br>
                                <div id="divVerCompra">
                                    <strong>Nº Factura: </strong><p id="VerNumeroFactura"></p><hr>
                                    <strong>Imagen producto: </strong><img src="" id="VerImagenProducto" width="100px"><hr>
                                    <strong>Nombre producto: </strong><p id="VerNombreProducto"></p><hr>
                                    <strong>Precio: </strong><p id="VerPrecioProducto"></p><hr>
                                    <strong>Descuento: </strong><p id="VerDescuentoProducto"></p><hr>
                                    <strong>Monto recibido: </strong><p id="VerMontoRecibido"></p><hr>
                                    <strong>Marca: </strong><img src="" id="VerImagenMarca" width="50px"><hr>
                                    <strong>Tipo de tarjeta: </strong><img src="" id="VerTipoTarjeta" width="50px"><hr>
                                    <strong>Nº tarjeta: </strong><p id="VerNumeroTarjeta"></p><hr>
                                    <strong>Código de usuario: </strong><p id="VerIdUsuario"></p><br><hr>
                                    <strong>Imagen de perfil: </strong><img src="" id="VerImagenUsuario" width="100px"><hr>
                                    <strong>Nombre y apellido: </strong><p id="VerNombreApellidoUsuario"></p><hr>
                                    <strong>Fecha de compra: </strong><p id="VerFechaCompra"></p><hr>
                                    <strong>Dirección de facturación: </strong><p id="VerDireccionCompra"></p><hr>
                                    <strong>Ciudad de facturación: </strong><p id="VerCiudadCompra"></p><hr>
                                    <strong>Provincia de facturación: </strong><p id="VerProvinciaCompra"></p><hr>
                                    <strong>Código postal de facturación: </strong><p id="VerCodigoPostalCompra"></p><hr>
                                </div>
                                <input type="button" id="btnCerrarDetallesCompra" value="Cerrar detalles">
                            </form>
                        </div>
                    </center>
                    <div class="page-header animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <h3 class="bars">Lista de Compras</h3>
                    </div>  
                    <div class="bs-docs-example animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms" style="height: 500px;overflow: auto;">
                        <form id="frmEliminarTarjeta">
                            <table class="table table-striped" style="margin-top: 20px; border: 1px solid lightgray;">                              
                                <tbody>
                                <thead>
                                <th>Factura Nº</th>
                                <th>Producto</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>Monto pagado</th>
                                <th>Tarjeta</th>
                                <th>Nº Tarjeta</th>
                                <th>Fecha de compra</th>
                                </thead>
                                <?php foreach ($lista_compras["datos-compras"] as $comp) { ?>
                                    <tr>
                                        <td><?php echo $comp["NumeroFactura"]; ?></td>                                                                 
                                        <td><img src="<?php echo $comp["ImagenProducto"]; ?>" width="60px"></td>                                                                 
                                        <td><?php echo $comp["NombreProducto"]; ?></td>                                                    
                                        <td><img src="<?php echo $comp["ImagenMarca"]; ?>" width="50px"></td>                                                    
                                        <td>₡ <?php echo $comp["Precio"]; ?></td>                                                    
                                        <td><?php echo $comp["Descuento"]; ?>%</td>
                                        <td> <?php
                                            $descuento = $comp["Descuento"] / 100;
                                            $rebaja = $comp["Precio"] * $descuento;
                                            $total = $comp["Precio"] - $rebaja;
                                            echo '₡ ' . $total;
                                            ?></td>
                                        <td><img src="<?php
                                            if ($comp["NombreTarjeta"] == "MasterCard") {
                                                echo "images/mastercard-logo.png";
                                            }if ($comp["NombreTarjeta"] == "Visa") {
                                                echo "images/visa-logo.png";
                                            }if ($comp["NombreTarjeta"] == "AmericanExpress") {
                                                echo "images/americanexpress-logo.png";
                                            }
                                            ?>" width="50px"></td>
                                        <td><?php echo $comp["NumeroTarjeta"]; ?></td>                                                  
                                        <td><?php echo $comp["FechaCompra"]; ?></td>                                                  
                                    </tr>
                                <?php } ?>                                   
                                </tbody>  
                                <h4>Total compras: <?php echo $lista_compras["cant-compras"]; ?></h4> 
                            </table> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

