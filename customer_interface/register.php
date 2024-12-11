<?php include '../view/header.php'; ?>
<section class="customer-section">
    <h1 class="customer-title">Registrarse</h1>
    
    <form action="index.php" method="post" id="customer_register_form" class="customer-form">
        <input type="hidden" name="action" value="register_customer" />
        
        <label for="username" class="customer-label">Usuario</label>
        <input type="text" name="username" id="username" class="customer-input" required>
        
        <label for="password" class="customer-label">Contraseña</label>
        <input type="password" name="password" id="password" class="customer-input" required>
        
        <label for="email" class="customer-label">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="customer-input">
        
        <label for="firstName" class="customer-label">Nombre</label>
        <input type="text" name="firstName" id="firstName" class="customer-input">
        
        <label for="lastName" class="customer-label">Apellido</label>
        <input type="text" name="lastName" id="lastName" class="customer-input">
        
        <input type="submit" value="Registrarse" class="submit-button">
    </form>
</section>
<?php include '../view/footer.php'; ?>
