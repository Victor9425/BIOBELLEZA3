<?php

class Database {
    private static $conexion = null;

    public static function connect() {
        if (self::$conexion === null) {
            try {
                self::$conexion = new PDO(
                    "mysql:host=localhost;dbname=bio_belleza_db;charset=utf8",
                    "root",
                    ""
                );
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión a la base de datos: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}