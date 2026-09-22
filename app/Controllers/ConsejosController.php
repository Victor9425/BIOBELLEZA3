<?php
require_once __DIR__ . '/../Models/Consejos.php';

class ConsejosController {
    private $consejoModel;

    public function __construct() {
        $this->consejoModel = new Consejo(); // Singular: Consejo
    }

public function index() {
    $consejos = $this->consejoModel->obtenerTodos();
    // 'Index.php' con 'I' mayúscula o 'index.php' según corresponda
    require_once __DIR__ . '/../Views/Consejos/Index.php';
}

    public function detalle($id) {
        $consejo = $this->consejoModel->obtenerPorId($id);
        if (!$consejo) {
            header('Location: ' . BASE_URL . 'consejo');
            exit;
        }
        require_once __DIR__ . '/../Views/Consejos/Detalle.php';
    }
}