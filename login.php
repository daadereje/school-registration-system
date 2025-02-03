<?php
$firstName = "";
$password = "";
$error = "";

// Database connection
$conn = mysqli_connect("localhost", "root", "", "students_data");

if (isset($_POST['LOGIN'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Check if fields are empty
    if (empty($firstName)) {
        $error = "Username is required";
    } else if (empty($password)) {
        $error = "Password is required";
    } else {
        // Prepare SQL query
        $sql = "SELECT * FROM registration WHERE firstName='$firstName' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        // Check for query errors
        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        }

        // Check if a matching record was found
        if (mysqli_num_rows($result) == 1) {
            header('Location: home.php');
            exit();
        } else {
            $error = "Username or password is incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
    <div class="box">
        <h1>Login System</h1>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <form action="login.php" method="post">
            <input type="text" name="firstName" placeholder="Enter First Name" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" value="LOGIN" name="LOGIN">
            <a href="conn.php" style="color:#ffc107;">SIGN UP</a>
        </form>
    </div>
</body>
</html>
