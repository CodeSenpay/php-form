<?php
    require './db.php';
    session_start();
    if (!isset($_SESSION['customer_id'])) {
        die("Error: No customer ID found. Please start from step 1.");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if (!isset($_SESSION['customer_id'])) {
            die("Error: No customer ID found. Please start from step 1.");
        }

        try{

        $stmt = $pdo->prepare("INSERT INTO payment_details (customer_id, card_type, card_number, card_exp_date, cvv2) 
        VALUES (:customer_id, :card_type, :card_number, :expiration_date, :cvv2)");

        $stmt->execute([
        ':customer_id' => $_SESSION['customer_id'],
        ':card_type' => $_POST['card_type'],
        ':card_number' => $_POST['card_number'], // Hash card number
        ':expiration_date' => $_POST['expiration_date'],
        ':cvv2' => $_POST['cvv2'], // Hash CVV
        ]);

        $_SESSION["card_type"] = $_POST["card_type"];
        $_SESSION["expiration_date"] = $_POST["expiration_date"];

        header("Location: third-page.php");
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style2.css">

    <title>Step 2</title>
</head>
<body>
<div class="container">
    <h1 class="text-center mb-4">Payment Information Form</h1>
    <form method="post" class="second-page-form">
        <div class="mb-3">
            <label for="card_type" class="form-label">Card Type</label>
            <select class="form-control" id="card_type" name="card_type" required>
                <option value="Visa">Visa Card</option>
                <option value="MasterCard">MasterCard</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="card_number" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="card_number" name="card_number" required placeholder="Enter your card number">
        </div>
        <div class="mb-3">
            <label for="expiration_date" class="form-label">Expiration Date</label>
            <input type="text" class="form-control" id="expiration_date" name="expiration_date" required placeholder="MM/YY">
        </div>
        <div class="mb-3">
            <label for="cvv2" class="form-label">Verification Code (CVV2)</label>
            <input type="text" class="form-control" id="cvv2" name="cvv2" required placeholder="Enter your CVV2">
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>