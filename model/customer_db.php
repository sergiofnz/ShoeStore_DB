<?php
function get_customer_by_username($username) {
    global $db;
    $query = 'SELECT * FROM customers WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function add_customer($username, $password_hash, $email, $firstName, $lastName) {
    global $db;
    $query = 'INSERT INTO customers (username, password_hash, email, firstName, lastName)
              VALUES (:username, :password_hash, :email, :firstName, :lastName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password_hash', $password_hash);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}
?>
