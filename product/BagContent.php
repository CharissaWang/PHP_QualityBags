<?php
/**
 * Created by PhpStorm.
 * User: Chong Wang
 * Date: 13/06/17
 * Time: 09:48
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');

$business = new Business();

if (isset($_GET['category']))
{
    $categoryID = $_GET['category'];
    if ($categoryID == 'All')
    {
        $category = 'All';
    }
    else
    {
        $category = $business->getCategoryName($categoryID);
    }
}
else
{
    $categoryID = 'All';
    $category = 'All';
}

?>
<h3> <?php echo $category;?> Bags</h3>
<?php
$pageSize = 8;
$pageNo = 0;
$offset = 0;
$pageCount = 1;

if (isset($_GET['pageNo']))
{
    $pageNo = (int)$_GET['pageNo'];
    $offset = ($pageNo - 1) * $pageSize;
}

$counter = $business->getBagsQuantityByCategory($categoryID);
$bags = $business->getBagsByCategory($categoryID, $offset, $pageSize);
while ($bag = $bags->fetch_assoc())
{
    $bagID = $bag['BagID'];
    $bagName = $bag['BagName'];
    $categoryName = $business->getCategoryName($bag['CategoryID']);
    $price = $bag['Price'];
    $imagePath = $bag['ImagePath'];
    include ('BagItem.php');
}

if($counter % $pageSize == 0)
{
    $pageCount = $counter / $pageSize;
}
else
{
    $pageCount = $counter / $pageSize + 1;
}

if ($pageCount > 1)
{
    $pageURL = dirname($_SERVER['REQUEST_URI']).'/Product.php?category='.$categoryID.'&pageNo=';
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
<div class="put_center col-md-12"><ul class="pagination" id="lstPage"><?php echo join('', $pageList);?></ul></div>


