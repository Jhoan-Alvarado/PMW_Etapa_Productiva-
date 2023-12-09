<?php
include("../../vistas/header.php");
include("../../config/db.php");


if ($_POST) {
    try {
        $nombreTecnico = (isset($_POST["nombreTecnico"])) ? $_POST["nombreTecnico"] : "";
        $stm = $pdo->prepare("CALL Insertar__Tecnicos(?,?)");
        $codRandom = rand(1, 100);
        $stm->bindParam(1, $codRandom, PDO::PARAM_INT);
        $stm->bindParam(2, $nombreTecnico, PDO::PARAM_STR);
        $stm->execute();
        header("Location: tecnico.php");
        exit;

    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }


}
?>



<head>
    <link rel="stylesheet" href="../../css/tecnico/crearTecnico.css">
</head>
<body>
    <div class="formulario_tecnico">
        <h1>Crear Tecnico</h1>
        <form action="" method="post">
            <label for="">Nombre del tecnico</label>
            <input class="estilo" type="text" name="nombreTecnico">
            <button type="submit">crear tecnico</button>
        </form>
    </div>
</body>



<?php include("../../vistas/footer.php"); ?>