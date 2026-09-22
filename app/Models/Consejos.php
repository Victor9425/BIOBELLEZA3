<?php
require_once __DIR__ . '/../config/Database.php';

class Consejo {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("SELECT * FROM consejos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM consejos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function crear($titulo, $contenido, $categoria, $imagen) {
        $sql = "INSERT INTO consejos (titulo, contenido, categoria, imagen) VALUES (:titulo, :contenido, :categoria, :imagen)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':titulo'    => $titulo,
            ':contenido' => $contenido,
            ':categoria' => $categoria,
            ':imagen'    => $imagen
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM consejos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}