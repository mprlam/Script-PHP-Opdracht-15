<?php require "partials/header.php" ?>
<?php require "partials/nav.php" ?>
<main>
    <form id="product-form" method="POST">
        <p>Product toevoegen:</p>
        <p>
            Naam:
            <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">
        </p>
        <p>
            Hoeveelheid:
            <input type="number" name="quantity" value="<?= $_POST['quantity'] ?? '' ?>"/>
        </p>
        <p>
            Prijs:
            <input type="number" step="0.01" name="price" value="<?= $_POST['price'] ?? '' ?>"/>
        </p>
        <?php if(isset($errors)) :?>
            <?php foreach($errors as $error) : ?>
                <p class="error"><?= $error ?></p>
            <?php endforeach ?>
        <?php endif?>
        <button type="submit">Toevoegen/Bewerken</button>
        <button type="reset">Test</button>
    </form>
</main>
<?php require "partials/footer.php" ?>