<?php
class Comentario extends Producto{
    private $Id;
    private $Id_Producto;
    private $Id_Usuario;
    private $Calificacion;
    private $Comentario;
    
    function Comentario() {
        $this->Id = 0;
        $this->Id_Producto = 0;
        $this->Id_Usuario = 0;
        $this->Calificacion = 0;
        $this->Comentario = "";
    }
    function getId() {
        return $this->Id;
    }

    function getId_Producto() {
        return $this->Id_Producto;
    }

    function getId_Usuario() {
        return $this->Id_Usuario;
    }

    function getCalificacion() {
        return $this->Calificacion;
    }

    function getComentario() {
        return $this->Comentario;
    }



}
?>

