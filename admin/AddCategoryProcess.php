<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 22/07/17
 * Time: 14:49
 */

if(!isset($_SESSION))
{
    session_start();
}
require_once(dirname(__FILE__) . '/../functions/business.inc.php');

$business = new Business();

$categoryName = $_POST['categoryName'];

if ($business->isCategoryExist($categoryName))
{
    echo 'Duplicate';
}
else if ($business->addCategory($categoryName))
{
    echo 'success';
}
else
{
    echo 'Creation failed';
    exit;
}


