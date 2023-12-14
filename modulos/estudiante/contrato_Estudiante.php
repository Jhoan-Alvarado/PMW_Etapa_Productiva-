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



<?php include('../../vistas/footer.php'); ?>