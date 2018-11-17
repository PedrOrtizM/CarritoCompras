<?php

include "../DAOS/DaosProducto.php";

$idProducto = $_POST['id'];
$cantidad = $_POST['cantidad'];
//$cliente

agregarProducto($idProducto,$cantidad);


header('Location: ../index.php');
