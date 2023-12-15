<?php include("../../../config/db.php"); 
include("../../../vistas/header.php"); 
?>

<head>
    <link rel="stylesheet" href="../../../css/estudiante/crearE.css">
</head>


<div class="formulario_estudiantes">
  <h1>Proyecto</h1>

  <form action="" method="post">
    <label for="">Codigo</label>
    <input class="estilo" type="text" id="" name="" required maxlength="15"><br><br>

    <label for="">Nombre del proyecto</label>
    <input class="estilo" type="text" id="" name="" required maxlength="20"><br><br>

    <label for="">Docente de asesorias</label>
    <input class="estilo" type="text" id="" name="" maxlength="20"><br><br>

    <label for="">fecha de presentacion trabajo escrito</label>
    <input class="estilo" type="date" id="" name=""><br><br>

    <label for="">fecha de sustentacion </label>
    <input class="estilo" type="date" id="" name="" ><br><br>
        
    
    
    <button type="submit" value="Enviar">Enviar</button>
  </form>

</div>
 