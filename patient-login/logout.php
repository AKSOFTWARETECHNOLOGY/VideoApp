<?php session_start();
ob_start();

include "config.php";

if(isset($_SESSION['patientuserid']))
{
    unset($_SESSION['patientuserid']);
    unset($_SESSION['patientusername']);
    unset($_SESSION['patientuseremail']);
    unset($_SESSION['patientuserrole']);

    header("Location: index.php?success=1");
}
else
{
    header("Location: index.php?success=1");
}
?>