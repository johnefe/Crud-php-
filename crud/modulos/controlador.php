<?php
    include_once('clases/estudiante.php');

    

    class controladorEstudiante{

        private $estudiante;

        public function __construct(){

            $this->estudiante=new Estudiante();
        }

        public function index(){

            $resultado= $this->estudiante->list();
            return $resultado;

        }

        public function create($cedula, $nombre, $apellidos, $nota1, $nota2, $nota3, $edad){

            $promedio=($nota1 + $nota2+ $nota3)/3;

            $this->estudiante->set('cedula', $cedula);
            $this->estudiante->set('nombre', $nombre);
            $this->estudiante->set('apellidos', $apellidos);
            $this->estudiante->set('edad', $edad);
            $this->estudiante->set('promedio', $promedio);

            $resultado=$this->estudiante->create();
            return $resultado;
        }

        public function delete($id){

            $this->estudiante->set('id',$id);
            $resultado= $this->estudiante->delete();
            return $resultado;
        }

        public function read($id){
            $this->estudiante->set('id',$id);
            $this->estudiante->read();
        }
        public function update($id){
            $this->estudiante->set('id',$id);
            $this->estudiante->read();
            $this->estudiante->update();
        }

    }
?>