<?php include ("../../config/db.php");
include('../../vistas/header.php');

if (isset($_GET["id"])) {
    $cod_TecnicoE = $_GET["id"];
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            $nombreTecnico = $_POST["nombreTecnico"];
            $stm = $pdo->prepare("UPDATE tecnico SET nombre_Tecnico = :nombre WHERE cod_Tecnico = :codigo");
            $stm->bindParam(':nombre', $nombreTecnico);
            $stm->bindParam(':codigo', $cod_TecnicoE);
            $stm->execute();
            header("Location: tecnico.php");
            exit(); 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="../../css/tecnico/actualizar.css">
</head>

<div class="formulario_estudiantes">
<form  action="" method="post">
    <h1><?php echo $cod_TecnicoE; ?></h1>
    <input class="estilo" type="text" name="nombreTecnico">
    <button type="submit">Actualizar</button>
    <button><a href="tecnico.php">CANCELAR</a></button>
</form>
</div>
