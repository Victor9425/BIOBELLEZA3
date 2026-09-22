<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 400px; margin: 40px auto; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">Iniciar Sesión en Bio Belleza</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div style="background: #ffebee; color: #c62828; padding: 10px; border-radius: 4px; margin-bottom: 1rem;">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo BASE_URL; ?>auth/autenticar" method="POST">
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Correo Electrónico:</label>
            <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Contraseña:</label>
            <input type="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Ingresar</button>
    </form>

    <p style="margin-top: 15px; text-align: center;">
        ¿No tienes cuenta? <a href="<?php echo BASE_URL; ?>registro">Regístrate aquí</a>
    </p>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>