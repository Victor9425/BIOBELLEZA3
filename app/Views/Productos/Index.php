<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 1000px; margin: 30px auto; padding: 0 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Catálogo de Productos</h2>
        <a href="<?php echo BASE_URL; ?>productos/crear" class="btn btn-primary" style="padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">+ Nuevo Producto</a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
        <?php foreach ($productos as $prod): ?>
            <div style="background: white; border-radius: 8px; padding: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <img src="<?php echo BASE_URL; ?>Uploads/<?php echo $prod['imagen']; ?>" alt="<?php echo $prod['nombre']; ?>" style="width: 100%; height: 180px; object-fit: cover; border-radius: 5px; margin-bottom: 10px;">
                    <h3><?php echo htmlspecialchars($prod['nombre']); ?></h3>
                    <p style="color: #666; font-size: 0.9rem;"><?php echo htmlspecialchars($prod['descripcion']); ?></p>
                    <p style="font-weight: bold; color: #2e7d32; font-size: 1.2rem;">$<?php echo number_format($prod['precio'], 2); ?></p>
                </div>
                <div style="margin-top: 15px; display: flex; gap: 10px;">
                    <a href="<?php echo BASE_URL; ?>productos/editar/<?php echo $prod['id']; ?>" style="flex: 1; text-align: center; background: #ffc107; color: black; padding: 6px; border-radius: 4px; text-decoration: none;">Editar</a>
                    <a href="<?php echo BASE_URL; ?>productos/eliminar/<?php echo $prod['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este producto?');" style="flex: 1; text-align: center; background: #dc3545; color: white; padding: 6px; border-radius: 4px; text-decoration: none;">Eliminar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>