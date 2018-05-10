<?php session_start();
ob_start();

include "config.php";

if(isset($_SESSION['doctoruserid']))
{
    unset($_SESSION['doctoruserid']);
    unset($_SESSION['doctorusername']);
    unset($_SESSION['doctoruseremail']);
    unset($_SESSION['doctoruserrole']);

    header("Location: index.php?success=1");
}
else
{
    header("Location: index.php?success=1");
}
?>