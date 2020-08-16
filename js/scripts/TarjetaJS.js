$(function () {
    $("#btnActivaRegistrarTarjeta").click(function () {
        document.getElementById("divRegistrarTarjeta").style.display = 'block';
    });
    $("#btnCancelarRegistrarTarjeta").click(function () {
        document.getElementById("divRegistrarTarjeta").style.display = 'none';
    });
    $("#btnAceptarRegistrarTarjeta").click(function () {
        $_form = $("#frmRegistrarTarjeta");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaTarjeta.php',
            data: $_form.serialize() + "&accion=IngresarTarjeta",
            success: function (data) {
                if (data) {
                    alert("Tarjeta ingresada");
                    location.reload();
                } else {
                    alert("Tarjeta no ingresada, ingrese los datos solicitados");
                }
            }
        });
    });
    $("#btnBorrarTarjeta").click(function () {
        document.getElementById("btnAceptarBorrarTarjeta").style.display = 'block';
        document.getElementById("btnCancelarBorrarTarjeta").style.display = 'block';
        var radio = document.getElementsByClassName("IdTarjeta");
        for (var i = 0; i < radio.length; i++) {
            radio[i].style.display = 'block';
        }
        document.getElementById("btnBorrarTarjeta").disabled = 'disable';
        document.getElementById("btnBorrarTarjeta").style.background = 'grey';
    });
    $("#btnCancelarBorrarTarjeta").click(function () {
        document.getElementById("btnAceptarBorrarTarjeta").style.display = 'none';
        document.getElementById("btnCancelarBorrarTarjeta").style.display = 'none';
        var radio = document.getElementsByClassName("IdTarjeta");
        for (var i = 0; i < radio.length; i++) {
            radio[i].style.display = 'none';
            radio[i].checked = false;
        }
        document.getElementById("btnBorrarTarjeta").disabled = '';
        document.getElementById("btnBorrarTarjeta").style.background = '';
    });
    $("#btnAceptarBorrarTarjeta").click(function () {
        $_form = $("#frmEliminarTarjeta");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaTarjeta.php',
            data: $_form.serialize() + "&accion=EliminarTarjeta",
            success: function (data) {
                if (data) {
                    alert("Tarjeta eliminada");
                    location.reload();
                } else {
                    alert("Tarjeta no eliminada, seleccione la tarjeta a eliminar");
                }
            }
        });
    });

});


