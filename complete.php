<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    die("Error: No data found. Please start from step 1.");
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 4</title>
    <script>
        function goBackToForm() {
            window.location.href = "first-page.php"; // Redirect when button is clicked
        }
    </script>
</head>
<body style="background-color: #f9f9f9; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
    <h2 style="font-size: 2rem; font-weight: 600; color: #333; margin-bottom: 20px;">Checkout Complete</h2>
    
    <button onclick="goBackToForm()" style="background-color: #f0ab0c; border-color: #f0ab0c; padding: 12px; font-size: 1.1rem; border-radius: 5px;">Go Back to Form</button>

</body>
</html>