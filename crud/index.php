<?php
    include_once 'clases/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>cedula</th>
                      <th>nombre</th>
                      <th>apellidos</th>
                      <th>promedio</th>
                      <th>edad</th>
                      <th>fecha</th>
                      <th>accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM estudiante ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['cedula'] . '</td>';
                            echo '<td>'. $row['nombre'] . '</td>';
                            echo '<td>'. $row['apellidos'] . '</td>';
                            echo '<td>'. $row['promedio'] . '</td>';
                            echo '<td>'. $row['edad'] . '</td>';
                            echo '<td>'. $row['fecha'] . '</td>';
                             echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>