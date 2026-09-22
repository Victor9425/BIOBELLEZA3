<?php

class Auth {
    public static function esAdmin() {
        return isset($_SESSION['usuario_id']) && isset($_SESSION['rol_id']) && $_SESSION['rol_id'] == 1;
    }

    public static function requerirAdmin() {
        if (!self::esAdmin()) {
            $_SESSION['error'] = 'Acceso restringido. Se requieren permisos de administrador.';
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }
}