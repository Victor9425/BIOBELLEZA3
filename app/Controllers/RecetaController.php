<?php
require_once __DIR__ . '/../Models/Recetas.php';

class RecetaController {
    private $recetaModel;

    public function __construct() {
        $this->recetaModel = new Recetas();
    }

    public function index() {
        $recetas = $this->recetaModel->obtenerTodas();
        require_once __DIR__ . '/../Views/Recetas/index.php';
    }

    public function detalles($id) {
        $receta = $this->recetaModel->obtenerPorId($id);
        if (!$receta) {
            header('Location: ' . BASE_URL . 'recetas');
            exit;
        }
        require_once __DIR__ . '/../Views/Recetas/Detalles.php';
    }

    public function crear() {
        require_once __DIR__ . '/../Views/Admin/Crear_Receta.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo']);
            $ingredientes = trim($_POST['ingredientes']);
            $preparacion = trim($_POST['preparacion']);
            $imagenNombre = 'default.jpg';

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $imagenNombre = time() . '_' . uniqid() . '.' . $ext;
                $rutaDestino = __DIR__ . '/../../public/Uploads/' . $imagenNombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
            }

            $this->recetaModel->crear($titulo, $ingredientes, $preparacion, $imagenNombre);
            header('Location: ' . BASE_URL . 'recetas');
            exit;
        }
    }

    public function editar($id) {
        $receta = $this->recetaModel->obtenerPorId($id);
        if (!$receta) {
            header('Location: ' . BASE_URL . 'recetas');
            exit;
        }
        require_once __DIR__ . '/../Views/Admin/Editar_Receta.php';
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titulo = trim($_POST['titulo']);
            $ingredientes = trim($_POST['ingredientes']);
            $preparacion = trim($_POST['preparacion']);
            $imagenNombre = null;

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $imagenNombre = time() . '_' . uniqid() . '.' . $ext;
                $rutaDestino = __DIR__ . '/../../public/Uploads/' . $imagenNombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
            }

            $this->recetaModel->actualizar($id, $titulo, $ingredientes, $preparacion, $imagenNombre);
            header('Location: ' . BASE_URL . 'recetas');
            exit;
        }
    }

    public function eliminar($id) {
        $this->recetaModel->eliminar($id);
        header('Location: ' . BASE_URL . 'recetas');
        exit;
    }
}