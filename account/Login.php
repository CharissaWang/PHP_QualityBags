<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 14/06/17
 * Time: 02:00
 */

if(!isset($_SESSION))
{
    session_start();
}

//If the login page is not post back or redirect from other page, clear session variable 'user' to logout.
if (basename($_SERVER['HTTP_REFERER']) != basename($_SERVER['REQUEST_URI']) && !isset($_GET['from']))
{
    if (isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
        unset($_SESSION['adminList']);


        //header("Refresh:0");

    }
    if (isset($_SESSION['role']))
    {
        unset($_SESSION['role']);
    }
}
else //if the login page is post back or redirect from other page, redirect to the right page after login.
{
    if (isset($_SESSION['user']))
    {
        if (isset($_GET['from']))
        {
            $backLink = "http://$_SERVER[HTTP_HOST]".urldecode($_GET['from']);
            header("Location: $backLink");
        }
        else
        {
            header("Location: Account.php?page=Profile");
        }
    }
}
?>

<h2>Log in.</h2>
<div class="row">
    <div class="col-md-8">
        <section>
            <form id="frmMain" class="form-horizontal" method="post" action="">
            <h4>Use a local account to log in.</h4>
            <hr />
                <div class="form-group">
                    <label class="control-label col-md-2" for="txtEmail">Email</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="txtEmail" />
                    </div>
                    <div class="col-md-5 validation-alert" id="lblEmailAlert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="txtPassword">Password</label>
                    <div class="col-md-5">
                        <input type="password" class="form-control" id="txtPassword" />
                    </div>
                    <div class="col-md-5 validation-alert" id="lblPwdAlert"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-5"  id="loginFailAlert"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="button" id="btnLogin" class="btn btn-default" value="Log in" onclick="btnLogin_OnClick()" />
                        <br />
                    </div>
                </div>
                <p>
                    <a href="Account.php?page=Register">Register as a new user?</a>
                </p>
            </form>
        </section>
    </div>
    <div class="col-md-4">
        <section>
            <h4>Use another service to log in.</h4>
            <hr />
            <div>
                <p>
                    There are no external authentication services configured. See this article
                    for details on setting up this ASP.NET application to support logging in via external services.
                </p>
            </div>
        </section>
    </div>
</div>
