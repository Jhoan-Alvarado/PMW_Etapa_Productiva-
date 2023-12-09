<?php include ('../../config/db.php'); 
include("../../vistas/header.php");

$stm = $pdo->prepare("SELECT e.codigo_Est, e.ident_Estudiante, e.primer_Nombre, e.segundo_Nombre,e.primer_Apellido, e.segundo_Apellido, e.telefono, t.nombre_Tecnico FROM estudiante e LEFT JOIN tecnico t ON e.cod_Tecnico_Est = t.cod_Tecnico;");
$stm->execute();
$estudiantes = $stm->fetchAll(PDO::FETCH_ASSOC);

?>



<head>
    <link rel="stylesheet" href="../../css/estudiante/estudiante.css">
</head>
<body>
    
    <div class="estudiantes">
        
    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Identificacion</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Carrera</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($estudiantes as $e) { ?>

                <tr>
                    <td><?php echo $e['codigo_Est']; ?></td>
                    <td><?php echo $e['ident_Estudiante']; ?></td>
                    <td><?php echo $e['primer_Nombre']. " "  . $e['segundo_Nombre'] ;?></td>
                    <td><?php echo $e['primer_Apellido']. " " . $e['segundo_Apellido'] ?></td>
                    <td><?php echo $e['telefono']?></td>
                    <td><?php echo $e['nombre_Tecnico']?></td>
                </tr>
            <?php 
              $estudiantes = 0; } ?>
              </tbody>
            </body>