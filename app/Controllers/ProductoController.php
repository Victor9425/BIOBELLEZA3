<?php
require_once __DIR__ . '/../Models/Productos.php';

class ProductoController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new Productos();
    }

    // Listar productos
    public function index() {
        $productos = $this->productoModel->obtenerTodos();
        require_once __DIR__ . '/../Views/Productos/Index.php';
    }

    // Mostrar formulario de creación (para admin)
    public function crear() {
        require_once __DIR__ . '/../Views/Admin/Crear_Producto.php';
    }

    // Procesar creación
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);
            $precio = trim($_POST['precio']);
            $imagenNombre = 'default.jpg';

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $imagenNombre = time() . '_' . uniqid() . '.' . $ext;
                $rutaDestino = __DIR__ . '/../../public/Uploads/' . $imagenNombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
            }

            $this->productoModel->crear($nombre, $descripcion, $precio, $imagenNombre);
            header('Location: ' . BASE_URL . 'productos');
            exit;
        }
    }

    // Mostrar formulario de edición
    public function editar($id) {
        $producto = $this->productoModel->obtenerPorId($id);
        if (!$producto) {
            header('Location: ' . BASE_URL . 'productos');
            exit;
        }
        require_once __DIR__ . '/../Views/Admin/Editar_Producto.php';
    }

    // Procesar actualización
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);
            $precio = trim($_POST['precio']);
            $imagenNombre = null;

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $imagenNombre = time() . '_' . uniqid() . '.' . $ext;
                $rutaDestino = __DIR__ . '/../../public/Uploads/' . $imagenNombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
            }

            $this->productoModel->actualizar($id, $nombre, $descripcion, $precio, $imagenNombre);
            header('Location: ' . BASE_URL . 'productos');
            exit;
        }
    }

    // Eliminar registro
    public function eliminar($id) {
        $this->productoModel->eliminar($id);
        header('Location: ' . BASE_URL . 'productos');
        exit;
    }
}