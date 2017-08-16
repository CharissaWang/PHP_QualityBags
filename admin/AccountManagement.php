<?php
/**
 * Created by PhpStorm.
 * User: Chong Wang
 * Date: 14/06/17
 * Time: 14:23
 */


require_once (dirname(__FILE__).'/../functions/business.inc.php');


$business = new Business();
$users = $business->getAllUsers();

while ($user = $users->fetch_assoc())
{

    if ($user['Enabled'])
    {
        $enabled = 'checked';
    }
    else
    {
        $enabled = '';
    }
    if($user['UserID'] != 1){
        $customerList[] = '<tr>';
        $customerList[] = '<td>'.$user['UserID'].'</td>';
        $customerList[] = '<td>'.$user['Email'].'</td>';
        $customerList[] = '<td>'.$user['LastName'].'</td>';
        $customerList[] = '<td>'.$user['FirstName'].'</td>';
        $customerList[] = '<td>'.$user['Mobile'].'</td>';
        $customerList[] = '<td>'.$user['HomePhone'].'</td>';
        $customerList[] = '<td>'.$user['WorkPhone'].'</td>';
        $customerList[] = '<td>'.$user['Address'].'</td>';
        $customerList[] = '<td><input type="checkbox" onchange="disableAccount('.$user['UserID'].', '."'".$user['Email']."'".', '.$user['Enabled'].')" '.$enabled.'></td>';
        $customerList[] = '</tr>';
    }

}

?>
<h2>Account Management</h2>
<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Home Phone</th>
            <th scope="col">Work Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Enabled</th>
        </tr>
        </thead>
        <tbody>
        <?php echo join('', $customerList);?>
        </tbody>
    </table>
</div>


