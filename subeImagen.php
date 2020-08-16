<?php

$datos = $_POST;


$accion = $datos["accion"];
if (isset($_FILES['file']['name'])) {
    $targetdir = './images/usuarios/';
    // Directorio donde la imagen se subira
    if ($accion == "SubirImagenUsuario") {
        $targetfile = $targetdir . $_FILES['file']['name'];

        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
            // file uploaded succeeded
            echo "Usuario creado con éxito";
        } else {
            // file upload failed
            echo "Usuario creado con éxito";
        }
    }
    if ($accion == "CambiarImagenUsuario") {
        $targetfile = $targetdir.$datos["nomNuevaImagenUsuario"];
        if($datos["DirImagenAntigua"]!="images/usuarios/user-iconpredeterminado.jpg"){
            unlink("./".$datos["DirImagenAntigua"]);
        }       
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
            echo "Imagen cambiada";
            // file uploaded succeeded
        } else {
            // file upload failed
        }
    }
}
if(isset($_FILES['inputImagenPortada']['name'])){
    $targetdir = './images/productos/';
    // Directorio donde la imagen se subira
    if ($accion == "SubirImagenesProducto") {
        $targetfile1 = $targetdir . $_FILES['inputImagenPortada']['name'];
        $targetfile2 = $targetdir . $_FILES['inputImagen1']['name'];
        $targetfile3 = $targetdir . $_FILES['inputImagen2']['name'];
        
        move_uploaded_file($_FILES['inputImagenPortada']['tmp_name'], $targetfile1);
        move_uploaded_file($_FILES['inputImagen1']['tmp_name'],$targetfile2);
        move_uploaded_file($_FILES['inputImagen2']['tmp_name'], $targetfile3) ;
        
        echo "Producto ingresado con exito a la base de datos.";    
    }  
}
if(isset($_FILES['inputImagenMarca']['name'])){
    $targetdir = './images/marcas/';
    if ($accion == "SubirImagenMarca") {
        $targetfile = $targetdir . $_FILES['inputImagenMarca']['name'];
        move_uploaded_file($_FILES['inputImagenMarca']['tmp_name'], $targetfile);

        
        echo "Marca ingresada con exito a la base de datos.";
    }
}
if(isset($_FILES['inputNuevaImagenMarca']['name'])){
    $targetdir = './images/marcas/';
    if ($accion == "ActualizarImagenMarca") {
        $targetfile = $targetdir . $datos["nomNuevaImagenMarca"];
        move_uploaded_file($_FILES['inputNuevaImagenMarca']['tmp_name'], $targetfile);

        
        echo "Marca actualiza con exito a la base de datos.";
    }
}
?>

