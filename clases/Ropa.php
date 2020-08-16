<?php
class Ropa extends Producto{
    private $Id;
    private $Id_Producto;
    private $Talla;
    private $Color;
    private $Genero;
    private $Tipo;
    
    function Ropa() {
        $this->Id = 0;
        $this->Id_Producto = 0;
        $this->Talla = "";
        $this->Color = "";
        $this->Genero = "";
        $this->Tipo = "";
    }
    function getId() {
        return $this->Id;
    }

    function getId_Producto() {
        return $this->Id_Producto;
    }

    function getTalla() {
        return $this->Talla;
    }

    function getColor() {
        return $this->Color;
    }

    function getGenero() {
        return $this->Genero;
    }

    function getTipo() {
        return $this->Tipo;
    }
    

}
?>

