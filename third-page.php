<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    die("Error: No data found. Please start from step 1.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 3</title>
</head>
<body>
<h2>Step 3: Review Your Information</h2>
    <h3>Personal Information</h3>
    <p><strong>First Name:</strong> <?php echo $_SESSION['first_name']; ?></p>
    <p><strong>Last Name:</strong> <?php echo $_SESSION['last_name']; ?></p>
    <p><strong>Address:</strong> <?php echo $_SESSION['address']; ?></p>
    <p><strong>City:</strong> <?php echo $_SESSION['city']; ?></p>
    <p><strong>State:</strong> <?php echo $_SESSION['state']; ?></p>
    <p><strong>Phone:</strong> <?php echo $_SESSION['phone']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>

    <h3>Payment Information</h3>
    <p><strong>Card Type:</strong> <?php echo $_SESSION['card_type']; ?></p>
    <p><strong>Card Number:</strong> **** **** **** <?php echo substr($_SESSION['card_number'], -4); ?></p>
    <p><strong>Expiration Date:</strong> <?php echo $_SESSION['expiration_date']; ?></p>

    <form action="./complete.php" method="post">
        <button type="submit">Confirm and Submit</button>
    </form>
</body>
</html>