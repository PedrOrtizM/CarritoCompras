<?php
function baseDatos() {
    

$mysqli = new mysqli("localhost", "root", "", "mydb");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{ //echo"base de datos OK \n";
return $mysqli;

}
}