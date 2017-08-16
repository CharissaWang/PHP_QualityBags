<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 15/06/17
 * Time: 21:53
 */

if(!isset($_SESSION))
{
    session_start();
}

if (isset($_POST['bagID']))
{

    $bagID = $_POST['bagID'];
    $itemExist = false;

    if (isset($_SESSION['shoppingCart']))
    {
        $arrCart = $_SESSION['shoppingCart'];
    }
    else
    {
        $arrCart = array();
    }
    if (isset($arrCart) && count($arrCart) != 0)
    {
        foreach ($arrCart as $id => $qty)
        {
            if ($id == $bagID)
            {
                $arrCart[$id]++;
                $itemExist = true;
            }
        }
    }

    if (!$itemExist)
    {
        $arrCart[$bagID] = 1;
    }

    $_SESSION['shoppingCart'] = $arrCart;
}

