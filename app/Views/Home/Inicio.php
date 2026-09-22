<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<section class="hero" style="text-align: center; padding: 3rem 1rem; background: #e8f5e9; border-radius: 8px; margin-bottom: 2rem;">
    <h1>Bienvenido a Bio Belleza 🌱</h1>
    <p style="font-size: 1.2rem; margin-top: 0.5rem; color: #2e7d32;">Cosmética natural, cuidado sostenible de la piel y filosofía cruelty-free.</p>
    <div style="margin-top: 1.5rem;">
        <a href="<?php echo BASE_URL; ?>productos" class="btn btn-primary">Ver Productos</a>
        <a href="<?php echo BASE_URL; ?>recetas" class="btn btn-secondary">Explorar Recetas</a>
    </div>
</section>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; text-align: center;">
    <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        <h3>💄 Maquillaje Libre de Tóxicos</h3>
        <p>Encuentra productos seleccionados según tu tipo de piel y sus beneficios particulares.</p>
    </div>
    <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        <h3 style="margin-top:0;">🥣 Tratamientos Caseros</h3>
        <p>Aprende a preparar tus propias mascarillas y exfoliantes con ingredientes naturales fáciles de conseguir.</p>
    </div>
    <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        <h3 style="margin-top:0;">♻️ Estilo de Vida Eco</h3>
        <p>Adopta hábitos responsables con el medio ambiente y aprende sobre cosmética respetuosa.</p>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>