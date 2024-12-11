<?php include '../view/header.php'; ?>
<main>
    <h1>Lista de Clientes</h1>
    <section>
        <ul>
            <?php foreach ($customers as $customer) : 
                $customer_id = $customer['customerID'];
                $url = 'http://localhost/Shoe%20Store/admin_interface/?action=view_customer&amp;customer_id=' . $customer_id;
            ?>
            <li> 
                <a href="<?php echo $url; ?>" class="customer-link">ID de Cliente: <?php echo $customer_id; ?></a>
            </li>
            <?php endforeach ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>
<style>
    .customer-link {
        color: #333;
        font-weight: bold;
        text-decoration: none;
    }
    .customer-link:hover {
        color: #007bff;
        text-decoration: underline;
    }
</style>
