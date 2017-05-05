 <?php
        $controlador=new controladorEstudiante();
        $resultado = $controlador->index();
 ?>
 <h2>pagina de inicio de los estudiantes registrados</h2>

 <table>
     <thead>
         <th>id</th>
         <th>cedula</th>
         <th>nombres</th>
         <th>apellidos</th>
         <th>promedio</th>
         <th>edad</th>
         <th>fecha</th>
         <th>acción</th>
     </thead>
     <tbody>
        <?php
        while ( $row=mysql_fetch_assoc($resultado)):?>
             <tr><?php echo $row['id']; ?></tr>
             <tr><?php echo $row['cedula']; ?></tr>
             <tr><?php echo $row['nombre']; ?></tr>
             <tr><?php echo $row['apellidos']; ?></tr>
             <tr><?php echo $row['promedio']; ?></tr>
             <tr><?php echo $row['edad']; ?></tr>
             <tr><?php echo $row['fecha']; ?></tr>
        <?php endwhile; ?>
    </tbody>
     
 </table>