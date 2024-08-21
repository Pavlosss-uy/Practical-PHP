<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php");?>

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

<form method="POST" action="login_handle.php">
    <input type="number" name="customerNumber" placeholder= "customerNumber">
    <br>
    <input type="password" name="password" placeholder= "password">
    <br>
    <input type="submit" name="sumbit" value="sumbit">
</form>

<?php include("inc/footer.php"); ?>