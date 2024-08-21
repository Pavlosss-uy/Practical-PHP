<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php");?>


<form method="POST" action="">
    <input type="text" name="name" placeholder= "name">
    <br>
    <input type="submit" name="sumbit" value="sumbit">
</form>

<?php

    if(isset($_POST['sumbit'])){
    $name = $_POST['name'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "practice";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM customers WHERE customerName LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo '<pre>';
        print_r($posts);
        echo '</pre>';

    }

    mysqli_close($conn);
   
}
?>
 <?php include("inc/footer.php"); ?>

