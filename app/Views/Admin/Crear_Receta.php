<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 600px; margin: 40px auto; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h2>Agregar Nueva Receta</h2>

    <form action="<?php echo BASE_URL; ?>recetas/guardar" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Título de la Receta:</label>
            <input type="text" name="titulo" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Ingredientes:</label>
            <textarea name="ingredientes" rows="4" placeholder="Ej: 1 cucharada de miel, 2 gotas de aceite..." required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Preparación y Aplicación:</label>
            <textarea name="preparacion" rows="5" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Imagen destacada:</label>
            <input type="file" name="imagen" accept="image/*" style="width: 100%;">
        </div>

        <button type="submit" style="width: 100%; background: #28a745; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">Guardar Receta</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>