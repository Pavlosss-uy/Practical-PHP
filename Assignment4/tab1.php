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

$sql = "SELECT customerName FROM customers WHERE creditLimit > 20000";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($conn);
?>
<?php foreach($posts as $post): ?>
<ul>
  <li><?= $post['customerName']; ?></li>
</ul>
<?php endforeach; ?>

<?php include("inc/footer.php"); ?>