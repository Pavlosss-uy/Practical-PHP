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

$sql = "SELECT customerName, COUNT(orderNumber) AS numOfOrders FROM customers JOIN orders
        ON customers.customerNumber = orders.customerNumber
        GROUP BY orders.customerNumber;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>

    <div>
        <ul>
        <?php foreach($posts as $post){ ?>
            <li><?= $post['customerName']; ?></li>
                <p> <?= $post['numOfOrders']; ?></p>
            <?php } ?>
        </ul>
</div>
<?php } ?>

<?php mysqli_close($conn); ?>

<?php include("inc/footer.php"); ?>