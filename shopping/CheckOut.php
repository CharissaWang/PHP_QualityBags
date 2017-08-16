<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16/06/17
 * Time: 00:24
 */


if(!isset($_SESSION))
{
    session_start();
}
require_once (dirname(__FILE__).'/../functions/business.inc.php');

$email = $_SESSION['user'];

if (isset($_SESSION['shoppingCart']) && count($_SESSION['shoppingCart']) != 0)
{
    $business = new Business();
    $total = 0.00;
    $arrCart = $_SESSION['shoppingCart'];

    foreach ($arrCart as $id => $qty)
    {
        $bags = $business->getBagByID($id);
        while ($bag = $bags->fetch_assoc())
        {
            $price = $bag['Price'];
        }

        //$price = $business->getBagPrice($bagID);
        $subtotal = (float)$price * (int)$qty;
        $total += $subtotal;
    }
    $GST = $total * 0.15;
    $grandTotal = $GST + $total;
    $status = 'waiting';


    $orderID = $business->placeOrder($email, $total, $GST, $grandTotal, $status);

    if ($orderID != 0)
    {
        foreach ($arrCart as $bagID => $qty)
        {
            $business->createOrderItem($orderID, $bagID, $qty);
        }
        unset($_SESSION['shoppingCart']);
        $result = '<h2><span class="glyphicon glyphicon-saved"></span>Thank you For Your Purchase!</h2>
                    <h4>Your order will be dispatched as soon as possible.</h4>
                   <p><a href="/wangc95/php_assignment/index.php">Back to Home</a></p>';

    }
    else
    {
        $result = '<h3><span class="glyphicon glyphicon-warning-sign"></span> Please log in to your account to place an order!</h3>
        <a class="btn btn-danger btn-lg" href="http://dochyper.unitec.ac.nz/wangc95/php_assignment/account/Account.php?page=Login">Log in</a>';

    }
}
else
{
    $result = '<p>Error: no order is found!</p>';
}
?>

<div id="result">
    <?php echo $result;?>
</div>
