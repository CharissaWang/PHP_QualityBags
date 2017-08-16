<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16/06/17
 * Time: 03:39
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');

$orderID = $_POST['orderID'];
$newStatus = $_POST['newStatus'];

$business = new Business();
if ($business->updateOrderStatus($orderID, $newStatus))
{
    echo 'success';
    exit;
}
else
{
    echo 'failed';
    exit;
}