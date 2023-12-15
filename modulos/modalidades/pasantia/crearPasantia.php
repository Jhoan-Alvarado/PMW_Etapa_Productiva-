<?php include("../../../config/db.php");
 include("../../../vistas/header.php"); ?>



<div class="formulario_estudiantes">
  <h1></h1>

  <form action="" method="post">
    <label for="">Fecha de presentacion hoja de vida </label>
    <input class="date" type="text" id="" name=""><br><br>

    <label for="">Empresa</label>
    <input class="estilo" type="text" id="" name="" required maxlength="20"><br><br>

    <label for="">Horas a realizar</label>
    <input class="estilo" type="text" id="" name="" required maxlength="20"><br><br>

    <label for="">Horarios</label>
    <input class="estilo" type="text" id="" name="" required maxlength="20"><br><br>

    <label for="">Fecha de iniciacion </label>
    <input class="date" type="text" id="" name=""><br><br>

    <label for="">Fecha final</label>
    <input class="date" type="text" id="" name=""><br><br>

    <label for="">Carta de presentacion</label>
    <select class="estilo" type="text" id="" name="" maxlength="20">
        <option value="si">Si</option>
        <option value="no">No</option>
    </select><br><br>

    <label for="">ARL</label>
    <select class="estilo" type="text" id="" name="" maxlength="20">
        <option value="si">Si</option>
        <option value="no">No</option>
    </select><br><br>

    <label for="">Acuerdo de pasantia</label>
    <select class="estilo" type="text" id="" name="" maxlength="20">
        <option value="si">Si</option>
        <option value="no">No</option>
    </select><br><br>

    <label for="">planillas</label>
    <select class="estilo" type="text" id="" name="" maxlength="20">
        <option value="si">Si</option>
        <option value="no">No</option>
    </select><br><br>

    <label for="">Constancia</label>
    <select class="estilo" type="text" id="" name="" maxlength="20">
        <option value="si">Si</option>
        <option value="no">No</option>
    </select><br><br>


    <button type="submit" value="Enviar">Enviar</button>
  </form>

</div>
 
 