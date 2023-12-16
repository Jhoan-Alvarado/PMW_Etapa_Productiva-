<?php include("../../../config/db.php");
include("../../../vistas/header.php"); ?>


<?php
if (isset($_GET['id'])) {
  $cod_Est = $_GET['id'];

  $stm = $pdo->prepare("SELECT * FROM estudiante WHERE codigo_Est = $cod_Est");
  $stm->execute();
  $estudiante = $stm->fetchAll(PDO::FETCH_ASSOC);
}


?>

<head>
  <link rel="stylesheet" href="../../../css/estudiante/crearE.css">
</head>



<div class="formulario_estudiantes">
  <?php foreach ($estudiante as $h) { ?>
    <h2>Formulario De Homologacion Para
      <?php echo $h['primer_Nombre'] . "  " . $h['primer_Apellido'] ?>
    </h2>
    <form action="" method="post">
      <label for="">Código Estudiante:</label>
      <input class="estilo" type="text" value="<?php echo $h['codigo_Est'] ?>" name="cod_Est_Past" readonly required><br>
      <label for="">Fecha de solicitud</label>
      <input class="estilo" type="date" id="" name="fecha_S" required maxlength="15"><br><br>

      <label for="">Nombre de la empresa</label>
      <input class="estilo" type="text" id="" name="empresa" required maxlength="20"><br><br>

      <label for="">Estado de aprobado:</label>
      <select class="estilo" type="text" id="" name="estado" maxlength="20">
        <option value="si">Si</option>
        <option value="no">No</option>
        <option value="espera">Espera</option>
      </select><br><br>

      <label for="">fecha en el que fue aprobado</label>
      <input class="estilo" type="date" id="" name="fechaA"><br><br>

      <textarea class="estilo" name="observacion" rows="6" cols="40" placeholder="OBSERVACION...."></textarea><br><br>

      <button type="submit" value="Enviar">Enviar</button>
    </form>
  <?php } ?>
</div>



<?php

if ($_POST) {

  try {


    $empresa = $_POST['empresa'];
    $fechaA = $_POST['fechaA'];
    $fechaS = $_POST['fecha_S'];
    $estado = $_POST['estado'];
    $observacion = $_POST['observacion'];

    $stm = $pdo->prepare("CALL InsertarHomologacion_Estudiantes(?,?,?,?,?,?,?)");

    $stm->bindParam(1, $empresa, PDO::PARAM_STR);
    $stm->bindParam(2, $fechaA, PDO::PARAM_STR);
    $stm->bindParam(3, $fechaS, PDO::PARAM_STR);
    $stm->bindParam(4, $estado, PDO::PARAM_STR);
    $stm->bindParam(5, $observacion, PDO::PARAM_STR);
    $stm->bindParam(6, $cod_Est, PDO::PARAM_INT);
    $codHomolog = rand(1, 1000);
    $stm->bindParam(7, $codHomolog, PDO::PARAM_INT);
    $stm->execute();
    header("Location: ../../estudiante/vestudiante.php?id=$cod_Est");

  } catch (Exception $e) {
    echo "Error" . $e->getMessage() . "";
  }
}
?>