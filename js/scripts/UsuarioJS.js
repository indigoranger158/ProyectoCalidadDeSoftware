/*Script que manipula las acciones del usuario*/
$(function () {
    /*Realiza el registro de usuario a la base de datos y ademas informa de errores en el formulario de registro*/
    $("#btnRegistro").click(function () {
        $_form = $("#frmRegistro");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=Registrarse",

            success: function (data) {

                /*Inicializa las alertas del formulario cada vez que se ingresa a la funcion de btnRegistro*/
                document.getElementById("small_alerta_registro").style.opacity = '0';
                document.getElementById("small_alerta_Nombre").style.opacity = '0';
                document.getElementById("small_alerta_Apellido").style.opacity = '0';
                document.getElementById("small_alerta_Email").style.opacity = '0';
                document.getElementById("small_alerta_Contrasena").style.opacity = '0';
                document.getElementById("small_alerta_ConfContrasena").style.opacity = '0';
                document.getElementById("small_alerta_Terminos").style.opacity = '0';
                /*Analiza el array de errores y activa los small con las alertas en el formulario*/
                for (var i = 0; i < data.length; i += 1) {

                    if (data[i] === "0") {
                        document.getElementById("small_alerta_registro").style.opacity = '1';
                    }
                    if (data[i] === "1") {
                        document.getElementById("small_alerta_Nombre").style.opacity = '1';
                    }
                    if (data[i] === "2") {
                        document.getElementById("small_alerta_Apellido").style.opacity = '1';
                    }
                    if (data[i] === "3") {
                        document.getElementById("small_alerta_Email").style.opacity = '1';
                    }
                    if (data[i] === "4") {
                        document.getElementById("small_alerta_Contrasena").style.opacity = '1';
                    }
                    if (data[i] === "5") {
                        document.getElementById("small_alerta_ConfContrasena").style.opacity = '1';
                    }
                    if (data[i] === "6") {
                        document.getElementById("small_alerta_Terminos").style.opacity = '1';
                    }
                    if (data[i] === "7") {
                        subirImagen();

                    }
                }
            }
        });
    });
    /*Realiza el inicio de sesion del usuario y ademas informa de errores en el formulario de inicio de sesion*/
    $("#btnInicio").click(function () {
        $_form = $("#frmInicio");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=IniciarSesion",
            success: function (data) {
                /*Inicializa las alertas del formulario cada vez que se ingresa a la funcion de btnInicio*/
                document.getElementById("small_alerta_inicio").style.opacity = '0';
                document.getElementById("small_alerta_inicioEmail").style.opacity = '0';
                document.getElementById("small_alerta_inicioContrasena").style.opacity = '0';
                /*Analiza el array de errores y activa los small con las alertas en el inicio*/
                for (var i = 0; i < data.length; i += 1) {

                    switch (data[i]) {
                        case "0":
                            document.getElementById("small_alerta_inicio").style.opacity = '1';
                            break;
                        case "1":
                            document.getElementById("small_alerta_inicioEmail").style.opacity = '1';
                            break;
                        case "2":
                            document.getElementById("small_alerta_inicioContrasena").style.opacity = '1';
                            break;
                        case "3":
                            window.location = "user-index.php";
                            break;
                        case "4":
                            alert("Contraseña incorrecta o el correo introducido no se encuentra registrado en el sistema");
                            break;
                    }
                }
            }
        });
    });
    /*Realiza el cierre de sesion*/
    $("#btnCerrarSesion").click(function () {
        $_form = $("#frmCerrarSesion");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=CerrarSesion",
            success: function (data) {
                window.location = "index.php";
            }
        });
    });
    $("#btnActualizarNombre").click(function () {
        $_form = $("#frmDatosPerfil");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=ActualizarNombre",
            success: function (data) {
                if (data) {
                    alert("Nombre actualizado")
                    window.location = "miPerfil.php";
                } else {
                    alert("Dato vacio");
                }

            }
        });
    });
    $("#btnActualizarApellido").click(function () {
        $_form = $("#frmDatosPerfil");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=ActualizarApellido",
            success: function (data) {
                if (data) {
                    alert("Apellido actualizado")
                    window.location = "miPerfil.php";
                } else {
                    alert("Dato vacio");
                }

            }
        });
    });
    $("#btnActualizarCorreo").click(function () {
        $_form = $("#frmDatosPerfil");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=ActualizarCorreo",
            success: function (data) {
                if (data) {
                    alert("Correo actualizado")
                    window.location = "miPerfil.php";
                } else {
                    alert("Dato vacio o formato incorrecto");
                }

            }
        });
    });
    $("#btnActualizarContrasena").click(function () {
        $_form = $("#frmDatosPerfil");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=ActualizarContrasena",
            success: function (data) {
                if (data) {
                    alert("Contraseña actualizada")
                    window.location = "miPerfil.php";
                } else {
                    alert("La contraseña no coincide o los datos estan vacios");
                }

            }
        });
    });
    $("#btnCambiarImagenUsuario").click(function () {
        $_form = $("#frmCambiarImagenUsuario");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=ActualizarImagenUsuario",
            success: function (data) {
                if (data) {
                    cambiarImagenUsuario();
                    window.location = "miPerfil.php";
                }
            }
        });
    });
    /*Visualiza la imagen del input file*/
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    /*Verifica el input file y activa la funcion readURL*/
    $(document).on('change', '#file', function () {
        readURL(this);
    });

    /*Sube la imagen seleccionada por el usuario y la sube al carpeta del proyecto*/
    function subirImagen(e) {
        var data = new FormData(document.getElementById("frmSubirImagenUsuario")); //Creamos los datos a enviar con el formulario
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
    function cambiarImagenUsuario(e) {
        var data = new FormData(document.getElementById("frmCambiarImagenUsuario")); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: './subeImagen.php', //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (resultado) {
                alert(resultado);
                window.location = "miPerfil.php"
            }
        });

        e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    }

    $("#editarNombre").on('click', function () {
        if (document.getElementById("nuevoNombre").style.display === 'none') {
            document.getElementById("nuevoNombre").style.display = '';
            document.getElementById("btnActualizarNombre").style.display = '';
        } else {
            document.getElementById("nuevoNombre").style.display = 'none';
            document.getElementById("btnActualizarNombre").style.display = 'none';
        }
    });
    $("#editarApellido").on('click', function () {
        if (document.getElementById("nuevoApellido").style.display === 'none') {
            document.getElementById("nuevoApellido").style.display = '';
            document.getElementById("btnActualizarApellido").style.display = '';
        } else {
            document.getElementById("nuevoApellido").style.display = 'none';
            document.getElementById("btnActualizarApellido").style.display = 'none';
        }
    });
    $("#editarCorreo").on('click', function () {
        if (document.getElementById("nuevoCorreo").style.display === 'none') {
            document.getElementById("nuevoCorreo").style.display = '';
            document.getElementById("btnActualizarCorreo").style.display = '';
        } else {
            document.getElementById("nuevoCorreo").style.display = 'none';
            document.getElementById("btnActualizarCorreo").style.display = 'none';
        }
    });
    $("#editarContrasena").on('click', function () {
        if (document.getElementById("nuevaContrasena").style.display === 'none') {
            document.getElementById("antiguaContrasena").style.display = '';
            document.getElementById("nuevaContrasena").style.display = '';
            document.getElementById("btnActualizarContrasena").style.display = '';
        } else {
            document.getElementById("nuevaContrasena").style.display = 'none';
            document.getElementById("antiguaContrasena").style.display = 'none';
            document.getElementById("btnActualizarContrasena").style.display = 'none';
        }
    });
    /*Eliminar usuario*/
    $("#btnAceptarEliminarUsuario").click(function () {
        $_form = $("#frmEliminarUsuario");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=EliminarUsuarioPorId",
            success: function (data) {
                if (data) {
                    alert("Usuario eliminado con exito");
                    window.location = "eliminarUsuario.php";
                } else {
                    var Id = document.getElementById("IdUsuarioAEliminar").value;
                    alert("Id vacio o el usuario con el id " + Id + " no existe en la base de datos.");
                }
            }
        });
    });
    $("#btnUsuarioAEliminar").click(function () {
        $_form = $("#frmEliminarUsuario");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './controlaUsuario.php',
            data: $_form.serialize() + "&accion=ComprobarEliminarUsuarioPorId",
            success: function (data) {
                if (data.length !== 0) {
                    document.getElementById("divConfirmacionEliminarUsuario").style.padding = '50px';
                    document.getElementById("divConfirmacionEliminarUsuario").style.opacity = '1';
                    document.getElementById("divConfirmacionEliminarUsuario").style.display = 'block';
                    document.getElementById("imagenUsuarioAEliminar").src = data["DirImagenPerfil"];
                    document.getElementById("nombreUsuarioAEliminar").innerHTML = data["Nombre"] + " " + data["Apellido"];
                    document.getElementById("emailUsuarioAEliminar").innerHTML = data["Email"];
                    document.getElementById("IdUsuarioAEliminar").readOnly = true;
                    document.getElementById("imagenPerfilUsuario").value = data["DirImagenPerfil"];
                } else {
                    var Id = document.getElementById("IdUsuarioAEliminar").value;
                    alert("Id vacio o el usuario con el id " + Id + " no existe en la base de datos.");
                }
            }
        });
    });

    $("#btnCancelarEliminarUsuario").click(function () {
        document.getElementById("divConfirmacionEliminarUsuario").style.padding = '0px';
        document.getElementById("divConfirmacionEliminarUsuario").style.opacity = '0';
        document.getElementById("divConfirmacionEliminarUsuario").style.display = 'none';
        document.getElementById("IdUsuarioAEliminar").value = '';
        document.getElementById("IdUsuarioAEliminar").readOnly = false;
    });

});


