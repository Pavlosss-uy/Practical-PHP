<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php");?>

<form method="POST" action="">
    <input type="number" name="total" placeholder= "total">
    <br>
    <input type="submit" name="sumbit" value="sumbit">
</form>

<?php

    if(isset($_POST['sumbit'])){
    $total = $_POST['total'];

    // Create connection
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
    
    $total = $_POST['total'];
    
    $sql = "SELECT productName FROM products WHERE quantityInStock > ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("i", $total); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Product Name: " . $row['productName'] . "<br>";
        }
    } else {
        echo "No products found with quantity greater than $total.";
    }
    $stmt->close();
    $conn->close();
}
 include("inc/footer.php"); ?>

