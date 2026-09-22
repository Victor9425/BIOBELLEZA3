<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Consejos Ecológicos</h1>

<div class="product-grid">
    <?php foreach ($consejos as $consejo): ?>
        <div class="product-card">
            <img src="<?php echo $consejo['imagen'] ? BASE_URL . 'uploads/' . $consejo['imagen'] : BASE_URL . 'css/placeholder.jpg'; ?>">
            <div class="product-info">
                <span class="badge">🌿 <?php echo htmlspecialchars($consejo['categoria']); ?></span>
                <h3><?php echo htmlspecialchars($consejo['titulo']); ?></h3>
                <p><?php echo htmlspecialchars(substr($consejo['contenido'], 0, 100)) . '...'; ?></p>
                <a href="<?php echo BASE_URL . 'consejo/detalle/' . $consejo['id']; ?>" class="btn btn-primary" style="margin-top:10px; display:inline-block;">Leer Más</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>