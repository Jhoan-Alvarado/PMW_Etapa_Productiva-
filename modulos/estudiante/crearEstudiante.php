<head>
    <link rel="stylesheet" href="style.css">
</head>

<?php include ('../../config/db.php') ?>


<?php 
 try{

    $stmt = $pdo->prepare("SELECT * FROM tecnico");
    $stmt->execute();
    $tecnico = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo  "Error" .$e->getMessage();
}

?>
 <h1>Formulario de Estudiantes</h1>

  <form action="" method="post">
    <label for="">Identificación del Estudiante:</label>
    <input type="text" id="ident_Estudiante" name="ident_Estudiante" required maxlength="15"><br><br>

    <label for="">Primer Nombre:</label>
    <input type="text" id="primer_Nombre" name="primer_Nombre" required maxlength="20"><br><br>

    <label for="">Segundo Nombre:</label>
    <input type="text" id="segundo_Nombre" name="segundo_Nombre" maxlength="20"><br><br>

    <label for="">Primer Apellido:</label>
    <input type="text" id="primer_Apellido" name="primer_Apellido" required maxlength="20"><br><br>

    <label for="">Segundo Apellido:</label>
    <input type="text" id="segundo_Apellido" name="segundo_Apellido" maxlength="20"><br><br>

    <label for="">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" maxlength="10"><br><br>

    <label for="">Código Técnico:</label>
        
    <select id="cod_Tecnico_Est" name="cod_Tecnico_Est">
  <?php foreach ($tecnico as $t) { ?>
    <option value="<?php echo $t['cod_Tecnico']; ?>"><?php echo $t['nombre_Tecnico']; ?></option>
  <?php } ?>
</select>
    <input type="submit" value="Enviar">
  </form>

<?php
   

if ($_POST){

    try{
        $iden_Estudiante = (isset ($_POST["ident_Estudiante"]))? $_POST["ident_Estudiante"]: "";
        $primer_nombre = (isset ($_POST["primer_Nombre"]))? $_POST["primer_Nombre"]: "";
        $segundo_nombre = (isset ($_POST["segundo_Nombre"]))? $_POST["segundo_Nombre"]: "";
        $primer_apellido = (isset ($_POST["primer_Apellido"]))? $_POST["primer_Apellido"]: "";
        $segundo_apellido = (isset ($_POST["segundo_Apellido"]))? $_POST["segundo_Apellido"]: "";
        $telefono = (isset ($_POST["telefono"]))? $_POST["telefono"]: "";
        $cod_tecnico = (isset ($_POST["cod_Tecnico_Est"]))? $_POST["cod_Tecnico_Est"]: "";
        
        $stm = $pdo->prepare("CALL insertar_estudiantess(?,?,?,?,?,?,?,?)");
        $codRandom = rand(1,10000);
        $stm-> bindParam(1, $codRandom, PDO::PARAM_INT);
        $stm-> bindParam(2, $iden_Estudiante, PDO::PARAM_STR);
        $stm-> bindParam(3, $primer_nombre, PDO::PARAM_STR);
        $stm-> bindParam(4, $segundo_nombre, PDO::PARAM_STR);
        $stm-> bindParam(5, $primer_apellido, PDO::PARAM_STR);
        $stm-> bindParam(6, $segundo_apellido, PDO::PARAM_STR);
        $stm-> bindParam(7, $telefono, PDO::PARAM_STR);
        $stm-> bindParam(8, $cod_tecnico, PDO::PARAM_INT);
        $stm->execute();
        header("Location: estudiantes.php");

        }
    catch(Exception $e){
        echo "Error" . $e->getMessage();        
    }

}
?>