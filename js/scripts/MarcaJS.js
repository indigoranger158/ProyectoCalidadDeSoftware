$(function () {
    function VerDirNuevaImagenMarca(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#nuevaImagenMarca').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function VerDirImagenMarca(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagenMarca').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    /*Visualiza la imagen de la marca*/
    $(document).on('change', '#inputImagenMarca', function () {
        VerDirImagenMarca(this);
    });
    $(document).on('change', '#inputNuevaImagenMarca', function () {
        VerDirNuevaImagenMarca(this);
    });
    $("#btnActivaIngresarMarca").click(function () {
        document.getElementById("ingresarMarca").style.padding = '20px';
        document.getElementById("ingresarMarca").style.display = 'block';
    });
    $("#btnCancelarIngresarMarca").click(function () {
        document.getElementById("ingresarMarca").style.padding = '0px';
        document.getElementById("ingresarMarca").style.display = 'none';
    });
    $("#btnActivaActualizarMarca").click(function () {
        document.getElementById("actualizarMarca").style.padding = '20px';
        document.getElementById("actualizarMarca").style.display = 'block';
    });
    $("#btnCancelarActualizarMarca").click(function () {
        document.getElementById("actualizarMarca").style.padding = '0px';
        document.getElementById("actualizarMarca").style.display = 'none';
        document.getElementById("inputNuevaImagenMarca").disabled = 'disable';
        document.getElementById("nuevaImagenMarca").style.background = '#e3e3e3';
        document.getElementById("nuevaImagenMarca").src = 'images/marcas/brand icon.png';
        document.getElementById("nuevoNombreMarca").disabled = 'disable';
        document.getElementById("nuevaInforMarca").disabled = 'disable';
        document.getElementById("btnAceptarActualizarMarca").disabled = 'disable';
        document.getElementById("btnAceptarActualizarMarca").style.background = 'grey';
        document.getElementById("idMarcaABuscar").disabled = '';
        document.getElementById("btnBuscarMarcaPorId").disabled = '';
        document.getElementById("btnBuscarMarcaPorId").style.background = '';
        document.getElementById("idMarcaABuscar").readOnly = false;
        document.getElementById("nuevoNombreMarca").value = '';
        document.getElementById("nuevaInforMarca").value = '';
        document.getElementById("idMarcaABuscar").value = '';
    });

    $("#btnAceptarIngresarMarca").click(function () {
        $_form = $("#frmIngresarMarca");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaMarca.php',
            data: $_form.serialize() + "&accion=IngresarMarca",
            success: function (data) {
                if (data) {
                    subirImagenMarca();
                } else {
                    alert("Algunos espacios se encuentran vacios. Procura llenar los datos solicitados");
                }
            }
        });
    });
    $("#btnAceptarActualizarMarca").click(function () {
        $_form = $("#frmActualizarMarca");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaMarca.php',
            data: $_form.serialize() + "&accion=ActualizarMarca",
            success: function (data) {
                if (data) {
                    actualizarImagenMarca();
                } else {
                    alert("Algunos espacios se encuentran vacios o no sufrieron cambios.");
                }
            }
        });
    });
    $("#btnBuscarMarcaPorId").click(function () {
        $_form = $("#frmActualizarMarca");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaMarca.php',
            data: $_form.serialize() + "&accion=BuscarMarcaPorId",
            success: function (data) {
                document.getElementById("inputNuevaImagenMarca").disabled = 'disable';
                document.getElementById("nuevaImagenMarca").style.background = '#e3e3e3';
                document.getElementById("nuevoNombreMarca").disabled = 'disable';
                document.getElementById("nuevaInforMarca").disabled = 'disable';
                document.getElementById("btnAceptarActualizarMarca").disabled = 'disable';
                document.getElementById("idMarcaABuscar").readOnly = true;
                document.getElementById("btnAceptarActualizarMarca").style.background = 'grey';
                document.getElementById("btnBuscarMarcaPorId").disabled = 'disable';
        document.getElementById("btnBuscarMarcaPorId").style.background = 'grey';
                if (data.length!==0) {                    
                    document.getElementById("inputNuevaImagenMarca").disabled = '';
                    document.getElementById("nuevaImagenMarca").src='images/marcas/'+data["DirImagenMarca"];
                    document.getElementById("nomNuevaImagenMarca").value=data["DirImagenMarca"];
                    document.getElementById("nuevoNombreMarca").disabled = '';
                    document.getElementById("nuevoNombreMarca").value = data["Nombre"];
                    document.getElementById("nuevaInforMarca").disabled = '';
                    document.getElementById("nuevaInforMarca").value = data["Informacion"];
                    document.getElementById("btnAceptarActualizarMarca").disabled = '';
                    document.getElementById("btnAceptarActualizarMarca").style.background = '';
                } else {
                    alert("No hay ninguna marca registrada en la base de datos con el id " + document.getElementById("idMarcaABuscar").value);
                }
            }
        });
    });

    function subirImagenMarca(e) {
        var data = new FormData(document.getElementById("frmIngresarMarca")); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: './subeImagen.php', //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (resultado) {
                alert(resultado);
                window.location = "organizarMarcas.php";
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    }
    function actualizarImagenMarca(e) {
        var data = new FormData(document.getElementById("frmActualizarMarca")); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: './subeImagen.php', //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (resultado) {
                alert(resultado);
                window.location = "organizarMarcas.php";
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    }
});



