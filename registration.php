<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // database connection
    $conn = new mysqli('localhost', 'root', '', 'students_data');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration(firstName, middleName, lastName, sex, email, password) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstName, $middleName, $lastName, $sex, $email, $password);
        $stmt->execute();
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title></title>
</head>
<body>
    
    <h1 ><strong>WELCOME TO OUR REGISTRATION SYSTEM</strong></h1>
    <br>
    <br>
    <br>
    <div class="box1">
        <form class="form" action="conn.php" method="post">
            First Name:<input type="text" name="firstName"></br>
            </br>
            Middle Name:<input type="text" name="middleName"></br>
            </br>
            Last Name:<input type="text" name="lastName"></br>
            </br>
            Gender:<label>
                       <input type="radio" name="sex" value="m" checked> Male
               </label>
               <label>
                       <input type="radio" name="sex" value="f">Female
               </label>
            </br>
            </br>
            Enter your Email:<input type="email" name="email"></br>
            </br>
            Password:<input type="password" name="password"></br>
            </br>
            <input type="submit" name="info" value="submit"></br>
            Already a member? <a href="">LOGIN</a>
        </form>
    </div>

</body>
</html>
