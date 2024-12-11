<?php include '../view/header.php'; ?>
<section class="customer-section">
    <h1 class="customer-title">Iniciar Sesión</h1>
    
    <form action="index.php" method="post" id="customer_login_form" class="customer-form">
        <input type="hidden" name="action" value="login_customer" />
        
        <label for="username" class="customer-label">Usuario</label>
        <input type="text" name="username" id="username" class="customer-input" required>
        
        <label for="password" class="customer-label">Contraseña</label>
        <input type="password" name="password" id="password" class="customer-input" required>
        
        <input type="submit" value="Iniciar Sesión" class="submit-button">
    </form>

    <p class="register-link">¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a>.</p>
</section>
<?php include '../view/footer.php'; ?>
