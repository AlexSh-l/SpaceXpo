<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}
array_push($_SESSION['history'], $_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SpaceXpo</title>
    <link rel="stylesheet" type="text/css" href="PlanetsAnimationStyle.css">
</head>
<body class="background">
<div class="sun"></div>
<div class="mercury"></div>
<div class="venus"></div>
<div class="earth"></div>
<div class="mars"></div>
<div class="jupiter"></div>
<div class="saturn"></div>
<div class="uranus"></div>
<div class="neptune"></div>
</body>
</html>