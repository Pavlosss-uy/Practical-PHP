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
<?php if(isset($_POST['sumbit'])){ ?>
    <form method="POST" action="account_handle.php">
    <input type="text" name="username" placeholder= "username">
    <br>
    <input type="email" name="email" placeholder= "email">
    <br>
    <input type="password" name="password" placeholder= "password">
    <br>
    <input type="number" name="phone-number" placeholder= "phone-number">
    <br>
    <input type="text" name="facebook-acc" placeholder= "facebook-acc">
    <br>
    <input type="text" name="instagram-acc" placeholder= "instagram-acc">
    <br>
    <input type="text" name="x-acc" placeholder= "x-acc">
    <br>
    <input type="submit" name="done" value="done">
</form>
<?php } else { ?>
    <form method="POST" action="account_handle.php">
    <input type="email" name="email" placeholder= "email">
    <br>
    <input type="password" name="password" placeholder= "password">
    <br>
    <input type="submit" name="sumbit" value="sumbit">
    <?php }?>


<?php include("inc/footer.php"); ?>