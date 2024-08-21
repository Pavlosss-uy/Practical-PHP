<?php include("inc/header.php"); ?>

<?php
    $products = [
        'Product 1' => [
            'price' => '300',
            'img' => 'uploads/pr1.jpg',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]
    ];
?>

<?php include("inc/navbar.php");?>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach($products as $product => $values) { ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?= $values['img']; ?>" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title"><?= $product; ?></h5>
                    <p class="card-price">$<?= $values['price']; ?></p>
                    <p class="card-text"><?= $values['desc']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?> 
</div>

<?php include("inc/footer.php"); ?>