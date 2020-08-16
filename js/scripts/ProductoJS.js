$(function () {
    $("#btnFiltrarProductos").click(function () {
        $_form = $("#frmFiltrarProductos");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: $_form.serialize() + "&accion=FiltrarProductos",
            success: function (data) {
                /*Ropa*/
                document.getElementById("spanRopa").innerHTML = "(" + data["Cant_Ropa"] + ")";
                document.getElementById("aRopa").href = "products.php?tipoProducto=Ropa&genero=null&tipo=null&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa macho*/
                document.getElementById("spanRopaPerro").innerHTML = "(" + data["Cant_Ropa_Macho"] + ")";
                document.getElementById("aRopaPerro").href = "products.php?tipoProducto=Ropa&genero=Macho&tipo=null&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa macho: camisetas*/
                document.getElementById("spanCamisetasPerro").innerHTML = "(" + data["Cant_Ropa_Macho_Camisetas"] + ")";
                document.getElementById("aRopaPerroCamisetas").href = "products.php?tipoProducto=Ropa&genero=Macho&tipo=Camiseta&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa macho: camisas*/
                document.getElementById("spanCamisasPerro").innerHTML = "(" + data["Cant_Ropa_Macho_Camisas"] + ")";
                document.getElementById("aRopaPerroCamisas").href = "products.php?tipoProducto=Ropa&genero=Macho&tipo=Camisa&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa macho: overoles*/
                document.getElementById("spanOverolesPerro").innerHTML = "(" + data["Cant_Ropa_Macho_Overoles"] + ")";
                document.getElementById("aRopaPerroOveroles").href = "products.php?tipoProducto=Ropa&genero=Macho&tipo=Overol&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa macho: pijamas*/
                document.getElementById("spanPijamasPerro").innerHTML = "(" + data["Cant_Ropa_Macho_Pijamas"] + ")";
                document.getElementById("aRopaPerroPijamas").href = "products.php?tipoProducto=Ropa&genero=Macho&tipo=Pijama&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa macho: abrigos*/
                document.getElementById("spanAbrigosPerro").innerHTML = "(" + data["Cant_Ropa_Macho_Abrigos"] + ")";
                document.getElementById("aRopaPerroAbrigos").href = "products.php?tipoProducto=Ropa&genero=Macho&tipo=Abrigo&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";

                /*Ropa hembra*/
                document.getElementById("spanRopaPerra").innerHTML = "(" + data["Cant_Ropa_Hembra"] + ")";
                document.getElementById("aRopaPerra").href = "products.php?tipoProducto=Ropa&genero=Hembra&tipo=null&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa hembra: vestidos*/
                document.getElementById("spanVestidosPerra").innerHTML = "(" + data["Cant_Ropa_Hembra_Vestidos"] + ")";
                document.getElementById("aRopaPerraVestidos").href = "products.php?tipoProducto=Ropa&genero=Hembra&tipo=Vestido&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa hembra: blusas*/
                document.getElementById("spanBlusasPerra").innerHTML = "(" + data["Cant_Ropa_Hembra_Blusas"] + ")";
                document.getElementById("aRopaPerraBlusas").href = "products.php?tipoProducto=Ropa&genero=Hembra&tipo=Blusas&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa hembra: overoles*/
                document.getElementById("spanOverolesPerra").innerHTML = "(" + data["Cant_Ropa_Hembra_Overoles"] + ")";
                document.getElementById("aRopaPerraOveroles").href = "products.php?tipoProducto=Ropa&genero=Hembra&tipo=Overol&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa hembra: enaguas*/
                document.getElementById("spanEnaguasPerra").innerHTML = "(" + data["Cant_Ropa_Hembra_Enaguas"] + ")";
                document.getElementById("aRopaPerraEnaguas").href = "products.php?tipoProducto=Ropa&genero=Hembra&tipo=Enagua&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa hembra: pijamas*/
                document.getElementById("spanPijamasPerra").innerHTML = "(" + data["Cant_Ropa_Hembra_Pijamas"] + ")";
                document.getElementById("aRopaPerraPijamas").href = "products.php?tipoProducto=Ropa&genero=Hembra&tipo=Pijama&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Ropa hembra: abrigos*/
                document.getElementById("spanAbrigosPerra").innerHTML = "(" + data["Cant_Ropa_Hembra_Abrigos"] + ")";
                document.getElementById("aRopaPerraAbrigos").href = "products.php?tipoProducto=Ropa&genero=Hembra&tipo=Abrigo&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";

                /*Accesorio*/
                document.getElementById("spanAccesorio").innerHTML = "(" + data["Cant_Accesorio"] + ")";
                document.getElementById("aAccesorio").href = "products.php?tipoProducto=Accesorio&genero=null&tipo=null&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Accesorio macho*/
                document.getElementById("spanAccesorioPerro").innerHTML = "(" + data["Cant_Accesorio_Macho"] + ")";
                document.getElementById("aAccesorioPerro").href = "products.php?tipoProducto=Accesorio&genero=Macho&tipo=null&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Accesorio macho: collares*/
                document.getElementById("spanCollaresPerro").innerHTML = "(" + data["Cant_Accesorio_Macho_Collares"] + ")";
                document.getElementById("aAccesorioPerroCollares").href = "products.php?tipoProducto=Accesorio&genero=Macho&tipo=Collar&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Accesorio macho: Gorras*/
                document.getElementById("spanGorrasPerro").innerHTML = "(" + data["Cant_Accesorio_Macho_Gorras"] + ")";
                document.getElementById("aAccesorioPerroGorras").href = "products.php?tipoProducto=Accesorio&genero=Macho&tipo=Gorra&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";

                /*Accesorio hembra*/
                document.getElementById("spanAccesorioPerra").innerHTML = "(" + data["Cant_Accesorio_Hembra"] + ")";
                document.getElementById("aAccesorioPerra").href = "products.php?tipoProducto=Accesorio&genero=Hembra&tipo=null&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Accesorio hembra: collares*/
                document.getElementById("spanCollaresPerra").innerHTML = "(" + data["Cant_Accesorio_Hembra_Collares"] + ")";
                document.getElementById("aAccesorioPerraCollares").href = "products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Collar&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
                /*Accesorio hembra: Gorras*/
                document.getElementById("spanGorrasPerra").innerHTML = "(" + data["Cant_Accesorio_Hembra_Gorras"] + ")";
                document.getElementById("aAccesorioPerraGorras").href = "products.php?tipoProducto=Accesorio&genero=Hembra&tipo=Gorra&montoMin=" + data["MontoMin"] + "&montoMax=" + data["MontoMax"] + "&descuento=0&pagina=0";
            }
        });
    });
    /*Realiza un comentario por parte del usuario a un producto*/
    $("#btnComentar").click(function () {
        $_form = $("#frmComentar");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: $_form.serialize() + "&accion=Comentar",
            success: function (data) {
                document.getElementById("alerta_comentario").style.opacity = '0';
                if (data) {
                    document.getElementById("frmComentar").style.opacity = '0';
                    document.getElementById("tituloComentar").innerHTML = 'Gracias por comentar nuestro producto';
                } else {
                    document.getElementById("alerta_comentario").style.opacity = '1';
                }
            }
        });
    });
    $("#btnBuscar").click(function () {
        window.location = "products.php?tipoProducto=" + document.getElementById("search").value + "&genero=null&tipo=null&montoMin=0&montoMax=0&descuento=0&pagina=0";
    });

    function VerDirImagenPortada(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagenPortada').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    /*Visualiza la imagen de portada del producto*/
    $(document).on('change', '#inputImagenPortada', function () {
        VerDirImagenPortada(this);
    });

    function VerDirImagen1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagen1').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    /*Visualiza la imagen de portada del producto*/
    $(document).on('change', '#inputImagen1', function () {
        VerDirImagen1(this);
    });

    function VerDirImagen2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagen2').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    /*Visualiza la imagen de portada del producto*/
    $(document).on('change', '#inputImagen2', function () {
        VerDirImagen2(this);
    });

    $("#Descuento").on('change', function () {
        var precio = document.getElementById("Precio").value;
        var descuento = document.getElementById("Descuento").value;
        var nDescuento = descuento / 100;
        var nPrecio = precio * nDescuento;
        var total = precio - nPrecio;

        document.getElementById("totalDescuento").innerHTML = "Precio con " + descuento + " % de descuento = ₡ " + total;
    });
    $("#Precio").on('change', function () {
        var precio = document.getElementById("Precio").value;
        var descuento = document.getElementById("Descuento").value;
        var nDescuento = descuento / 100;
        var nPrecio = precio * nDescuento;
        var total = precio - nPrecio;

        document.getElementById("totalDescuento").innerHTML = "Precio con " + descuento + " % de descuento = ₡ " + total;
    });
    $("#selectMarca").on('change', function () {
        var varUno = document.getElementById("selectMarca").value;
        var varDos = document.getElementById("" + varUno + "").innerHTML;

        document.getElementById("imgMarca").src = varUno;
        document.getElementById("nombreMarca").value = varDos;

    });

    $("#Genero").on('change', function () {
        var tipoProducto = document.getElementById("TipoProducto").value;
        var generoProducto = document.getElementById("Genero").value;
        if (tipoProducto === "Ropa") {
            if (generoProducto === "Macho") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Camiseta</option>' +
                        '<option>Camisa</option>' +
                        '<option>Overol</option>' +
                        '<option>Pijama</option>' +
                        '<option>Abrigo</option>';
            }
            if (generoProducto === "Hembra") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Vestido</option>' +
                        '<option>Blusa</option>' +
                        '<option>Overol</option>' +
                        '<option>Pijama</option>' +
                        '<option>Enagua</option>' +
                        '<option>Abrigo</option>';
            }
        }
        if (tipoProducto === "Accesorio") {
            if (generoProducto === "Macho") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Collar</option>' +
                        '<option>Gorra</option>';
            }
            if (generoProducto === "Hembra") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Collar</option>' +
                        '<option>Gorra</option>';
            }
        }
    });
    $("#TipoProducto").on('change', function () {
        var tipoProducto = document.getElementById("TipoProducto").value;
        var generoProducto = document.getElementById("Genero").value;
        if (tipoProducto === "Ropa") {
            document.getElementById("tituloSubTipoProducto").innerHTML = 'Tipo de accesorio';
            if (generoProducto === "Macho") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Camiseta</option>' +
                        '<option>Camisa</option>' +
                        '<option>Overol</option>' +
                        '<option>Pijama</option>' +
                        '<option>Abrigo</option>';
            }
            if (generoProducto === "Hembra") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Vestido</option>' +
                        '<option>Blusa</option>' +
                        '<option>Overol</option>' +
                        '<option>Pijama</option>' +
                        '<option>Enagua</option>' +
                        '<option>Abrigo</option>';
            }
        }
        if (tipoProducto === "Accesorio") {
            if (generoProducto === "Macho") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Collar</option>' +
                        '<option>Gorra</option>';
            }
            if (generoProducto === "Hembra") {
                document.getElementById("SubTipoProducto").innerHTML = '<option>Collar</option>' +
                        '<option>Gorra</option>';
            }
        }
    });
    $("#btnIngresarProducto").click(function () {
        $_form = $("#frmIngresarProducto");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: $_form.serialize() + "&accion=IngresarAlInventario",
            success: function (data) {
                if (data) {
                    subirImagenProducto();
                } else {
                    alert("Imposible ingresar el producto a la base de datos si existen datos vacios.");
                }
            }
        });
    });
    function subirImagenProducto(e) {
        var data = new FormData(document.getElementById("frmIngresarImagenesProducto")); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: './subeImagen.php', //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (resultado) {
                alert(resultado);
                window.location = "index.php";
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    }
    $("#btnAceptarEliminarProducto").click(function () {
        $_form = $("#frmEliminarProducto");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: $_form.serialize() + "&accion=EliminarProductoPorId",
            success: function (data) {
                if (data) {
                    alert("Producto eliminado con exito");
                    window.location = "eliminarProducto.php";
                } else {
                    var Id = document.getElementById("IdProductoAEliminar").value;
                    alert("Id vacio o el producto con el id " + Id + " no existe en la base de datos.");
                }
            }
        });
    });
    $("#btnProductoAEliminar").click(function () {
        $_form = $("#frmEliminarProducto");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: $_form.serialize() + "&accion=ComprobarEliminarProductoPorId",
            success: function (data) {
                if (data.length !== 0) {
                    document.getElementById("divConfirmacion").style.padding = '50px';
                    document.getElementById("divConfirmacion").style.opacity = '1';
                    document.getElementById("divConfirmacion").style.display = 'block';
                    document.getElementById("imagenProductoAEliminar").src = data["DirImagenPortada"];
                    document.getElementById("nombreProductoAEliminar").innerHTML = data["Nombre"];
                    document.getElementById("IdProductoAEliminar").readOnly = true;

                } else {
                    var Id = document.getElementById("IdProductoAEliminar").value;
                    alert("Id vacio o el producto con el id " + Id + " no existe en la base de datos.");
                }
            }
        });
    });

    $("#btnCancelarEliminarProducto").click(function () {
        document.getElementById("divConfirmacion").style.padding = '0px';
        document.getElementById("divConfirmacion").style.opacity = '0';
        document.getElementById("divConfirmacion").style.display = 'none';
        document.getElementById("IdProductoAEliminar").value = '';
        document.getElementById("IdProductoAEliminar").readOnly = false;
    });
    $("#btnBuscarProductoAActualizarDescuento").click(function () {
        $_form = $("#frmActualizarDescuentoProducto");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: $_form.serialize() + "&accion=BuscarProductoAActualizarDescuento",
            success: function (data) {
                if (data.length !== 0) {
                    document.getElementById("imagenProducto").src = data["DirImagenPortada"];
                    document.getElementById("nombreProducto").value = data["Nombre"];
                    document.getElementById("descuentoProducto").value = data["Descuento"];
                    document.getElementById("precioProducto").value = data["Precio"];
                    document.getElementById("nuevoDescuentoProducto").disabled = '';
                    document.getElementById("nuevoPrecioProducto").disabled = '';
                    document.getElementById("idProductoAActualizarDescuento").readOnly = true;
                    document.getElementById("aceptarActualizarDescuento").disabled = '';
                    document.getElementById("aceptarActualizarDescuento").style.background = '';
                    document.getElementById("cancelarActualizarDescuento").style.background = '';
                    document.getElementById("cancelarActualizarDescuento").disabled = '';
                    document.getElementById("btnBuscarProductoAActualizarDescuento").disabled = '';
                    document.getElementById("btnBuscarProductoAActualizarDescuento").style.background = 'grey';
                } else {
                    alert("Ingrese un Id para buscar el producto que desea actualizar");
                }
            }
        });
    });
    $("#aceptarActualizarDescuento").click(function () {
        $_form = $("#frmActualizarDescuentoProducto");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: $_form.serialize() + "&accion=ActualizarDescuentoProducto",
            success: function (data) {
                if (data) {
                    alert("Producto actualizado con el nuevo precio y descuento");
                    window.location = "actualizarProducto.php"
                } else {
                    alert("Producto no actualizado, ingrese los datos solicitados.");
                }
            }
        });
    });
    $("#cancelarActualizarDescuento").click(function () {
        document.getElementById("imagenProducto").src = 'images/13836785d0bbdd53727c4fd5c107cb64.png';
        document.getElementById("nombreProducto").value = '';
        document.getElementById("descuentoProducto").value = '';
        document.getElementById("precioProducto").value = '';
        document.getElementById("nuevoDescuentoProducto").disabled = 'disable';
        document.getElementById("nuevoDescuentoProducto").value = '';
        document.getElementById("nuevoPrecioProducto").disabled = 'disable';
        document.getElementById("nuevoPrecioProducto").value = '';
        document.getElementById("totalNuevoDescuento").innerHTML = '';
        document.getElementById("idProductoAActualizarDescuento").readOnly = false;
        document.getElementById("btnBuscarProductoAActualizarDescuento").style.background = '';
        document.getElementById("btnBuscarProductoAActualizarDescuento").disable = '';
        document.getElementById("aceptarActualizarDescuento").disabled = 'disable';
        document.getElementById("aceptarActualizarDescuento").style.background = 'grey';
        document.getElementById("cancelarActualizarDescuento").disabled = 'disable';
        document.getElementById("cancelarActualizarDescuento").style.background = 'grey';
    });
    $("#nuevoDescuentoProducto").on('change', function () {
        var precio = document.getElementById("nuevoPrecioProducto").value;
        var descuento = document.getElementById("nuevoDescuentoProducto").value;
        var nDescuento = descuento / 100;
        var nPrecio = precio * nDescuento;
        var total = precio - nPrecio;

        document.getElementById("totalNuevoDescuento").innerHTML = "Precio con " + descuento + " % de descuento = ₡ " + total;
    });

    /*Obtiene el valor del Id del producto seleccionado y lo intreduce al carrito*/
    $(".item_add").click(function () {
        var p = $(this).closest(".ProdId");
        var Id = $(p).children("input");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: 'accion=IngresarProductoAlCarrito&Id=' + Id.val(),
            success: function (data) {
                if (!data) {
                    alert("El producto ya esta en carro de compras.");
                }
            }
        });
    });

    /*Vacia el carrito de compras*/
    $(".simpleCart_empty").click(function () {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: 'accion=VaciarCarrito',
            success: function (data) {
                location.reload();
            }

        });
    });

    /*Elimina un producto del carrito*/
    $(".close1").click(function () {
        var p = $(this).closest(".rem");
        var Id = $(p).children("input");
        var pos = $(p).children("#posicionProductoEliminarLista");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaProducto.php',
            data: 'accion=EliminarProductoDelCarrito&Id=' + Id.val() + '&posicion=' + pos.val(),
            success: function (data) {
                if (!data) {
                    $(".simpleCart_empty").click();
                } else {
                    location.reload();
                }

            }
        });
    });
});


