<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php");?>


<form method="POST" action="">
    <input type="number" name="id" placeholder= "id">
    <br>
    <input type="submit" name="sumbit" value="sumbit">
</form>

<?php

    if(isset($_POST['sumbit'])){
    $id = $_POST['id'];

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

    $sql = "SELECT customers.customerName, orderdetails.orderNumber,quantityOrdered FROM orderdetails JOIN orders JOIN customers
            ON orderdetails.orderNumber = orders.orderNumber AND orders.customerNumber = customers.customerNumber
            WHERE orderdetails.orderNumber = $id 
            GROUP BY customers.creditLimit DESC;";
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

