<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 15/06/17
 * Time: 01:50
 */


require_once (dirname(__FILE__).'/../functions/business.inc.php');

$pageSize = 10;
$pageNo = 0;
$offset = 0;
$pageCount = 1;

if (isset($_GET['pageNo']))
{
    $pageNo = (int)$_GET['pageNo'];
    $offset = ($pageNo - 1) * $pageSize;
}

$business = new Business();

$counter = $business->getBagsQuantity();
$bags = $business->getBags($offset, $pageSize);

$bagList[] = null;
while ($bag = $bags->fetch_assoc())
{
    $supplierID = $bag['SupplierID'];
    $categoryID = $bag['CategoryID'];
    $description = $bag['Description'];
    $supplierName = $business->getSupplierName($supplierID);
    $categoryName = $business->getCategoryName($categoryID);

    $bagList[] = '<tr>';
    $bagList[] = '<td>'.$bag['BagID'].'</td>';
    $bagList[] = '<td>'.$bag['BagName'].'</td>';
    $bagList[] = '<td>'.$categoryName.'</td>';
    $bagList[] = '<td>$ '.$bag['Price'].'</td>';
    $bagList[] = '<td>'.$description.'</td>';
    $bagList[] = '<td>'.$supplierName.'</td>';
    $bagList[] = '<td><img src="'.$bag['ImagePath'].'" style="width: 100px; height: auto;" /></td>';
    $bagList[] = '</tr>';
}

$pageCount = $counter / $pageSize + 1;
$pageList[] = null;
if ($pageCount > 1)
{
    $pageURL = dirname($_SERVER['REQUEST_URI']).'/Admin.php?page=BagManagement&pageNo=';
    for ($i = 1; $i <= $pageCount; $i++)
    {
        if (!isset($_GET['pageNo']) && $i == 1)
        {
            $pageList[] = '<li class="active"><a href="'.$pageURL.$i.'"> '.$i.'</a></li>';
        }
        else
        {
            if (isset($_GET['pageNo']) && $_GET['pageNo'] == $i)
            {
                $pageList[] = '<li class="active"><a href="'.$pageURL.$i.'"> '.$i.'</a></li>';
            }
            else
            {
                $pageList[] = '<li><a href="'.$pageURL.$i.'"> '.$i.'</a></li>';
            }
        }
    }
}
?>

<h2>Bag Management</h2>


<div><input type="button" class="btn btn-default" id="btnAddBag" value="Create New" onclick="navToAddBag()" /></div>

<div>
    <table class="table">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Description</th>
            <th>Supplier</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php echo join('', $bagList);?>
        </tbody>
    </table>
</div>
<div class="put_center"><ul class="pagination" id="lstPage"><?php echo join('', $pageList);?></ul></div>