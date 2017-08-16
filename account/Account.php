<?php
/**
 * Created by PhpStorm.
 * User: Chong Wang
 * Date: 12/06/17
 * Time: 23:16
 * Purpose: The entry point for register, login and profile pages.
 */

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
    $page_content = 'Profile.php';
    $page_title = 'Profile - Quality Bags';
}

include ('../structure/Main.php');