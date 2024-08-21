<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>

<form method="POST" action="">
    <div>
        <label for="country">Countries Names:</label>
        <select name="country" id="country">
            <option value="">--- Choose a country ---</option>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "practice";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT DISTINCT country FROM customers";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . htmlspecialchars($row['country']) . '">' . htmlspecialchars($row['country']) . '</option>';
                    }
                }

                mysqli_close($conn);
            ?>
        </select>
    </div>
    <div><input type="submit" name="submit" value="submit"></div>
</form>

<?php
if (isset($_POST['submit'])) {
    $country = $_POST['country'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $country = mysqli_real_escape_string($conn, $country);

    $sql = "SELECT * FROM customers WHERE country = '$country'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo '<pre>';
        print_r($posts);
        echo '</pre>';
    } else {
        echo "No records found.";
    }

    mysqli_close($conn);
}
?>

<?php include("inc/footer.php"); ?>