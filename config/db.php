<?php
$host = 'localhost'; 
$dbname = 'EtapaProductiva'; 
$username = 'root';
$password = 'alejo123abc..'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>  
