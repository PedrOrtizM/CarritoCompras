<?php
 include "../Logica/conexion.php";
 include '../Logica/Producto.php';

function agregarProducto($idProducto,$cantidad) {
    
    
     $sql = "INSERT INTO `mydb`.`compra`(`cantidad`,`idproducto`) VALUES('$cantidad',"
                . "'$idProducto');";
        consulta($sql);
    
    
}


function consulta($sql){
    
        $result = baseDatos()->query($sql);
        if($result){           return $result;}
        
        else{echo'error en la consulta sql';return null;}
}


function obtenerProducto($idProducto) {
    
    $sql = "SELECT * FROM PRODUCTO WHERE idProducto=$idProducto";
    $result = consulta($sql);
    
     if($result!=null){
         while ($row = $result->fetch_assoc()) {
             
             
         
         $producto = new Producto($row["idproducto"], $row["nombre"], $row["descripcion"], $row["precio"], $row["imagen"]); 
   
         return $producto;
         }
     }
     else{echo'no se pudo obtener producto';}
    
}


function obtenerCompra($param) {
    
     $sql = "SELECT * FROM COMPRA";
    $result = consulta($sql);
    
     if($result!=null){
         while ($row = $result->fetch_assoc()) {
             
             
         
         $producto = new Producto($row["idproducto"], $row["nombre"], $row["descripcion"], $row["precio"], $row["imagen"]); 
   
         return $producto;
         }
     }
     else{echo'no se pudo obtener producto';}
    
    
}

function eliminarCompra($idCompra) {
    $sql = "DELETE FROM COMPRA WHERE idcompra=$idCompra";
    $result = consulta($sql);
  
     if($result){
       header('Location: ../Vista/MiCarrito.php');
     }
     else{echo'no se pudo obtener producto';}
    
    
}

