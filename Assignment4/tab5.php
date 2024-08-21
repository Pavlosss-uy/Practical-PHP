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

$sql = "SELECT emp.firstName AS empFirstName, emp.lastName AS empLastName, mang.firstName AS mangFirstName, mang.lastName AS mangLastName
        FROM employees AS emp JOIN employees AS mang 
        ON emp.reportsTo = mang.employeeNumber";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>

<table>
    <tr>
        <th>Employee</th>
        <th>Manager</th>
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?= $post['empFirstName'] . " " . $post['empLastName']; ?></td>
        <td><?= $post['mangFirstName'] . " " . $post['mangLastName']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php } ?>

<?php mysqli_close($conn); ?>

<?php include("inc/footer.php"); ?>