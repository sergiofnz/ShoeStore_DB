<?php
require('../model/database.php');
require('../model/shoe_db.php');
require('../model/brand_db.php');
require('../model/online_orders.php');
require('../model/customer_db.php'); // Nuevo archivo para manejar clientes

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'select_customer';
    }
}

// Casos de acción
if ($action == 'list_shoes1') {
    session_start();
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    if ($customer_id == NULL || $customer_id == FALSE) {
        $customer_id = $_SESSION['customerID'];
    }
    $_SESSION['customerID'] = $customer_id;

    $brand_id = filter_input(INPUT_GET, 'brand_id', FILTER_VALIDATE_INT);
    if ($brand_id == NULL || $brand_id == FALSE) {
        $brand_id = 1;
    }
    $brands = get_brands();
    $brand_name = get_brand_name($brand_id);
    $shoes = get_shoes_by_brand($brand_id);
    include('shoe_list.php');
} else if ($action == 'select_customer') {
    include('customer_select.php');
} else if ($action == 'login_customer') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    
    if ($username == NULL || $password == NULL) {
        $error = 'Usuario o contraseña no válidos.';
        include('../errors/error.php');
    } else {
        $customer = get_customer_by_username($username);
        if ($customer && password_verify($password, $customer['password_hash'])) {
            session_start();
            $_SESSION['customerID'] = $customer['customerID'];
            header('Location: index.php?action=list_shoes1');
        } else {
            $error = 'Inicio de sesión fallido. Verifique sus credenciales.';
            include('../errors/error.php');
        }
    }
} else if ($action == 'register_customer') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $email = filter_input(INPUT_POST, 'email');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    
    if ($username == NULL || $password == NULL || $email == NULL || $firstName == NULL || $lastName == NULL) {
        $error = 'Todos los campos obligatorios deben completarse.';
        include('../errors/error.php');
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        add_customer($username, $password_hash, $email, $firstName, $lastName);
        header('Location: index.php?action=select_customer');
    }
} else if ($action == 'view_shoe') {
    $shoe_id = filter_input(INPUT_GET, 'shoe_id', FILTER_VALIDATE_INT);
    if ($shoe_id == NULL || $shoe_id == FALSE) {
        $error = 'ID de zapato faltante o incorrecto.';
        include('../errors/error.php');
    } else {
        $brands = get_brands();
        $shoe = get_shoe($shoe_id);

        // Obtener datos del zapato
        $code = $shoe['shoeCode'];
        $name = $shoe['shoeName'];
        $list_price = $shoe['listPrice'];

        // Obtener URL de la imagen y texto alternativo
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Imagen: ' . $code . '.png';

        include('shoe_view.php');
    }
}
?>
