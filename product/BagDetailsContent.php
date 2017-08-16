<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 15/06/17
 * Time: 21:05
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');

if (isset($_GET['bagID']))
{
    $bagID = $_GET['bagID'];
    $business = new Business();
    $bags = $business->getBagDetails($bagID);
    while ($bag = $bags->fetch_assoc())
    {
        $bagName = $bag['BagName'];
        $category = $bag['CategoryName'];
        $supplier = $bag['SupplierName'];
        $price = $bag['Price'];
        $description = $bag['Description'];
        $imagePath = $bag['ImagePath'];
    }
}
else
{
    echo 'Sorry, page cannot be displayed.';
    exit;
}
?>

<h2>Bag Details</h2>

<div>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            ID
        </dt>
        <dd>
            <p><?php echo $bagID;?></p>
        </dd>
        <dt>
            Name
        </dt>
        <dd>
            <p><?php echo $bagName;?></p>
        </dd>
        <dt>
            Category
        </dt>
        <dd>
            <p><?php echo $category;?></p>
        </dd>
        </dd>
        <dt>
            Description
        </dt>
        <dd>
            <p><?php echo $description;?></p>
        </dd>
        <dt>
            Price
        </dt>
        <dd>
            <p>$ <?php echo $price;?></p>
        </dd>
        <dt>
            Image
        </dt>
        <dd>
            <img src="<?php echo $imagePath;?>" class="item-image img-responsive" alt="<?php echo $bagName;?>">
        </dd>
    </dl>
</div>
<div>
    <a class="btn btn-default" href="http://dochyper.unitec.ac.nz/wangc95/php_assignment/product/Product.php?category=All">Back to List</a>
</div>

