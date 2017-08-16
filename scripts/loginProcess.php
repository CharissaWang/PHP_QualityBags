<?php
/**
 * Created by PhpStorm.
 * User: Chong Wang
 * Date: 13/06/17
 * Time: 16:07
 * Purpose: Validate username and password to login
 */

if(!isset($_SESSION))
{
    session_start();
}
require_once (dirname(__FILE__).'/../functions/business.inc.php');

$business = new Business();
$email = $_POST['email'];
$password = $_POST['password'];

$result = $business->validateLogin($email, $password);
if ($result == 'success')
{
    $_SESSION['user'] = $email;
    if ($email == 'admin@qualitybags.co.nz')
    {
        $_SESSION['role'] = 'administrator';
    }
    else
    {
        $_SESSION['role'] = 'user';
    }
}
echo $result;