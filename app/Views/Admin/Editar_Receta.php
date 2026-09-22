<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 600px; margin: 40px auto; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h2>Editar Receta</h2>

    <form action="<?php echo BASE_URL; ?>recetas/actualizar" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
        <input type="hidden" name="id" value="<?php echo $receta['id']; ?>">

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Título de la Receta:</label>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($receta['titulo']); ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Ingredientes:</label>
            <textarea name="ingredientes" rows="4" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"><?php echo htmlspecialchars($receta['ingredientes']); ?></textarea>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Preparación y Aplicación:</label>
            <textarea name="preparacion" rows="5" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"><?php echo htmlspecialchars($receta['preparacion']); ?></textarea>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Cambiar Imagen (opcional):</label>
            <input type="file" name="imagen" accept="image/*" style="width: 100%;">
        </div>

        <button type="submit" style="width: 100%; background: #007bff; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">Actualizar Receta</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>