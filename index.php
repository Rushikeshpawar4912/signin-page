<?php
$insert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "phptutorial1";
    

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $age = isset($_POST["age"]) ? $_POST["age"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $address = isset($_POST["address"]) ? $_POST["address"] : "";

    // Using prepared statement to prevent SQL injection
    $sql = "INSERT INTO rptech (name, age, gender, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sissss", $name, $age, $gender, $email, $phone, $address);
    $stmt->execute();
    $insert = true;

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a signin page for website in php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Website</h1>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your full name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="address" id="address" cols="20" rows="15" placeholder="Enter your address"></textarea>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
