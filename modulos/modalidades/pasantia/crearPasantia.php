<?php include("../../../config/db.php");
 include("../../../vistas/header.php"); ?>



<head>
    <link rel="stylesheet" href="../../../css/estudiante/crearE.css">
</head>


<div class="formulario_estudiantes">
  <h1></h1>

  <form action="" method="post">
    <label for="">Fecha de presentacion hoja de vida </label>
    <input class="estilo" type="date" id="" name=""><br><br>

    <label for="">Empresa</label>
    <input class="estilo" type="text" id="" name="" required maxlength="20"><br><br>

    <label for="">Horas a realizar</label>
    <input class="estilo" type="number" id="" name="" required maxlength="20"><br><br>

    <label for="">Horarios</label>
    <input class="estilo" type="text" id="" name="" required maxlength="20"><br><br>

    <label for="">Fecha de iniciacion </label>
    <input class="estilo" type="date" id="" name=""><br><br>

    <label for="">Fecha final</label>
    <input class="estilo" type="date" id="" name=""><br><br>

    <label for="">Carta de presentacion</label>
    <input  type="checkbox" name ="cartaP">
    <br>
    <br>

    <label for="">ARL</label>
    <input  type="checkbox" name="arl" id="">    
    <br>
    <br>

    <label for="">Acuerdo de pasantia</label>
    <input type="checkbox" name="acuerdoP" id="">
    <br>
    <br>

    <label for="">planillas</label>
    <input  type="checkbox" name="planillas" id="">
    <br><br>

    <label for="">Constancia</label>
    <input type="checkbox" name="constancia" id="">
    <br><br>
    <button type="submit" value="Enviar">Enviar</button>
  </form>

</div>
 
 