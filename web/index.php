<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-grid.min.css">
    <link rel="stylesheet" href="Landing.css">
    <script src="mobileMenu.js"></script>
</head>
<body id = "transition-disabled">
<?php
$page = 'Login';
require 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['page'])) {
        $page = 'Landing';
    } else {
        $page = $_GET['page'];
    }
}
require $page . '.php';
require 'footer.php';
?>
</body>
</html>
