$(function () {
    $("#btnIngresarDatosFacturacion").click(function () {
        $_form = $("#frmDatosFacturacion");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaFacturacion.php',
            data: $_form.serialize() + "&accion=IngresarFacturacion",
            success: function (data) {
                if (data) {
                    alert("Datos de facturación ingresados.");
                    location.reload();
                } else {
                    alert("Rellene los campos solicitados.");
                }
            }
        });
    });
    $("#btnActualizarDatosFacturacion").click(function () {
        $_form = $("#frmDatosFacturacion");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaFacturacion.php',
            data: $_form.serialize() + "&accion=ActualizarFacturacion",
            success: function (data) {
                if (data) {
                    alert("Datos de facturación actualizados.");
                    location.reload();
                } else {
                    alert("Datos vacios o no se realizaron cambios.");
                }
            }
        });
    });
    $("#tipoPagoPayPal").click(function () {
        document.getElementById("imgTarjeta").style.padding = '0px';
        document.getElementById("imgTarjeta").style.border = '0px solid #cc3300';
        document.getElementById("imgTarjeta").style.borderRadius = '0px';

        document.getElementById("imgPayPal").style.padding = '5px';
        document.getElementById("imgPayPal").style.border = '1px solid #cc3300';
        document.getElementById("imgPayPal").style.borderRadius = '5px';

        document.getElementById("DatosDePago").style.display = 'none';

        document.getElementById("aPayPal").style.display = 'block';
    });
    $("#tipoPagoTarjeta").click(function () {
        document.getElementById("imgPayPal").style.padding = '0px';
        document.getElementById("imgPayPal").style.border = '0px solid #cc3300';
        document.getElementById("imgPayPal").style.borderRadius = '0px';

        document.getElementById("imgTarjeta").style.padding = '5px';
        document.getElementById("imgTarjeta").style.border = '1px solid #cc3300';
        document.getElementById("imgTarjeta").style.borderRadius = '5px';

        document.getElementById("DatosDePago").style.display = 'block';

        document.getElementById("aPayPal").style.display = 'none';
    });
    $("#btnActivaFacturacion").click(function () {
        document.getElementById("divFacturacion").style.display = 'block';
    });
    $("#btnCancelarPago").click(function () {
        document.getElementById("divFacturacion").style.display = 'none';
    });

});


