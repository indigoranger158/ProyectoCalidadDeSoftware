<?php
/* Valida la sesion */
include './validaSesion.php';

$Id = $_SESSION["datos-usuario"]["Id"];
$Nombre = $_SESSION["datos-usuario"]["Nombre"];
$Apellido = $_SESSION["datos-usuario"]["Apellido"];
$Rol = $_SESSION["datos-usuario"]["Rol"];

/* A los usuario no administradores los devolvera al index de clientes */
if ($Rol != "Admin") {
    header("Location:index.php");
}

/* Objeto de la clase producto */
include './clases/Producto.php';
$producto = new Producto();

/* Objeto de la clase marca */
include './clases/Marca.php';
$infoMarca = new Marca();

/* Obtiene la lista de marcas: nombre y direccion de imagen */
$lista_marcas = $infoMarca->obtenerListaMarcas();
?>
<html>
    <head>
        <title>Happy PetStore | Ingresar producto</title>
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
        <!-- single -->
        <div class="single">           
            <div class="container">    
                <center><h1 class="animated wow zoomIn" data-wow-delay=".5s">Ingresa un nuevo producto a la base de datos</h1></center>
                <hr>
                <br>
                <br>
                <div class="col-md-12 single-right">                  
                    <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                        <div id="ingresarProducto">
                            <!--                            Se seleccionan las 3 imagenes que tendra el producto-->
                            <form id="frmIngresarImagenesProducto">
                                <center><p>Imagen de portada</p><label for="inputImagenPortada"><img id="imagenPortada" src="images/13836785d0bbdd53727c4fd5c107cb64.png" width="250px" class="img-responsive"/></label>
                                    <div>
                                        <p>Imagen 1</p>
                                        <label for="inputImagen1"><img id="imagen1" src="images/13836785d0bbdd53727c4fd5c107cb64.png" width="100px" class="img-responsive"/></label>
                                        <p>Imagen 2</p>
                                        <label for="inputImagen2"><img id="imagen2" src="images/13836785d0bbdd53727c4fd5c107cb64.png" width="100px" class="img-responsive"/> </label>
                                        <p style="margin-top: 20px;">Sube imagenes de 300 x 400 pixeles.</p>
                                    </div>
                                </center>                                
                                <input type="hidden" name="MAX_FILE_SIZE"  />                                 
                                <input type="file" name="inputImagenPortada" id="inputImagenPortada" accept="image/png, .jpeg, .jpg, image/gif" onchange="document.getElementById('nomImagenPortadaProducto').value = document.getElementById('inputImagenPortada').files[0].name"/>
                                <br>
                                <input type="hidden" name="MAX_FILE_SIZE"  />
                                <input type="file" name="inputImagen1" id="inputImagen1" accept="image/png, .jpeg, .jpg, image/gif" onchange="document.getElementById('nomImagen1Producto').value = document.getElementById('inputImagen1').files[0].name"/>
                                <br>
                                <input type="hidden" name="MAX_FILE_SIZE"  />                               
                                <input type="hidden" name="accion" value="SubirImagenesProducto">
                                <input type="file" name="inputImagen2" id="inputImagen2" accept="image/png, .jpeg, .jpg, image/gif" onchange="document.getElementById('nomImagen2Producto').value = document.getElementById('inputImagen2').files[0].name"/>
                                <br>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
                        <!--                        Se ingresan los datos solicitados para poder ingresar un nuevo producto a la base de datos-->
                        <form id="frmIngresarProducto">
                            <div id="ingresarProducto">
                                <!--                                se almacena el nombre de la imagen de portada-->
                                <input type="hidden" id="nomImagenPortadaProducto" name="nomImagenPortadaProducto" value="">
                                <!--                                se almacena el nombre de la imagen 1-->
                                <input type="hidden" id="nomImagen1Producto" name="nomImagen1Producto" value="">
                                <!--                                se almacena el nombre de la imagen 2-->
                                <input type="hidden" id="nomImagen2Producto" name="nomImagen2Producto" value="">
                                <!--                                    Nombre-->
                                <p style="font-size: 22;">Nombre del producto: </p>
                                <input type="text" name="Nombre" placeholder="Ingrese el nombre del producto" maxlength="32" style="font-size: 22">
                                <br>
                                <!--                                    Precio-->
                                <p style="font-size: 18;">Precio del producto: </p>
                                <input type="number" name="Precio" id="Precio" maxlength="5" style="font-size: 18;color: #cc3300;">
                                <br>
                                <!--                                    Descuento-->
                                <p style="font-size: 18;">Descuento: </p>
                                <input type="number" id="Descuento" name="Descuento" maxlength="5" style="font-size: 18;"><a id="totalDescuento" style="font-size: 18;color: #999999;"></a>
                                <br>
                                <div class="description">
                                    <!--                                    DescripcionG-->
                                    <p>Descripcion del producto:</p>
                                    <textarea name="DescripcionG" required=""></textarea>
                                    <!--                                    DescripcionP-->
                                    <p>Descripcion breve:</p><small style="font-size: 12;color: #cc3300;">Breve descripcion del artículo, de no mas de 24 caractéres</small>
                                    <input type="text" name="DescripcionP" maxlength="24">
                                </div>
                                <hr>
                                <!--                                    Cantidad-->
                                <p>Cantidad: </p>
                                <input type="number" name="Cantidad" maxlength="3" style="font-size: 16;color: #999999;"> 
                                <hr>
                                <div class="occasional">
                                    <!--                                    Colores-->
                                    <div class="color-quality-left">
                                        <h5>Color/es : </h5>
                                        <ul>
                                            <li><a><span style="background: #ffffff"></span><input type="checkbox" name="Blanco" value="Blanco"> Blanco</a></li>
                                            <li><a><span style="background: red"></span><input type="checkbox" name="Rojo" value="Rojo"> Rojo</a></li>
                                            <li><a><span style="background: blue"></span><input type="checkbox" name="Azul" value="Azul"> Azul</a></li>
                                            <li><a><span style="background: grey"></span><input type="checkbox" name="Gris" value="Gris"> Gris</a></li>
                                            <li><a><span style="background: green"></span><input type="checkbox" name="Verde" value="Verde"> Verde</a></li>
                                            <li><a><span style="background: yellow"></span><input type="checkbox" name="Amarillo" value="Amarillo"> Amarillo</a></li>
                                            <li><a><span style="background: pink"></span><input type="checkbox" name="Rosa" value="Rosa"> Rosa</a></li>
                                            <li><a><span style="background: lightblue"></span><input type="checkbox" name="Celeste" value="Celeste"> Celeste</a></li>
                                            <li><a><span style="background: #990099"></span><input type="checkbox" name="Morado" value="Morado"> Morado</a></li>
                                            <li><a><span style="background: brown"></span><input type="checkbox" name="Cafe" value="Cafe"> Café</a></li>
                                            <li><a><span style="background: black"></span><input type="checkbox" name="Negro" value="Negro"> Negro</a></li>
                                        </ul>
                                        <hr>
                                        <!--                                    Tallas-->
                                        <h5>Tallas : </h5>
                                        <div class="colr ert">
                                            <input type="checkbox" name="XXS" value="XXS" style="margin-left: 15px"> XXS                                            
                                            <input type="checkbox" name="XS" value="XS" style="margin-left: 15px"> XS                                           
                                            <input type="checkbox" name="S" value="S" style="margin-left: 15px"> S                                          
                                            <input type="checkbox" name="M" value="M" style="margin-left: 15px"> M                                            
                                            <input type="checkbox" name="L" value="L" style="margin-left: 15px"> L                                        
                                            <input type="checkbox" name="XL" value="XL" style="margin-left: 15px"> XL                                       
                                            <input type="checkbox" name="XXL" value="XXL"style="margin-left: 15px"> XXL                                           
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="description">
                                    <p>Información: </p>
                                    <textarea name="Informacion"></textarea>
                                </div>
                                <hr>
                                <!--                                Tipo de producto-->
                                <p>Tipo de producto</p>
                                <select id="TipoProducto" name="TipoProducto">
                                    <option>Ropa</option>
                                    <option>Accesorio</option>
                                </select>
                                <hr>
                                <!--                                Tipo de genero-->
                                <p>Genero de la mascota a la que va destinado el producto</p>
                                <select id="Genero" name="Genero">
                                    <option>Macho</option>
                                    <option>Hembra</option>
                                </select>
                                <hr>
                                <!--                                Subtipo de producto-->
                                <p id="tituloSubTipoProducto">Tipo de Ropa</p>
                                <select name="SubTipoProducto" id="SubTipoProducto">
                                    <option>Camiseta</option>
                                    <option>Camisa</option> 
                                    <option>Overol</option>
                                    <option>Pijama</option>
                                    <option>Abrigo</option>
                                </select> 
                                <hr>
                                <!--                                Marca-->
                                <p>Marca</p>
                                <?php if ($lista_marcas["valido"] == true) { ?>
                                    <select name="Marca" id="selectMarca">
                                        <?php foreach ($lista_marcas["datos-marcas"] as $marca) { ?>
                                            <option id="<?php echo $marca["Dir_Imagen"]; ?>" value="<?php echo $marca["Dir_Imagen"]; ?>"><?php echo $marca["Id_Marca"]; ?> - <?php echo $marca["nombreMarca"]; ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                                <img id="imgMarca" src="images/marcas/icon-Happy PetShop.png" width="40px" height="40px">                               
                                <br>
                                <br>
                                <input type="hidden" id="nombreMarca" name="nombreMarca" value="1 - Happy PetShop">
                                <input type="button" id="btnIngresarProducto" value="Ingresar producto"> 
                            </div>                                                  
                        </form>
                        <div class="clearfix"> </div>
                        <div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //single -->
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

