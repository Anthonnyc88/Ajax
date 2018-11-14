
<?php
require "Conexion";
class Productos{
    public $sku;
    public $nombre;
    public $descripcion;
    public $stock;
    public $precio;
    public $id;

    //Metodo Constructor de la clase productos
    function __construct($sku,$nombre,$descripcion,$stock,$precio,$id){
        $this->sku= $sku;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->stock= $stock;
        $this->precio= $precio;
        $this->id= $id;
        
    }
    //Función que registra una productos al sistema y se guardara en una base de datos
    function registrar_Productos(){
        $conexion = Conexion();
        $sql = "INSERT INTO tbl_productos(sku,nombre,descripcion,stock,precio,id)VALUES('$this->sku','$this->nombre','$this->descripcion','$this->stock','$this->precio','$this->id')";
        $conexion->query($sql);
       echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='../Vista/Productos.php';</script>";
    }  
}

?>