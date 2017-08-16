<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 16/06/17
 * Time: 00:07
 */

if(!isset($_SESSION))
{
    session_start();
}

if (isset($_POST['bagID']))
{
    $bagID = $_POST['bagID'];
}

if (isset($_SESSION['shoppingCart']))
{
    $arrCart = $_SESSION['shoppingCart'];
}
else
{
    echo 'error';
    exit;
}

if ($_POST['action'] == 'changeQuantity')
{
    changeQuantity();
    exit;
}
if ($_POST['action'] == 'removeItem')
{
    removeItem();
    exit;
}
if ($_POST['action'] == 'clearCart')
{
    unset($_SESSION['shoppingCart']);
    exit;
}

function changeQuantity()
{
    global $bagID;
    global $arrCart;

    if (isset($_POST['adjust']))
    {
        $adjust = $_POST['adjust'];
    }
    else
    {
        echo 'error';
        exit;
    }

    foreach ($arrCart as $id => $qty)
    {
        if ($id == $bagID)
        {
            $newQty = $qty + (int)$adjust;
            $arrCart[$id] = $newQty;

        }
    }
    $_SESSION['shoppingCart'] = $arrCart;
    echo $newQty;

}

function removeItem()
{
    global $bagID;
    global $arrCart;

    foreach ($arrCart as $id => $qty)
    {
        if ($id == $bagID)
        {
            unset($arrCart[$id]);
        }
    }
    $_SESSION['shoppingCart'] = $arrCart;
}