<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="form-container">
    <h2>Nuevo Consejo Ecológico</h2>
    <form action="<?php echo BASE_URL; ?>admin/guardarConsejo" method="POST" enctype="multipart/form-data">
        <div class="form-group"><label>Título:</label><input type="text" name="titulo" required></div>
        <div class="form-group"><label>Categoría (ej. Reciclaje, Hábitos, Piel):</label><input type="text" name="categoria" required></div>
        <div class="form-group"><label>Contenido del Consejo:</label><textarea name="contenido" rows="5" required></textarea></div>
        <div class="form-group"><label>Imagen:</label><input type="file" name="imagen" accept="image/*"></div>
        <button type="submit" class="btn btn-primary">Guardar Consejo</button>
        <a href="<?php echo BASE_URL; ?>admin" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>