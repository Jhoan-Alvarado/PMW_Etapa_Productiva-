<?php include("../../../config/db.php"); include("../../../vistas/header.php");?>

<?php

if (isset($_GET['id'])) {
    $cod_Est = $_GET['id'];

    $stm = $pdo->prepare("SELECT ce.cod_Est_Cont,ce.cod_ContratoA_Est, ce.empresa_Vinculada,ce.fecha_Incio, ce.fecha_Final, ce.horarios,ce.copia_Contrato,ce.constancia, e.primer_Nombre, e.primer_Apellido  FROM contrato_Estudiante ce INNER JOIN estudiante e ON ce.cod_Est_Cont = e.codigo_Est WHERE cod_Est_Cont = $cod_Est");
    $stm->execute();
    $contrato = $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>

<head>

</head>

<body>
    <div class="formulario_estudiantes">
        <?php foreach ($contrato as $e) { ?>
            <h2>Formulario De Actualizacion Contrato De Aprendizaje Para
                <?php echo $e['primer_Nombre'] . "  " . $e['primer_Apellido'] ?>
            </h2>
            <form method="post" action="">
                <label for="cod_Est_Cont">Código Estudiante:</label>
                <input class="estilo" type="text" value="<?php echo $e['cod_Est_Cont'] ?>" name="cod_Est_Cont" readonly required><br>

                <label for="cod_ContratoA_Est">Código Contrato:</label>
                <input class="estilo" type="text" value="<?php echo $e['cod_ContratoA_Est'] ?>" name="cod_ContratoA_Est" readonly required><br>

                <label for="empresa_Vinculada">Empresa Vinculada:</label>
                <input class="estilo" type="text" value="<?php echo $e['empresa_Vinculada'] ?>" name="empresa_Vinculada" required><br>

                <label for="fecha_Incio">Fecha Inicio:</label>
                <input class="estilo" type="text" value="<?php echo $e['fecha_Incio'] ?>" name="fecha_Incio" required><br>

                <label for="fecha_Final">Fecha Final: <?php echo $e['fecha_Final'] ?> </label>
                <input class="estilo" type="date" name="fecha_Final"><br>

                <label for="horarios">Horarios:</label>
                <input class="estilo" type="text" name="horarios" value="<?php echo $e['horarios'] ?>" required><br>

                <label for="copia_Contrato">Copia Contrato: <?php echo $e['copia_Contrato'] ?> </label><br>

                <input type="checkbox" value="<?php echo $e['copia_Contrato'] ?>" name="copia_Contrato"><br>

                <label for="constancia">Constancia: <?php echo $e['constancia'] ?> </label><br>
                <input type="checkbox" value="<?php echo $e['constancia'] ?>" name="constancia"><br>

                <button type="submit" value="Insertar Datos">Enviar</button>
            </form>
        <?php } ?>
    </div>
</body>