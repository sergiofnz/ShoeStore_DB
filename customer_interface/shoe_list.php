<?php include '../view/header.php'; ?>

<?php
// Ensure $orders is defined as an array if not set
if (!isset($orders)) {
    $orders = [];
}
?>

<main class="shoe-main">
    <aside class="shoe-aside">
        <h1 class="brands-title">Marcas</h1>
        <nav class="brands-nav">
            <ul class="brands-list">
                <?php foreach ($brands as $brand) : ?>
                <li class="brand-item">
                    <a href="?action=list_shoes1&brand_id=<?php echo $brand['brandID']; ?>" class="brand-link">
                        <?php echo $brand['brandName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    
    <section class="shoe-section">
        <h1 class="brand-name"><?php echo $brand_name; ?></h1>
        
        <ul class="shoes-list">
            <?php foreach ($shoes as $shoe) : ?>
            <li class="shoe-item">
                <a href="?action=view_shoe&amp;shoe_id=<?php echo $shoe['shoeID']; ?>" class="shoe-link">
                    <?php echo $shoe['shoeName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        
        <?php if (count($orders) > 0) : ?>
        <h2 class="orders-title">Mis Ordenes Anteriores</h2>
        <ul class="orders-list">
            <?php foreach ($orders as $order) : ?>
            <li class="order-item">
                Ordenaste un Zapato con el ID <?php echo $order['shoeID']; ?>. 
                ID de Orden: <?php echo $order['orderID']; ?>. 
                Cantidad: <?php echo $order['item_quantity']; ?>.
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </section>
</main>

<?php include '../view/footer.php'; ?>
