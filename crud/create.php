<?php
     
    require 'clases/conexion.php';
 
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
        if (empty($nombre)) {
            $nombreError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($apellidos)) {
            $apellidosError = 'Please enter Email Address';
            $valid = false;
        }// else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
          //  $emailError = 'Please enter a valid Email Address';
           // $valid = false;
        //}
         
        if (empty($cedula)) {
            $cedulaError = 'Please enter Mobile Number';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO estudiante (id,cedula,nombre,apellidos,promedio,edad,fecha) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id,$cedula,$nombre,$apellidos,$promedio,$edad,$fecha));
            Database::disconnect();
            header("Location: index.php");
        }
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
                        <h3>Create a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                    <!-- -->
                      <div class="control-group <?php echo !empty($idError)?'error':'';?>">
                        <label class="control-label">id</label>
                        <div class="controls">
                            <input name="id" type="text"  placeholder="id" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <!-- -->
                      <!-- -->
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Cedula</label>
                        <div class="controls">
                            <input name="cedula" type="text"  placeholder="cedula" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <!-- -->
                    <!-- -->
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <!-- -->
                      <!-- -->
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">apellidos</label>
                        <div class="controls">
                            <input name="apellidos" type="text"  placeholder="cedula" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <!-- -->
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">promedio</label>
                        <div class="controls">
                            <input name="promedio" type="text"  placeholder="promedio" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <!-- -->
                      <!-- -->
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">edad</label>
                        <div class="controls">
                            <input name="edad" type="text"  placeholder="cedula" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <!-- -->
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">fecha</label>
                        <div class="controls">
                            <input name="fecha" type="text"  placeholder="cedula" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <!-- -->                      
                     
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>