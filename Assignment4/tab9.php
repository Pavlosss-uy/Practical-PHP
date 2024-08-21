<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php");?>

<form method="POST" action="">
    <input type="text" name="country" placeholder= "country">
    <br>
    <input type="submit" name="sumbit" value="sumbit">
</form>

<?php

    if(isset($_POST['sumbit'])){
    $country = $_POST['country'];
   
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
    $country = mysqli_real_escape_string($conn, $country);

    $sql = "SELECT * FROM customers 
            WHERE country = '$country'
            GROUP BY creditLimit DESC 
            LIMIT 3";
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

