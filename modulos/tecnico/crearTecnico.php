<?php 
include("../../vistas/header.php");
include ("../../config/db.php");


    if ($_POST)
    {
        try{
            
        $nombreTecnico = (isset($_POST["nombreTecnico"])) ? $_POST["nombreTecnico"] :"";
        $stm = $pdo->prepare("CALL Insertar__Tecnicos(?,?)");
        $codRandom = rand(1,100);
        $stm-> bindParam(1, $codRandom, PDO::PARAM_INT);
        $stm-> bindParam(2, $nombreTecnico, PDO::PARAM_STR);
        $stm->execute();
        header("Location: tecnico.php");
exit;
        
    }
    catch(PDOException $e){

        echo "Error: " . $e->getMessage();
    }
        
        
    }   
?>
    <form action="" method="post">
        <input type="text" name ="nombreTecnico">
        <button type="submit">crear tecnico</button>
    </form>


<?php include("../../views/footer.php");?>