<!DOCTYPE html>
<html>
<head>
    <title>Zapateria Newi C.A.</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header>
        <h1>Zapateria Newi C.A.</h1>
    </header>
    <main>
        <h1>Su Carrito</h1>
        <!--<?php print_r($_SESSION); ?>
        <?php print_r($_POST); ?>-->
        <?php if (empty($_SESSION['cart13']) || 
                  count($_SESSION['cart13']) == 0) : ?>
            <p>No hay articulos en su carrito.</p>
        <?php else: ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="update">
                <table>
                    <tr id="cart_header">
                        <th class="left">
                            Articulo <input type="radio"
                            <?php if ($sort_key == 'name') : ?>
                                checked
                            <?php endif; ?>
                            name="sortkey" value="name"></th>
                        <th class="right">
                            <input type="radio"
                            <?php if ($sort_key == 'cost') : ?>
                                checked
                            <?php endif; ?>
                                name="sortkey" value="cost">
                            Costo del Articulo</th>
                        <th class="right" >
                            <input type="radio"
                            <?php if ($sort_key == 'qty') : ?>
                                checked
                            <?php endif; ?>
                                name="sortkey" value="qty">
                            Cantidad</th>
                        <th class="right">
                            <input type="radio"
                            <?php if ($sort_key == 'total') : ?>
                               checked
                            <?php endif; ?>
                                name="sortkey" value="total">
                        Total de los Articulos</th>
                    </tr>
                    <?php foreach( $_SESSION['cart13'] as $key => $item ) :
                        $cost  = number_format($item['cost'],  2);
                        $total = number_format($item['total'], 2);
                    ?>
                    <tr>
                        <td>
                            <?php echo $item['name']; ?>
                        </td>
                        <td class="right">
                            $<?php echo $cost; ?>
                        </td>
                        <td class="right">
                            <input type="text" class="cart_qty"
                                name="newqty[<?php echo $key; ?>]"
                                value="<?php echo $item['qty']; ?>">
                        </td>
                        <td class="right">
                            $<?php echo $total; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr id="cart_footer">
                        <td colspan="3"><b>Subtotal</b></td>
                        <td>$<?php echo cart\get_subtotal(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="right">
                            <input type="submit" name ="cartAction" value="Actualizar Carrito">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="right">
                            <input type="submit" name ="cartAction" value="Completar Orden">
                        </td>
                    </tr>
                </table>
                <p>Haga clic en "Actualizar Carrito" para actualizar las cantidades o el tipo
                   de secuencia en su carrito.<br> 
                   Ingrese una cantidad de 0 para remover el articulo.<br><br>
                   <em>Administrador: después de completar el pedido, actualiza la cantidad de existencias de los artículos pedidos
                   usando el formulario Agregar/Editar en la interfaz de administración.</em> 
                </p>
            </form>
        <?php endif; ?>
        <p><a href=".?action=show_add_item">Añadir Articulo</a></p>
        <p><a href=".?action=empty_cart">Vaciar Carrito</a></p>

       <!--<?php print_r(array_values($_SESSION['cart13'])) ?>
      <?php print_r($_SESSION['current_customer']) ?>-->

</main>
</body>
</html>