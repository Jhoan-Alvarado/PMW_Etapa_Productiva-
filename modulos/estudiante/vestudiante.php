<?php include ("../../config/db.php");
include ("../../vistas/header.php");


if (isset($_GET['id'])) {
    $cod_Est = $_GET['id'];

    
    $stm = $pdo->prepare("SELECT e.codigo_Est, e.ident_Estudiante, e.primer_Nombre, e.segundo_Nombre,e.primer_Apellido, e.segundo_Apellido, e.telefono, e.semestre, t.nombre_Tecnico FROM estudiante e LEFT JOIN tecnico t ON e.cod_Tecnico_Est = t.cod_Tecnico;");
    $stm->execute();
    $estudiante = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm = $pdo->prepare("SELECT * FROM tecnico");
    $stm->execute();
    $tecnico = $stm->fetchAll(PDO::FETCH_ASSOC);

}


?>
<head>
    <link rel="stylesheet" href="../../css/estudiante/vestudiante.css">    
</head>
<body>
    
    <div class="c">

    <div class="info-Est">
        <?php foreach ($estudiante as $e) { ?>

<h1><?php echo $e['semestre']?></h1> 
        <?php } ?>
    </div>
    <div class="citas"></div>
    <div class="etapa"></div>
    </div>
</body>