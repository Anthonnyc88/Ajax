<?php 
//En esta clase se obtiene los datos desde el formulario de registro y se llevan a la funcion ingresar categoria
include "/formulario.php";
    $errores = "";
    //Validamos si el nombre que ingresa ya existe
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = filter_var($_POST["nombre"],FILTER_SANITIZE_STRING);
        $sku = filter_var($_POST["sku"],FILTER_SANITIZE_STRING);
        $conexion = Conexion();
        $sql = "SELECT * FROM tbl_productos WHERE nombre = :nombre or sku = :sku;";
        $info2 = $conexion->prepare($sql); 
        $info2->execute(array(':nombre' => $nombre,':sku' => $sku));
        $info = $info2->fetch();
        if(isset($_POST['guardar'])){

        }
        if($info === false){
            $sku= $_POST["sku"];
            $nombre= $_POST["nombre"];
            $descripcion= $_POST["descripcion"];
            $imagen = $destino;
            $stock= $_POST["stock"];
            $precio= $_POST["precio"];
            $id= "0";
            $nom_categoria= $_POST["nom_categoria"];
            //Validamos si algun campo  quedo basido a la hora de ingresar datos
            if($nombre=="" or $sku=="" or $descripcion=="" or $stock=="" or $precio=="" or $id==""or $nom_categoria==""){
                //echo"<script type=\"text/javascript\">alert('Llenar todos los campos'); window.location='../Vista/Productos.php';</script>";
            }else{
                $clase = new Productos($sku,$nombre,$descripcion,$stock,$precio,$id);
                $clase->registrar_Productos();
            }
        }else{
            echo"<script type=\"text/javascript\">alert('Ya existe este nombre o id ingresados'); window.location='../Vista/Productos.php';</script>";
        }
}
?>