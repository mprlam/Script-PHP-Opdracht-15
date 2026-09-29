<?php require "partials/header.php" ?>

<?php require "partials/nav.php" ?>
<table id="boodschappenlijst">
    <thead>
        <th>Product</th>
        <th>Prijs</th>
        <th>Hoeveelheid</th>
        <th>Subtotaal</th>
    </thead>
    <?php foreach($products as $product) :?>
    <tr>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td><?= htmlspecialchars($product['price']) ?></td>
        <td><?= htmlspecialchars($product['quantity']) ?></td>
        <td><?= htmlspecialchars($product['totalCost']) ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3">Totaal</td>
        <td><?= htmlspecialchars($totalCostAll) ?></td>
    </tr>
</table>
<?php require "partials/footer.php" ?>