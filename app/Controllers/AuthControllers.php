<?php
require_once __DIR__ . '/../Models/Usuarios.php';

class AuthControllers {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function login() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: ' . BASE_URL);
            exit;
        }
        require_once __DIR__ . '/../Views/auth/Login.php';
    }

    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = trim($_POST['password']);

            $usuario = $this->usuarioModel->obtenerPorEmail($email);

            if ($usuario && password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id']     = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_email']  = $usuario['email'];
                $_SESSION['rol_id']         = $usuario['rol_id'];

                header('Location: ' . BASE_URL);
                exit;
            } else {
                $_SESSION['error'] = 'Credenciales incorrectas.';
                header('Location: ' . BASE_URL . 'auth/login');
                exit;
            }
        }
    }

    public function registro() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: ' . BASE_URL);
            exit;
        }
        require_once __DIR__ . '/../Views/auth/Registro.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre   = trim($_POST['nombre']);
            $email    = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = trim($_POST['password']);

            if ($this->usuarioModel->existeEmail($email)) {
                $_SESSION['error'] = 'El correo electrónico ya está registrado.';
                header('Location: ' . BASE_URL . 'auth/registro');
                exit;
            }

            if ($this->usuarioModel->registrar($nombre, $email, $password)) {
                $_SESSION['exito'] = 'Registro exitoso. ¡Puedes iniciar sesión!';
                header('Location: ' . BASE_URL . 'auth/login');
                exit;
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL . 'auth/login');
        exit;
    }
}