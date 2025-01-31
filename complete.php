<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header("Location: first-page.php");
    exit();
}
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 4</title>
</head>
<body>

</body>
</html>