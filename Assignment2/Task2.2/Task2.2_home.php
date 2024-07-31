<?php
session_start();

?>
<?php if(isset($_SESSION['errors'])){ ?>
    <div>
        <ul>
            <?php foreach($_SESSION['errors'] as $error){ ?>
                <li><?= $error; ?></li>
                <?php } ?>
        </ul>
    </div>
<?php } ?>
  
<?php
unset($_SESSION['errors']);
?>

<form method="POST" action="Task2.2_handle.php">
    <input type="number" name="price" placeholder= "price">
    <br>
    <input type="number" name="piece" placeholder= "pieces">
    <br>
    <input type="submit" name="order" value="order">
</form>
