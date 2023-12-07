<?php include('../../vistas/header.php'); ?>

<?php include("../../config/db.php");

$stm = $pdo->prepare("SELECT * FROM tecnico");
$stm->execute();
$estudiantes = $stm->fetchAll(PDO::FETCH_ASSOC);


?>              

    <a href="crearTecnico.php">Crear</a>

<div class="container">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tecnicos as $t) { ?>

                <tr>
                    <td>
                        <?php echo $t['cod_Tecnico'] ?>
                    </td>
                    <td>
                        <?php echo $t['nombre_Tecnico'] ?>
                    </td>
                    <td> <a href="editarTecnico.php?id=<?php echo $t['cod_Tecnico'] ?>">ACTUALIZAR</a></td>
                    <td> <a href="eliminarTecnico.php?id=<?php echo $t['cod_Tecnico'] ?>">ELIMINAR</a></td>
                </tr>
            <?php 
        
        $tecnicos = 0; } ?>
        </tbody>

    </table>

</div>







<?php include('../../vistas/footer.php'); ?>