<?php
echo "AAA";
require_once('stripe-php-5.6.0/init.php'); // not ../ because will be used in index.html
$s = Stripe\Stripe::$connectBase;
echo $s;
?>
