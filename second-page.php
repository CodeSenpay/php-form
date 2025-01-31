<?php
    require './db.php';
    session_start();

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
    <link rel="stylesheet" href="./css/second-page.css">
    <title>Step 2</title>
</head>
<body>
<div class="content">
        <h1>Input Forms</h1>
        <form method="post" class="second-page-form">
           <label>Card Type:
           <select name="card_type" required>
                <option value="Visa">Visa Card</option>
                <option value="MasterCard">MasterCard</option>
            </select>
           </label> 
           <label>
            Card Number:
            <input type="text" name="card_number" required/>
           </label>
           <label>
            Expiration Date:
            <input type="text" name="expiration_date" placeholder="MM/YY" required/>
           </label>
           <label>
            Verification Code (CVV2): <input type="text" name="cvv2" required/>
           </label>


            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>