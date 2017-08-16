<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 15/06/17
 * Time: 01:27
 */

if(!isset($_SESSION))
{
    session_start();
}
require_once(dirname(__FILE__) . '/../functions/business.inc.php');

$business = new Business();

$supplierName = $_POST['supplierName'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$homePhone = $_POST['homePhone'];
$workPhone = $_POST['workPhone'];


if ($business->saveSupplier($supplierName, $email, $mobile, $homePhone, $workPhone))
{
    echo 'success';
}
else
{
    echo 'Creation failed';
    exit;
}