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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Step 3</title>
</head>
<body>
<div class="custom-container" style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center mb-4" style="font-size: 2rem; font-weight: 600; text-align: center;">Step 3: Review Your Information</h1>
    <div class="first-page-form" style="display: flex; flex-direction: column; gap: 1rem; width: 100%; padding: 20px; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h3 class="mb-3">Personal Information</h3>
        <div class="mb-3">
            <strong>First Name:</strong> <?php echo $_SESSION['first_name']; ?>
        </div>
        <div class="mb-3">
            <strong>Last Name:</strong> <?php echo $_SESSION['last_name']; ?>
        </div>
        <div class="mb-3">
            <strong>Address:</strong> <?php echo $_SESSION['address']; ?>
        </div>
        <div class="mb-3">
            <strong>City:</strong> <?php echo $_SESSION['city']; ?>
        </div>
        <div class="mb-3">
            <strong>State:</strong> <?php echo $_SESSION['state']; ?>
        </div>
        <div class="mb-3">
            <strong>Phone:</strong> <?php echo $_SESSION['phone']; ?>
        </div>
        <div class="mb-3">
            <strong>Email:</strong> <?php echo $_SESSION['email']; ?>
        </div>

        <h3 class="mb-3">Payment Information</h3>
        <div class="mb-3">
            <strong>Card Type:</strong> <?php echo $_SESSION['card_type']; ?>
        </div>
        <div class="mb-3">
            <strong>Expiration Date:</strong> <?php echo $_SESSION['expiration_date']; ?>
        </div>

        <form action="./complete.php" method="post" class="first-page-form">
            <button type="submit" class="btn btn-primary w-100" style="background-color: #f0ab0c; border-color: #f0ab0c; padding: 12px; font-size: 1.1rem; border-radius: 5px;">Confirm and Submit</button>
        </form>
    </div>
</div>
</body>
</html>