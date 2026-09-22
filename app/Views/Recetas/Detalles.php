<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="form-container" style="max-width: 800px;">
    <h1><?php echo htmlspecialchars($receta['titulo']); ?></h1>
    <p><strong>Tiempo:</strong> <?php echo htmlspecialchars($receta['tiempo_preparacion']); ?></p>

    <?php if ($receta['imagen']): ?>
        <img src="<?php echo BASE_URL . 'uploads/' . $receta['imagen']; ?>" style="width:100%; max-height:300px; object-fit:cover; border-radius:8px; margin: 15px 0;">
    <?php endif; ?>

    <h3>Descripción</h3>
    <p><?php echo nl2br(htmlspecialchars($receta['descripcion'])); ?></p>

    <h3 style="margin-top:15px;">Ingredientes</h3>
    <p><?php echo nl2br(htmlspecialchars($receta['ingredientes'])); ?></p>

    <h3 style="margin-top:15px;">Instrucciones</h3>
    <p><?php echo nl2br(htmlspecialchars($receta['instrucciones'])); ?></p>

    <br>
    <a href="<?php echo BASE_URL; ?>receta" class="btn btn-secondary">← Volver a Recetas</a>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>