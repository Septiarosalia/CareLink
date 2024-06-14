<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Simpan URL yang diminta
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}
?>
