<?php
require 'core.php';
$xbox = new \products\consoles\GameConsole('Microsoft', 'Xbox One', 'white', 0, 15);
$mac = new \products\laptops\Laptop('Apple', 'MacBook Air', 'silver', 80000, 'osX');
$macBlack = new \products\laptops\Laptop('Apple', 'MacBook Air', 'black', 80000, 'osX');
$stereo = new \products\stereo\StereoSystem('Bang & Olufsen', 'BeoPlay M5', 'yellow', 40000, 60, 11);
$newMac = new \products\laptops\Laptop('Apple', 'MacBook Air', 'black', 80000, 'osX');
$cart = new \controlfunctions\Cart();
$cart->putProduct($xbox, 2);
$cart->putProduct($mac, 5);
$cart->putProduct($mac, 5);
$cart->removeProduct($mac, 3);
$cart->putProduct($macBlack, 2);
$cart->putProduct($stereo, 4);
$order = new \controlfunctions\Order($cart);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h3>Счет</h3>
<div class="order">
    <?php $order->getOrder(); ?>
</div>

</body>
</html>