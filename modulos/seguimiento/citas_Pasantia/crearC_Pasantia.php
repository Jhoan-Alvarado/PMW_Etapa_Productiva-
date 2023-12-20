<?php
include("../../../config/db.php");
include("../../../vistas/header.php");

if (isset($_GET['id'])) {
    $cod_Est = $_GET['id'];

    $stm = $pdo->prepare("SELECT * FROM estudiante WHERE codigo_Est = :codigo_Est");
    $stm->bindParam(':codigo_Est', $cod_Est, PDO::PARAM_INT);
    $stm->execute();
    $estudiante = $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>

<head>
    <link rel="stylesheet" href="../../../css/citas/pasantia.css">
    <script>
        function showAlert(message, type) {
            alert(message); // You can replace this with a more sophisticated alert or use a library like SweetAlert
        }
    </script>
</head>

<body>

    <h1>Formulario de Citas de Seguimiento de Pasantía </h1>

    <form action="" method="POST">
        <label for="codCita">Código de Cita:</label>
        <input type="number" id="codCita" name="codCita" required><br>

        <label for="fechaRealizada">Fecha:</label>
        <input type="datetime-local" id="fechaRealizada" name="fecha" required><br>

        <label for="responsableCita">Responsable de la Cita:</label>
        <input type="text" id="responsableCita" name="responsable" required maxlength="50"><br>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="Pendiente">Pendiente</option>
            <option value="Realizada">Realizada</option>
        </select><br><br>

        <label for="nota">Nota:</label>
        <input type="number" id="nota" name="nota" step="0.1"><br>

        <label for="observaciones">Observaciones:</label>
        <textarea id="observaciones" name="observaciones" rows="5" cols="40" maxlength="900"></textarea>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_POST) {
        try {
            $cod = $_POST['codCita'];
            $fecha = $_POST['fecha'];
            $responsable = $_POST['responsable'];
            $estado = $_POST['estado'];
            $n = $_POST['nota'];
            $nota = floatval($n);
            $observacion = $_POST['observaciones'];

            $stm = $pdo->prepare('CALL InsertarCitasPasantias(?,?,?,?,?,?,?)');
            $stm->bindParam(1, $cod, PDO::PARAM_INT);
            $stm->bindParam(2, $fecha, PDO::PARAM_STR);
            $stm->bindParam(3, $responsable, PDO::PARAM_STR);
            $stm->bindParam(4, $estado, PDO::PARAM_STR);
            $stm->bindParam(5, $nota, PDO::PARAM_STR);
            $stm->bindParam(6, $observacion, PDO::PARAM_STR);
            $stm->bindParam(7, $cod_Est, PDO::PARAM_INT);
            $stm->execute();

            // Show success alert
            echo '<script>showAlert("Cita agregada con éxito", "success");</script>';
        } catch (PDOException $e) {
            // Show error alert
            echo '<script>showAlert("Error al agregar la cita: ' . $e->getMessage() . '", "error");</script>';
        }
    }
    ?>
</body>
