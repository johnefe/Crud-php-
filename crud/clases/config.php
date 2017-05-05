<?php
   
   abstract class configuracion{

    protected $datahost;

    protected function conectar($archivo ='configuracion.ini'){
        if(!$ajustes= parse_ini_file($archivo,true)) throw new Exception("error no se puede abrir el archivo ".$archivo.'.');

        $controlador=$ajustes["database"]["driver"];
        $servidor=$ajustes["database"]["host"];
        $puerto=$ajustes["database"]["port"];
        $basedatos=$ajustes["database"]["schema"];

        try{
            return $this->datahost =new PDO ("mysql:host=$servidor;port=$puerto;dbname=$basedatos", 
                $ajustes["database"]["username"],
                $ajustes["database"]["password"],
                array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NMAES utf8"));
        }

        catch(PDOException $evento){
            echo "error, no se puede conectar:";
        }
        
    }

   }

?>