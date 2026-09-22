<?php
require_once __DIR__ . '/../config/Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function registrar($nombre, $email, $password, $rol_id = 2) {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (:nombre, :email, :password, :rol_id)");
        return $stmt->execute([
            ':nombre'   => $nombre,
            ':email'    => $email,
            ':password' => $hashPassword,
            ':rol_id'   => $rol_id
        ]);
    }

    public function obtenerPorEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }

    public function existeEmail($email) {
        $stmt = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->rowCount() > 0;
    }
}