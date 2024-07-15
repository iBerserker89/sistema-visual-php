<?php
$conn = mysqli_connect("db", "root", "root", "default");

function consulta_dados($query) {
    global $conn;
    $resultado = mysqli_query($conn, $query);
    return $resultado;
}