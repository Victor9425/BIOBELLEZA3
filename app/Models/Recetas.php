<?php
require_once __DIR__ . '/../Config/Database.php';

class Recetas {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodas() {
        $stmt = $this->db->query("SELECT * FROM recetas ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM recetas WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($titulo, $ingredientes, $preparacion, $imagen) {
        $stmt = $this->db->prepare("INSERT INTO recetas (titulo, ingredientes, preparacion, imagen) VALUES (:titulo, :ingredientes, :preparacion, :imagen)");
        return $stmt->execute([
            'titulo' => $titulo,
            'ingredientes' => $ingredientes,
            'preparacion' => $preparacion,
            'imagen' => $imagen
        ]);
    }

    public function actualizar($id, $titulo, $ingredientes, $preparacion, $imagen = null) {
        if ($imagen) {
            $stmt = $this->db->prepare("UPDATE recetas SET titulo = :titulo, ingredientes = :ingredientes, preparacion = :preparacion, imagen = :imagen WHERE id = :id");
            return $stmt->execute([
                'id' => $id,
                'titulo' => $titulo,
                'ingredientes' => $ingredientes,
                'preparacion' => $preparacion,
                'imagen' => $imagen
            ]);
        } else {
            $stmt = $this->db->prepare("UPDATE recetas SET titulo = :titulo, ingredientes = :ingredientes, preparacion = :preparacion WHERE id = :id");
            return $stmt->execute([
                'id' => $id,
                'titulo' => $titulo,
                'ingredientes' => $ingredientes,
                'preparacion' => $preparacion
            ]);
        }
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM recetas WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}