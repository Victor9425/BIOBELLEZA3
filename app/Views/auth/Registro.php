<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 400px; margin: 40px auto; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">Crear Cuenta en Bio Belleza</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div style="background: #ffebee; color: #c62828; padding: 10px; border-radius: 4px; margin-bottom: 1rem;">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo BASE_URL; ?>auth/guardar" method="POST">
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Nombre Completo:</label>
            <input type="text" name="nombre" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Correo Electrónico:</label>
            <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Contraseña (Mín. 6 caracteres):</label>
            <input type="password" name="password" required minlength="6" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Registrarse</button>
    </form>

    <p style="margin-top: 15px; text-align: center;">
        ¿Ya tienes cuenta? <a href="<?php echo BASE_URL; ?>login">Inicia sesión</a>
    </p>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>