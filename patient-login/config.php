<?php
//error_reporting(0);
//session_start();
/*
#$con=mysql_connect('iirsi.db.12433500.hostedresource.com','iirsi','P@asS1@@34E');
$con=mysql_connect('localhost','root','');
if(!$con)
{
	mysql_error('sorry unable to connect database');
}
else
{
	mysql_select_db('iirsi',$con);
}
*/
?>
<?php

$hostname		=	"eprescription.crqgb3adznjb.ap-south-1.rds.amazonaws.com";
$username		=	"ePrescription";
$password	    =	"prescription17";
$database		=	"eprescription_new";

/* * /
	$connection	=	mysql_connect($hostname,$username,$password) or die("not Server not connected");
	$database	=	mysql_select_db($database) or die("Data base not connected");
/* */

/* */
$conn = mysqli_connect($hostname, $username, $password, $database);
if( mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
$GLOBALS['conn'] = $conn;

function mysql_query($query) {
    $conn = $GLOBALS['conn'];
    return mysqli_query($conn, $query);
}

function mysql_num_rows($exec) {
    return mysqli_num_rows($exec);
}

function mysql_fetch_array($exec) {
    return mysqli_fetch_array($exec);
}

function mysql_fetch_assoc($exec) {
    return mysqli_fetch_assoc($exec);
}

function mysql_insert_id() {
    $conn = $GLOBALS['conn'];
    return mysqli_insert_id($conn);
}

function mysql_data_seek($result,$count) {
    $conn = $GLOBALS['conn'];
    return mysqli_data_seek($result,$count);
}

function mysql_real_escape_string($string) {
    $conn = $GLOBALS['conn'];
    return mysqli_real_escape_string($conn, $string);
}
/* */
?>