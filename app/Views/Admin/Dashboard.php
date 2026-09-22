<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Panel de Administración</h1>

<?php if (isset($_SESSION['exito'])): ?>
    <div class="alert alert-success"><?php echo $_SESSION['exito']; unset($_SESSION['exito']); ?></div>
<?php endif; ?>

<!-- Gestión de Productos -->
<div style="margin-top:30px;">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2>Gestión de Productos</h2>
        <a href="<?php echo BASE_URL; ?>admin/crearProducto" class="btn btn-primary">+ Nuevo Producto</a>
    </div>
    <table class="table-admin">
        <thead>
            <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?php echo $p['id']; ?></td>
                    <td><?php echo htmlspecialchars($p['nombre']); ?></td>
                    <td>$<?php echo number_format($p['precio'], 2); ?></td>
                    <td>
                        <a href="<?php echo BASE_URL . 'admin/eliminarProducto/' . $p['id']; ?>" class="btn-sm btn-delete" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Gestión de Recetas -->
<div style="margin-top:40px;">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2>Gestión de Recetas</h2>
        <a href="<?php echo BASE_URL; ?>admin/crearReceta" class="btn btn-primary">+ Nueva Receta</a>
    </div>
    <table class="table-admin">
        <thead>
            <tr><th>ID</th><th>Título</th><th>Tiempo</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            <?php foreach ($recetas as $r): ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo htmlspecialchars($r['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($r['tiempo_preparacion']); ?></td>
                    <td>
                        <a href="<?php echo BASE_URL . 'admin/eliminarReceta/' . $r['id']; ?>" class="btn-sm btn-delete" onclick="return confirm('¿Eliminar receta?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Gestión de Consejos -->
<div style="margin-top:40px;">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2>Gestión de Consejos</h2>
        <a href="<?php echo BASE_URL; ?>admin/crearConsejo" class="btn btn-primary">+ Nuevo Consejo</a>
    </div>
    <table class="table-admin">
        <thead>
            <tr><th>ID</th><th>Título</th><th>Categoría</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            <?php foreach ($consejos as $c): ?>
                <tr>
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo htmlspecialchars($c['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($c['categoria']); ?></td>
                    <td>
                        <a href="<?php echo BASE_URL . 'admin/eliminarConsejo/' . $c['id']; ?>" class="btn-sm btn-delete" onclick="return confirm('¿Eliminar consejo?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>