<?php 
// Definir la variable $heading_text antes de incluir el archivo de cabecera
$heading_text = isset($shoe_id) ? 'Editar Zapato' : 'Agregar Zapato';
include '../view/header.php'; 
?>
<main>
    <h1> Admin - <?php echo $heading_text; ?> </h1>
    <form action="index.php" method="post" id="add_edit_shoe_form">
        <?php if (isset($shoe_id)) : ?>
            <input type="hidden" name="action" value="update_shoe" />
            <input type="hidden" name="shoe_id" value="<?php echo $shoe_id; ?>" />
        <?php else: ?> 
            <input type="hidden" name="action" value="add_shoe" /> 
        <?php endif; ?> 
        <input type="hidden" name="brand_id" value="<?php echo $shoe['brandID'] ?? ''; ?>" />

        <label>Marca:</label> 
        <select name="brand_id">
            <?php foreach ($brands as $brand) : ?>
                <option value="<?php echo $brand['brandID']; ?>" 
                        <?php echo ($brand['brandID'] == ($shoe['brandID'] ?? '')) ? 'selected' : ''; ?>>
                    <?php echo $brand['brandName']; ?>
                </option>
            <?php endforeach; ?>
        </select> <br>

        <label>Codigo:</label>
        <input type="text" name="code" value="<?php echo $shoe['shoeCode'] ?? ''; ?>" required />
        <br>

        <label>Modelo:</label>
        <input type="text" name="name" value="<?php echo $shoe['shoeName'] ?? ''; ?>" required />
        <br>

        <label>Precio:</label>
        <input type="text" name="price" value="<?php echo $shoe['listPrice'] ?? ''; ?>" required />
        <br>

        <label>Cantidad en Stock:</label>
        <input type="number" name="quantity" value="<?php echo $shoe['quantity_in_stock'] ?? ''; ?>" required />
        <br>

        <label>&nbsp;</label>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
    </form>
</main>
<?php include '../view/footer.php'; ?>
