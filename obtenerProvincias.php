<?php
$mysql = new mysqli("localhost", "geografia", "geografia", "geografia");
$res=$mysql->query('SELECT * from provincias WHERE id_comunidad='.$_GET["comunidad"].' ORDER BY nombre;');
$provincias=$res->fetch_assoc();
header('Content-Type:application/javascript;charset=UTF-8;');
echo "{";
    echo '"provincias":';
    echo '[';
while ($provincias) {
    echo '{';
    echo '"n_provincia": '.$provincias["n_provincia"].',';
    echo '"nombre": "'.$provincias["nombre"].'"';
    echo "}";
    $provincias=$res->fetch_assoc();
    if ($provincias) {
        echo ",";
    }
}
echo "]";
echo "} ";
?>