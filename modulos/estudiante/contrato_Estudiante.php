<?php
include('../../config/db.php');
include("../../vistas/header.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
     }

    
    $cod_Est_Cont = $_POST["cod_Est_Cont"];
    $cod_ContratoA_Est = $_POST["cod_ContratoA_Est"];
    $empresa_Vinculada = $_POST["empresa_Vinculada"];
    $fecha_Incio = $_POST["fecha_Incio"];
    $fecha_Final = $_POST["fecha_Final"];
    $horarios = $_POST["horarios"];
    $copia_Contrato = isset($_POST["copia_Contrato"]) ? 1 : 0;
    $constancia = isset($_POST["constancia"]) ? 1 : 0;

    
    $query = "INSERT INTO contrato_Estudiante (cod_Est_Cont, cod_ContratoA_Est, empresa_Vinculada, fecha_Incio, fecha_Final, horarios, copia_Contrato, constancia)
              VALUES ('$cod_Est_Cont', '$cod_ContratoA_Est', '$empresa_Vinculada', '$fecha_Incio', '$fecha_Final', '$horarios', '$copia_Contrato', '$constancia')";

    
    if ($conexion->query($query) === TRUE) {
        echo "Datos insertados correctamente.";
     } else {
         echo "Error al insertar datos: " . $conexion->error;
     }

   
     $conexion->close();
}
?>

<head>
    <link rel="stylesheet" href="../../css/estudiante/conEstu.css">
</head>
<body>


<div class="formulario_estudiantes">
<h2>Formulario para Insertar Datos</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="cod_Est_Cont">Código Estudiante:</label>
    <input class="estilo" type="text" name="cod_Est_Cont" required><br>

    <label for="cod_ContratoA_Est">Código Contrato Aprendizaje:</label>
    <input class="estilo" type="text" name="cod_ContratoA_Est" required><br>

    <label for="empresa_Vinculada">Empresa Vinculada:</label>
    <input class="estilo" type="text" name="empresa_Vinculada" required><br>

    <label for="fecha_Incio">Fecha Inicio:</label>
    <input class="estilo" type="text" name="fecha_Incio" required><br>

    <label for="fecha_Final">Fecha Final:</label>
    <input class="estilo" type="text" name="fecha_Final"><br>

    <label for="horarios">Horarios:</label>
    <input class="estilo" type="text" name="horarios" required><br>

    <label for="copia_Contrato">Copia Contrato:</label><br>

    <input type="checkbox" name="copia_Contrato"><br>

    <label for="constancia">Constancia:</label><br>
    <input type="checkbox" name="constancia"><br>

    <button type="submit" value="Insertar Datos">Enviar</button>
</form>
</div>

</body>


<?php include('../../vistas/footer.php'); ?>