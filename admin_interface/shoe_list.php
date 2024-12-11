<?php include '../view/header.php'; ?>
<main>
    <h1>Lista de Zapatos</h1>
    <aside>
        <h2>Marcas</h2>
        <nav>
        <ul>
        <?php foreach ($brands as $brand) : ?>
            <li>
            <a href="?brand_id=<?php echo $brand['brandID']; ?>" class="brand-link">
                <?php echo $brand['brandName']; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

    <section>
        <h2><?php echo $brand_name; ?></h2>
        <table class="shoe-table">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th class="right">Precio</th>
                <th>Cantidad</th>
                <th>Borrar</th>
                <th>Editar</th>
            </tr>
            <?php foreach ($shoes as $shoe) : ?>
            <tr>
                <td><?php echo $shoe['shoeCode']; ?></td>
                <td><?php echo $shoe['shoeName']; ?></td>
                <td class="right"><?php echo $shoe['listPrice']; ?></td>
                <td><?php echo $shoe['quantity_in_stock'] ?? 'N/A'; ?></td>
                <td>
                    <form action="." method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        <input type="hidden" name="action" value="delete_shoe">
                        <input type="hidden" name="shoe_id" value="<?php echo $shoe['shoeID']; ?>">
                        <input type="hidden" name="brand_id" value="<?php echo $shoe['brandID']; ?>">
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td> 
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="show_add_edit_form">
                        <input type="hidden" name="shoe_id" value="<?php echo $shoe['shoeID']; ?>">
                        <input type="hidden" name="brand_id" value="<?php echo $shoe['brandID']; ?>">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p>
            <a href="?action=show_add_edit_form" class="btn btn-success">Añadir Zapato</a>
            <a href="?action=customer_list" class="btn btn-info">Ver Lista de Clientes</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
<style>
    .shoe-table {
        width: 100%;
        border-collapse: collapse;
    }
    .shoe-table th, .shoe-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .shoe-table th {
        background-color: #f2f2f2;
        text-align: left;
    }
    .btn {
        padding: 5px 10px;
        text-decoration: none;
        color: white;
        border-radius: 4px;
        margin-right: 5px;
    }
    .btn-danger { background-color: #e74c3c; }
    .btn-primary { background-color: #3498db; }
    .btn-success { background-color: #2ecc71; }
    .btn-info { background-color: #5bc0de; }
</style>
