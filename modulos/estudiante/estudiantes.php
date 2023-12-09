<?php include ('../../config/db.php'); 
include("../../vistas/header.php");

$stm = $pdo->prepare("SELECT e.codigo_Est, e.ident_Estudiante, e.primer_Nombre, e.segundo_Nombre,e.primer_Apellido, e.segundo_Apellido, e.telefono, t.nombre_Tecnico FROM estudiante e LEFT JOIN tecnico t ON e.cod_Tecnico_Est = t.cod_Tecnico;");
$stm->execute();
$estudiantes = $stm->fetchAll(PDO::FETCH_ASSOC);

?>



<head>
    <link rel="stylesheet" href="../../css/estudiante/estudiante.css">
    <link rel="stylesheet" href="../../css/buscador/buscador.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

    <div class="serch">
        <input class="buscador" type="text" id="searchInput" placeholder="Buscar estudiantes...">
    </div>

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



              <script>
    $(document).ready(function () {
        $("#searchInput").on("input", function () {
            var searchTerm = $(this).val();

            $.ajax({
                url: "search.php",
                method: "POST",
                data: { searchTerm: searchTerm },
                dataType: "json",
                success: function (data) {
                    // Actualizar la tabla con los resultados
                    var tableBody = $("tbody");
                    tableBody.empty();

                    data.forEach(function (e) {
                        tableBody.append("<tr><td>" + e.codigo_Est + "</td><td>" + e.ident_Estudiante + "</td><td>" + e.primer_Nombre + " " + e.segundo_Nombre + "</td><td>" + e.primer_Apellido + " " + e.segundo_Apellido + "</td><td>" + e.telefono + "</td><td>" + e.nombre_Tecnico + "</td></tr>");
                    });
                }
            });
        });
    });
</script>

            </body>