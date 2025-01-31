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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Step 1</title>
</head>

<body>
    <div class="custom-container">
        <h1 class="text-center mb-4">Customer Information Form</h1>
        <form method="post" class="first-page-form">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Enter your first name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter your last name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" required placeholder="Enter your address"></textarea>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required placeholder="Enter your city">
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" required placeholder="Enter your state">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color: #f0ab0c; border-color: #f0ab0c;">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
