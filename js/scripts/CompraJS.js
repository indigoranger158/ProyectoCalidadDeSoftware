$(function () {
    $("#btnAceptarPago").click(function () {
        $_form = $("#frmCompra");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaCompra.php',
            data: $_form.serialize() + "&accion=IngresarCompra",
            success: function (data) {
                if (data) {
                    alert("Compra realizada con exito");
                    $(".simpleCart_empty").click();
                } else {
                    alert("Compra no realizada, ingrese los datos solicitados para realizar esta compra");
                }
            }
        });
    });
    $("#btnAbrirDetallesCompra").click(function () {
        $_form = $("#frmVerCompra");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaCompra.php',
            data: $_form.serialize() + "&accion=ObtenerCompra",
            success: function (data) {
                if (data.length !== 0) {
                    /*Monto recibido*/
                    var descuento = data["Descuento"] / 100;
                    var rebaja = data["Precio"] * descuento;
                    var total = data["Precio"] - rebaja;
                    
                    var tarjeta="";
                    /*Tipo tarjeta*/
                    if(data["NombreTarjeta"]==="MasterCard"){
                        tarjeta="images/mastercard-logo.png";
                    }
                    if(data["NombreTarjeta"]==="Visa"){
                        tarjeta="images/visa-logo.png";
                    }
                    if(data["NombreTarjeta"]==="AmericanExpress"){
                        tarjeta="images/americanexpress-logo.png";
                    }

                    document.getElementById("divVerCompra").style.display = 'block';
                    document.getElementById("VerNumeroFactura").innerHTML = data["NumeroFactura"];
                    document.getElementById("VerImagenProducto").src = data["ImagenProducto"];
                    document.getElementById("VerNombreProducto").innerHTML = data["NombreProducto"];
                    document.getElementById("VerPrecioProducto").innerHTML = data["Precio"];
                    document.getElementById("VerDescuentoProducto").innerHTML = data["Precio"];
                    document.getElementById("VerMontoRecibido").innerHTML = total;
                    document.getElementById("VerImagenMarca").src = data["ImagenMarca"];
                    document.getElementById("VerTipoTarjeta").src = tarjeta;
                    document.getElementById("VerNumeroTarjeta").innerHTML = data["NumeroTarjeta"];
                    document.getElementById("VerIdUsuario").innerHTML = data["IdUsuario"];
                    document.getElementById("VerImagenUsuario").src = data["DirImagenUsuario"];
                    document.getElementById("VerNombreApellidoUsuario").innerHTML = data["NombreUsuario"]+" "+data["ApellidoUsuario"];
                    document.getElementById("VerFechaCompra").innerHTML = data["FechaCompra"];
                    document.getElementById("VerDireccionCompra").innerHTML = data["DireccionCompra"];
                    document.getElementById("VerCiudadCompra").innerHTML = data["CiudadCompra"];
                    document.getElementById("VerProvinciaCompra").innerHTML = data["ProvinciaCompra"];
                    document.getElementById("VerCodigoPostalCompra").innerHTML = data["CodigoCompra"];
                    document.getElementById("btnCerrarDetallesCompra").style.display = 'block';
                } else {
                    var id = document.getElementById("IdCompra").value;
                    alert("La factura con el id " + id + " no existe en la base de datos.");
                }
            }
        });
    });
    $("#btnCerrarDetallesCompra").click(function () {
        document.getElementById("divVerCompra").style.display = 'none';
        document.getElementById("IdCompra").value = '';
        document.getElementById("btnCerrarDetallesCompra").style.display = 'none';
    });
});

