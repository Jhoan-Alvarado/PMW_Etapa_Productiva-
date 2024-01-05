<?php include("../../../config/db.php");
include("../../../vistas/header.php");
?>


<head>
    <link rel="stylesheet" href="../../../css/citas/evaluacion.css">
</head>




<body>
  <form action="" method="POST">  

    <label for="">Fecha de Evaluacion</label>
    <input type="datetime-local" id="fecha_Evaluacion" name="fecha_Evaluacion" required><br>

    <label for="">Responsable de la evaluacion </label>
    <input type="text" id="nombreResponsable" name="nombreResponsable" required><br>


    <label for="">Nota</label>
    <input type="number" id="nota" name="nota">

    <label for="">Quien realizo</label>
    <input type="text" id="quien_Realizo" name="quien_Realizo" required>

    <label for="">Estado de practicas</label>
    <select name="estado_p" id="estado_p" required>
      <option value="Aprobado">Aprobado</option>
      <option value="Reporbado">Reprobado</option>
    </select><br><br>

    <label for="">Estado de documentos</label>
    <select name="estado_d" id="estado_d" required>
      <option value="Fisico">Fisico</option>
      <option value="Digital">Digital</option>
    </select><br><br>

    <label for="">Observaciones:</label>
  <textarea id="observaciones" name="s" rows="5" cols="40" maxlength="900"></textarea>
  
  <input type="submit" value="Enviar">

   
  </form>
</body>


