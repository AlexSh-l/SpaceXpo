<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}
array_push($_SESSION['history'], $_SERVER['REQUEST_URI']);

if (isset($_SESSION['history'])) {
    foreach ($_SESSION['history'] as $pageName) {
        echo $pageName . '<br>';
    }
} else {
    echo 'History is empty<br>';
}
?>