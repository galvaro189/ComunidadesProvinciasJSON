<?php

$mysql = new mysqli("localhost", "geografia", "geografia", "geografia");
$res=$mysql->query('SELECT * from comunidades ORDER BY nombre;');
$comunidades=$res->fetch_assoc();
header('Content-Type:application/javascript;charset=UTF-8;');
echo "{";
    echo '"comunidades":';
    echo '[';
while ($comunidades) {
    echo '{';
    echo '"id_comunidad": '.$comunidades["id_comunidad"].',';
    echo '"nombre": "'.$comunidades["nombre"].'"';
    echo "}";
    $comunidades=$res->fetch_assoc();
    if ($comunidades) {
        echo ",";
    }
}
echo "]";
echo "} ";
?>