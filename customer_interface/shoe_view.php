<?php include '../view/header.php'; ?>
<main class="view-main">
    <aside class="view-aside">
        <h1 class="brands-title">Marcas</h1>
        <nav class="brands-nav">
            <ul class="brands-list">
                <?php foreach($brands as $brand) : ?>
                <li class="brand-item">
                    <a href="?action=list_shoes1&brand_id=<?php echo $brand['brandID']; ?>" class="brand-link">
                        <?php echo $brand['brandName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    
    <section class="view-section">
        <h1 class="shoe-name"><?php echo $name; ?></h1>
        <div class="image-container">
            <img src="<?php echo $image_filename; ?>" alt="<?php echo $image_alt; ?>" class="shoe-image" />
        </div>
        <div class="details-container">
            <p class="price"><b>Precio:</b> $<?php echo $list_price; ?></p>
            <form action="../cart" method="post" class="order-form">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="shoe_id" value="<?php echo $shoe_id; ?>">
                <input type="submit" value="Realizar Pedido" class="order-button">
            </form>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>
