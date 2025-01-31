<?php
require 'db.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    try{
        $stmt = $pdo->prepare("INSERT INTO customer_details (first_name, last_name, address, city, state, phone, email) 
        VALUES (:first_name, :last_name, :address, :city, :state, :phone, :email)");

    $stmt->execute([
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':address' => $_POST['address'],
    ':city' => $_POST['city'],
    ':state' => $_POST['state'],
    ':phone' => $_POST['phone_number'],
    ':email' => $_POST['email']
    ]);

        // Get last inserted customer ID
        $_SESSION['customer_id'] = $pdo->lastInsertId();

        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['phone'] = $_POST['phone_number'];
        $_SESSION['email'] = $_POST['email'];
    
        header("Location: second-page.php");
        exit();

    }catch(PDOException $e){
        die("Error: " . $e->getMessage());
    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/first-page.css">
    <title>Step 1</title>
</head>
<body>
    <div class="content">
        <h1>Input Forms</h1>
        <form method="post" class="first-page-form">
            First Name: <input type="text" name="first_name" required/>
            Last Name: <input type="text" name="last_name" required/>
            Address: <input type="text" name="address" required/>
            City: <input type="text" name="city" required/>
            State: <input type="text" name="state" required/>
            Phone: <input type="text" name="phone_number" required/>
            Email: <input type="email" name="email" required/>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>