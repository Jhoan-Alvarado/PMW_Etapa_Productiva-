<?php include("../../config/db.php");
include("../../vistas/header.php"); ?>

<?php

if (isset($_GET['id'])) {
    $cod_Est = $_GET['id'];

    $stm = $pdo->prepare("SELECT e.codigo_Est, e.ident_Estudiante, e.primer_Nombre, e.segundo_Nombre, e.primer_Apellido, e.segundo_Apellido, e.telefono, e.semestre, t.nombre_Tecnico  FROM estudiante e  LEFT JOIN tecnico t ON e.cod_Tecnico_Est = t.cod_Tecnico WHERE e.codigo_Est = $cod_Est;");
    $stm->execute();
    $est = $stm->fetchAll(PDO::FETCH_ASSOC);
}

?>

<head>
    <link rel="stylesheet" href="../../css/estudiante/vestudiante.css">
</head>

<body>

    <div class="c">

        <div class="info-Est">
            <?php foreach ($est as $e) { ?>

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

        $stm = $pdo->prepare("SELECT * FROM contrato_Estudiante ce INNER JOIN estudiante e ON ce.cod_Est_Cont = e.codigo_Est INNER JOIN contrato_Aprendizaje ca ON ce.cod_ContratoA_Est = ca.cod_ContratoA  WHERE ce.cod_Est_Cont = $cod_Est ");
        $stm->execute();
        $contrato = $stm->fetchAll(PDO::FETCH_ASSOC);

        $stm = $pdo->prepare("SELECT * FROM Pasantias_Estudiantess pe INNER JOIN estudiante e ON pe.cod_Pas_Est = e.codigo_Est;");
        $stm->execute();
        $pasantia = $stm->fetchAll(PDO::FETCH_ASSOC);

        $stm = $pdo->prepare("SELECT * FROM pasantias_Estudiante pe INNER JOIN estudiante e ON pe.cod_Pas_Est = e.codigo_Est;");
        $stm->execute();
        $proyecto = $stm->fetchAll(PDO::FETCH_ASSOC);

        $stm = $pdo->prepare("SELECT * FROM pasantias_Estudiante pe INNER JOIN estudiante e ON pe.cod_Pas_Est = e.codigo_Est;");
        $stm->execute();
        $homologacion = $stm->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php if ($contrato) { ?>
            <div class="etapa">
                <?php foreach ($contrato as $c) { ?>
                    <ul>
                        <li><strong>CODIGO DE CONTRATO : </strong>
                            <?php echo $c['cod_ContratoA_Est'] ?>
                        </li>
                        <li><strong>EMPRESA : </strong>
                            <?php echo $c['empresa_Vinculada'] ?>
                        </li>
                        <li><strong>FECHA INICIO : </strong>
                            <?php echo $c['fecha_Incio'] ?>
                        </li>
                        <li><strong>FECHA FINAL : </strong>
                            <?php echo $c['fecha_Final'] ?>
                        </li>
                        <li><a href="../modalidades/contrato/actualizarC.php?id=<?php echo $cod_Est ?>">Actualizar Datos</a>
                        </li>
                    </ul>

                <?php }
                $contrato = 0; ?>
            </div>

        <?php } else if ($pasantia) { ?>
            <?php foreach ($pasantia as $p) { ?>
                    <div class="etapa">

                        <ul>
                            <li><strong>CODIGO DE PASANTIA: </strong>
                            <?php echo $p['cod_pasantia'] ?>
                            </li>
                            <li><strong>EMPRESA : </strong>
                            <?php echo $p['Empresa_Vinculada'] ?>
                            </li>
                            <li><strong>FECHA INICIO : </strong>
                            <?php echo $p['fecha_Inicio'] ?>
                            </li>
                            <li><strong>FECHA FINAL : </strong>
                            <?php echo $p['fecha_Final'] ?>
                            </li>
                            <li><strong>HORAS REALIZADAS : </strong>
                            <?php echo $p['Horas_Realizadas'] ?>
                            </li>
                            <li><strong>HOJA DE VIDA : </strong>
                            <?php echo $p['hojaVida'] ?>
                            </li>
                            <li><strong>HORARIOS : </strong>
                            <?php echo $p['horario'] ?>
                            </li>
                            <li><strong>CONSTANCIA DE PASANTIA : </strong>
                            <?php echo $p['constancia_Pasantia'] ?>
                            </li>
                            <li><strong>CARTA DE PRESENTACION : </strong>
                            <?php echo $p['carta_Presentacion'] ?>
                            </li>
                            <li><strong>ARL : </strong>
                            <?php echo $p['arl'] ?>
                            </li>
                            <li><strong>ACUERDO PASANTIA : </strong>
                            <?php echo $p['acuerdo_Pasantia'] ?>
                            </li>
                            <li><strong>PLANILLAS : </strong>
                            <?php echo $p['planilla'] ?>
                            </li>
                            <li> <a href="../modalidades/pasantia/actualizarP.php?id=<?php echo $cod_Est ?>">Actualizar Pasantia</a>
                            </li>
                        </ul>


                <?php }
            $pasantia = 0; ?>
                </div>
        <?php } else if ($proyecto) { ?>
                    <div class="etapa">



                    </div>
        <?php } else if ($homologacion) { ?>

                        <h4>Hay Homologacion</h4>

        <?php } else { ?>

                        <div class="etapa">
                            <h3>No Hay Una Modalidad Asignada</h3>
                            <div class="modalidad">
                                <a href="../modalidades/contrato/crearContrato.php?id=<?php echo $cod_Est; ?>">Etapa Productiva</a>
                                <a href="../modalidades/pasantia/crearPasantia.php?id=<?php echo $cod_Est; ?>">Pasantias</a>
                                <a href="../modalidades/homolog/crearHomolog.php?id=<?php echo $cod_Est; ?>">Homologacion</a>
                                <a href="../modalidades/proyecto/crearProyecto.php?id=<?php echo $cod_Est; ?>">Proyecto</a>
                            </div>
                        </div>
        <?php }
        $cod_Est = 0; ?>
    </div>
</body>