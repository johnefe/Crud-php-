<?php
    require 'clases/conexion.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nombreError = null;
        $apellidosError = null;
        $cedulaError = null;
         
        // keep track post values
        $id=$_POST['id'];
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $promedio = $_POST['promedio'];
        $edad = $_POST['edad'];
        $fecha = $_POST['fecha'];
         
         // validate input
        $valid = true;
       
         
        // update data
        if ($valid) {

            echo $id;
            echo $nombre;


            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=? WHERE id = ? ";
            $q = $pdo->prepare($sql);
            $q->execute(array($cedula, $nombre, $apellidos, $promedio, $edad, $fecha,$id));
            Database::disconnect();
            //header("Location: index.php");
        }
    } else {
        echo "se fue";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM estudiante where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $id = $data['id'];
        $cedula = $data['cedula'];
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $promedio = $data['promedio'];
        $edad = $data['edad'];
        $fecha = $data['fecha'];
        Database::disconnect();
    }
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
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group">
                        <label class="control-label">id</label>
                        <div class="controls">
                            <input name="id" type="text"  placeholder="Name" value="<?php echo !empty($id)?$id:'';?>">                            
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">cedula</label>
                        <div class="controls">
                            <input name="cedula" type="text"  placeholder="Name" value="<?php echo !empty($cedula)?$cedula:'';?>">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Name" value="<?php echo !empty($nombre)?$nombre:'';?>">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">apellidos</label>
                        <div class="controls">
                            <input name="apellidos" type="text"  placeholder="Name" value="<?php echo !empty($apellidos)?$apellidos:'';?>">
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">promedio</label>
                        <div class="controls">
                            <input name="promedio" type="text"  placeholder="Name" value="<?php echo !empty($promedio)?$promedio:'';?>">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">edad</label>
                        <div class="controls">
                            <input name="edad" type="text"  placeholder="Name" value="<?php echo !empty($edad)?$edad:'';?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">fecha</label>
                        <div class="controls">
                            <input name="fecha" type="text"  placeholder="Name" value="<?php echo !empty($fecha)?$fecha:'';?>">
                        </div>
                      </div>
                    
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>