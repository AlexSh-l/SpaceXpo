<?php
include('pageidentifier.php');
$page = Identifier();
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}
array_push($_SESSION['history'], $_SERVER['REQUEST_URI']);
//$_SESSION['history']=$page;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SpaceXpo</title>
    <link rel="stylesheet" type="text/css" href="styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php include($page . '.php'); ?>
</html>
