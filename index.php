<?php
/**
 * Created by PhpStorm.
 * User: Chong Wang
 * Date: 12/06/17
 * Time: 22:28
 * Purpose:
 */

if(!isset($_SESSION))
{
    session_start();
}

$page_title = 'Home - Quality Bags';
$page_content = 'Home.php';

include ('structure/Main.php');
