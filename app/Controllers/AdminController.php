<?php
require_once __DIR__ . '/../config/Auth.php';
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Receta.php';
require_once __DIR__ . '/../models/Consejo.php';

class AdminController {
    private $productoModel;
    private $recetaModel;
    private $consejoModel;

    public function __construct() {
        Auth::requerirAdmin();
        $this->productoModel = new Producto();
        $this->recetaModel   = new Receta();
        $this->consejoModel  = new Consejo();
    }

    public function index() {
        $productos = $this->productoModel->obtenerTodos();
        $recetas   = $this->recetaModel->obtenerTodas();
        $consejos  = $this->consejoModel->obtenerTodos();
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    // --- PRODUCTOS ---
    public function crearProducto() {
        $tiposPiel = $this->productoModel->obtenerTiposPiel();
        require_once __DIR__ . '/../views/admin/crear_producto.php';
    }

    public function guardarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = $this->subirImagen('prod_');
            $this->productoModel->crear(
                trim($_POST['nombre']),
                trim($_POST['descripcion']),
                trim($_POST['beneficios']),
                trim($_POST['ingredientes']),
                floatval($_POST['precio']),
                $imagen,
                !empty($_POST['tipo_piel_id']) ? (int)$_POST['tipo_piel_id'] : null
            );
            $_SESSION['exito'] = 'Producto agregado exitosamente.';
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function eliminarProducto($id) {
        $this->productoModel->eliminar($id);
        $_SESSION['exito'] = 'Producto eliminado.';
        header('Location: ' . BASE_URL . 'admin');
        exit;
    }

    // --- RECETAS ---
    public function crearReceta() {
        require_once __DIR__ . '/../views/admin/crear_receta.php';
    }

    public function guardarReceta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = $this->subirImagen('receta_');
            $this->recetaModel->crear(
                trim($_POST['titulo']),
                trim($_POST['descripcion']),
                trim($_POST['ingredientes']),
                trim($_POST['instrucciones']),
                trim($_POST['tiempo_preparacion']),
                $imagen
            );
            $_SESSION['exito'] = 'Receta agregada exitosamente.';
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function eliminarReceta($id) {
        $this->recetaModel->eliminar($id);
        $_SESSION['exito'] = 'Receta eliminada.';
        header('Location: ' . BASE_URL . 'admin');
        exit;
    }

    // --- CONSEJOS ---
    public function crearConsejo() {
        require_once __DIR__ . '/../views/admin/crear_consejo.php';
    }

    public function guardarConsejo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = $this->subirImagen('consejo_');
            $this->consejoModel->crear(
                trim($_POST['titulo']),
                trim($_POST['contenido']),
                trim($_POST['categoria']),
                $imagen
            );
            $_SESSION['exito'] = 'Consejo ecológico agregado.';
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function eliminarConsejo($id) {
        $this->consejoModel->eliminar($id);
        $_SESSION['exito'] = 'Consejo eliminado.';
        header('Location: ' . BASE_URL . 'admin');
        exit;
    }

    private function subirImagen($prefix) {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nombreImagen = uniqid($prefix) . '.' . strtolower($ext);
            move_uploaded_file($_FILES['imagen']['tmp_name'], __DIR__ . '/../../public/uploads/' . $nombreImagen);
            return $nombreImagen;
        }
        return null;
    }
}