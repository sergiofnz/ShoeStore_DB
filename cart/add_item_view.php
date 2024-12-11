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
       <!-- <?php print_r($_SESSION); ?>
        selected_customer = <?php echo $_SESSION['customerID'];?>-->
        <h1>Añadir Articulo</h1>
        <form action="." method="post">
            <input type="hidden" name="action" value="add">

            <label>Nombre:</label>
            <select name="shoekey">
            <?php foreach($shoes as $key => $shoe) :
                $cost = number_format($shoe['cost'], 2);
                $name = $shoe['name'];
                $item = $name . ' ($' . $cost . ')';
            ?>
                <option value="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Cantidad:</label>
            <select name="itemqty">
            <?php for($i = 1; $i <= 10; $i++) : ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php endfor; ?>
            </select><br>

            <label>&nbsp;</label>
            <input type="submit" value="Añadir Articulo">
        </form>
        <p><a href=".?action=show_cart">Ver Carrito</a></p>    
    </main>
</body>
</html>