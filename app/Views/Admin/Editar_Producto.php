<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 500px; margin: 40px auto; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h2>Editar Producto</h2>

    <form action="<?php echo BASE_URL; ?>productos/actualizar" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Nombre del Producto:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Descripción:</label>
            <textarea name="descripcion" rows="4" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Precio ($):</label>
            <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Cambiar Imagen (opcional):</label>
            <input type="file" name="imagen" accept="image/*" style="width: 100%;">
        </div>

        <button type="submit" style="width: 100%; background: #007bff; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">Actualizar Producto</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>