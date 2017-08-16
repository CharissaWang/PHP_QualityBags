<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 15/06/17
 * Time: 17:11
 */

if(!isset($_SESSION))
{
    session_start();
}

if (isset($_GET['page']))
{
    $page_name = $_GET['page'];
    $page_content = $page_name.'.php';
    $page_title = $page_name.' - Quality Bags';
}
elseif (isset($_POST['page']))
{
    $page_name = $_POST['page'];
    $page_content = $page_name.'.php';
    $page_title = $page_name.' - Quality Bags';
}
else
{
    $page_content = 'BagManagement.php';
    $page_title = 'Bag Management - Quality Bags';
}


include ('../structure/Main.php');