
<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php");?>

<?php
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

$sql = "SELECT productLine,quantityOrdered * priceEach AS total FROM orderdetails JOIN products
        ON orderdetails.productCode = products.productCode
        GROUP BY quantityOrdered * priceEach DESC;
";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
 mysqli_close($conn); ?>

<table>
    <tr>
        <th>Product</th>
        <th>Total</th>
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?= $post['productLine']; ?></td>
        <td><?= $post['total']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>


<?php include("inc/footer.php"); ?>