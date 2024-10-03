<?php
require_once 'Prestable.php';
abstract class RecursoBiblioteca implements Prestable {
    public $id;
    public $titulo;
    public $autor;
    public $anioPublicacion;
    public $estado;
    public $fechaAdquisicion;
    public $tipo;

    public function __construct($datos) {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function obtenerDetallesPrestamo(){

        return $this->$tipo;
    }
        
}

// Implementar las clases Libro, Revista y DVD aquí

class Libro extends RecursoBiblioteca{
    public $isbn;

    

}

class Revista extends RecursoBiblioteca{
    public $numeroEdicion;
}

class DVD extends RecursoBiblioteca{
    public $duracion;
}

class GestorBiblioteca {
    private $recursos = [];

    public function cargarRecursos() {
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);
        
        foreach ($data as $recursoData) {
            $recurso = new RecursoBiblioteca($recursoData);
            $this->recursos[] = $recurso;
        }
        
        return $this->recursos;
    }

    // Implementar los demás métodos aquí
}