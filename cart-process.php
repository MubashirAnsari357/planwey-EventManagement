<?php

session_start();

$proid = $_GET['proid'];
$pkgid = $_GET['pkgid'];
$qty = $_GET['qty'];

if(isset($_SESSION['procart']))
{
    $currentNo = $_SESSION['counter']+1;
    $_SESSION['procart'][$currentNo] = $proid;
    $_SESSION['counter'] = $currentNo;
}
else
{
    $procart = array();
    $_SESSION['procart'][0] = $proid;
    $_SESSION['counter'] = 0;
}

if(isset($_SESSION['pkgcart']))
{
    $currentNo = $_SESSION['counter']+1;
    $_SESSION['pkgcart'][$currentNo] = $pkgid;
    $_SESSION['qtycart'][$currentNo] = $qty;
    $_SESSION['counter'] = $currentNo;
}
else
{
    $pkgcart = array();
    $qtycart = array();
    $_SESSION['pkgcart'][0] = $pkgid;
    $_SESSION['qtycart'][0] = $qty;
    $_SESSION['counter'] = 0;
}
header("Location: cart.php");
?>