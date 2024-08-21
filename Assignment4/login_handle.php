<?php

session_start();

if (isset($_POST['submit'])) {
    $customerNumber = $_POST['customerNumber'] ?? null;
    $password = $_POST['password'] ?? null;
    $errors = [];

    if ($customerNumber && $password) {
        $servername = "localhost";
        $username = "root";
        $dbPassword = ""; 
        $dbname = "practice";

        $conn = new mysqli($servername, $username, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT password FROM customers WHERE customerNumber = ?");
        $stmt->bind_param("s", $customerNumber);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['customerNumber'] = $customerNumber;  
                header("Location: home.php");
                exit();
            } else {
                $errors[] = "Invalid customerNumber or password";
            }
        } else {
            $errors[] = "Invalid customerNumber or password";
        }

        $stmt->close();
        $conn->close();
    } else {
        $errors[] = "Please fill in both fields.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: home.php");
        exit();
    }
}
?>