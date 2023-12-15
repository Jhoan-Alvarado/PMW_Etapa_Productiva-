<?php include("../../../config/db.php"); include("../../../vistas/header.php"); ?>
 


<div class="formulario_estudiantes">
  <h1></h1>

  <form action="" method="post">
    <label for="">Fecha de solicitud</label>
    <input class="date" type="text" id="" name="" required maxlength="15"><br><br>

    <label for="">Nombre de la empresa</label>
    <input class="estilo" type="text" id="" name="" required maxlength="20"><br><br>

    <label for="">aprobado o no:</label>
    <select class="estilo" type="text" id="" name="" maxlength="20">
        <option value="si">Si</option>
        <option value="no">No</option>
    </select><br><br>

    <label for="">fecha en el que fue aprobado</label>
    <input class="estilo" type="date" id="" name=""><br><br>

    <textarea name="mensaje" rows="6" cols="40" placeholder="OBSERVACION...."></textarea><br><br>
 
    <button type="submit" value="Enviar">Enviar</button>
  </form>

</div>
 
 