<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 1000px; margin: 30px auto; padding: 0 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Recetas Naturales</h2>
        <a href="<?php echo BASE_URL; ?>recetas/crear" style="padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">+ Nueva Receta</a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
        <?php foreach ($recetas as $receta): ?>
            <div style="background: white; border-radius: 8px; padding: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <img src="<?php echo BASE_URL; ?>Uploads/<?php echo $receta['imagen']; ?>" alt="<?php echo htmlspecialchars($receta['titulo']); ?>" style="width: 100%; height: 180px; object-fit: cover; border-radius: 5px; margin-bottom: 10px;">
                    <h3><?php echo htmlspecialchars($receta['titulo']); ?></h3>
                    <p style="color: #666; font-size: 0.9rem;"><?php echo substr(htmlspecialchars($receta['preparacion']), 0, 90) . '...'; ?></p>
                </div>
                <div style="margin-top: 15px; display: flex; flex-direction: column; gap: 8px;">
                    <a href="<?php echo BASE_URL; ?>recetas/detalles/<?php echo $receta['id']; ?>" style="text-align: center; background: #17a2b8; color: white; padding: 6px; border-radius: 4px; text-decoration: none;">Ver Detalle</a>
                    <div style="display: flex; gap: 8px;">
                        <a href="<?php echo BASE_URL; ?>recetas/editar/<?php echo $receta['id']; ?>" style="flex: 1; text-align: center; background: #ffc107; color: black; padding: 6px; border-radius: 4px; text-decoration: none;">Editar</a>
                        <a href="<?php echo BASE_URL; ?>recetas/eliminar/<?php echo $receta['id']; ?>" onclick="return confirm('¿Eliminar esta receta?');" style="flex: 1; text-align: center; background: #dc3545; color: white; padding: 6px; border-radius: 4px; text-decoration: none;">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>