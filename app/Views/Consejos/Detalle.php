<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="form-container" style="max-width: 800px;">
    <h1><?php echo htmlspecialchars($consejo['titulo']); ?></h1>
    <span class="badge">Categoría: <?php echo htmlspecialchars($consejo['categoria']); ?></span>

    <?php if ($consejo['imagen']): ?>
        <img src="<?php echo BASE_URL . 'uploads/' . $consejo['imagen']; ?>" style="width:100%; max-height:300px; object-fit:cover; border-radius:8px; margin: 15px 0;">
    <?php endif; ?>

    <p style="margin-top:15px; font-size:1.1rem; line-height:1.7;"><?php echo nl2br(htmlspecialchars($consejo['contenido'])); ?></p>

    <br>
    <a href="<?php echo BASE_URL; ?>consejo" class="btn btn-secondary">← Volver a Consejos</a>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>