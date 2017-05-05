<?php 

    require('clases/conexion.php');

    $id=0;

    if(!empty($_GET['id'])){
        $id=$_REQUEST['id'];
    }

    

    if (!empty($_POST)) {
        
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="DELETE FROM estudiante where id=?";
        $q=$pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location:index.php");

    }


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<section class="container">
    <div class="row">
        <div class="col-md-4 off-set-4">
            <div class="group">
                <form method="post" action="delete.php?id=<?php echo $id; ?>">
                    <label>estas seguro de eliminarlo?</label>
                    <input type="submit" class="btn btn-danger" name="eliminar">
                </form>
            </div>
        </div>
        
    </div>
</section>

</body>
</html>