<?php include("../../config/db.php"); include("../../vistas/header.php"); ?>
 
<?php

if (isset($_GET['id'])) {
    $cod_Est = $_GET['id'];

    $stm = $pdo->prepare("SELECT e.codigo_Est, e.ident_Estudiante, e.primer_Nombre, e.segundo_Nombre,e.primer_Apellido, e.segundo_Apellido, e.telefono, e.semestre, t.nombre_Tecnico FROM estudiante e LEFT JOIN tecnico t ON e.cod_Tecnico_Est = t.cod_Tecnico;");
    $stm->execute();
    $estudiante = $stm->fetchAll(PDO::FETCH_ASSOC);

}


?>

<head>
    <link rel="stylesheet" href="../../css/estudiante/vestudiante.css">
</head>

<body>

    <div class="c">

        <div class="info-Est">
            <?php foreach ($estudiante as $e) { ?>

                <h2>
                    <?php echo $e['primer_Nombre'] . ' ' . $e['primer_Apellido'] ?>
                </h2>
                <div class="detalles">

                    <ul></ul>
                    <li><strong>Codigo : </strong>
                        <?php echo $e['codigo_Est'] ?>
                    </li>
                    <li><strong>N° Identificacion : </strong>
                        <?php echo $e['ident_Estudiante'] ?>
                    </li>
                    <li><strong>Nombres : </strong>
                        <?php echo $e['primer_Nombre'] . ' ' . $e['segundo_Nombre'] ?>
                    </li>
                    <li><strong>Apellidos : </strong>
                        <?php echo $e['primer_Apellido'] . ' ' . $e['segundo_Apellido'] ?>
                    </li>
                    <li><strong>Telefono : </strong>
                        <?php echo $e['telefono'] ?>
                    </li>
                    <li><strong>Semestre : </strong>
                        <?php echo $e['semestre'] ?>
                    </li>
                    <li><strong>Carrera : </strong>
                        <?php echo $e['nombre_Tecnico'] ?>
                    </li>
                </div>
            <?php } ?>
        </div>
        <div class="citas"></div>

        <?php
        if (true) { ?>

            <div class="etapa">
                <h3>No Hay Una Modalidad Asignada</h3>
                <div class="modalidad">
                    <a href="../modalidades/contrato/crearContrato.php">Etapa Productiva</a>
                    <a href="../modalidades/pasantia/crearPasantia.php">Pasantias</a>
                    <a href="../modalidades/homolog/crearHomolog.php">Homologacion</a>
                    <a href="../modalidades/proyecto/crearProyecto.php">Proyecto</a>
                </div>
            </div>

        <?php } else { ?>

            <div class="etapa">
                <h2>JAJAJAJJA</h2>
            </div>
        <?php } ?>
    </div>
</body>