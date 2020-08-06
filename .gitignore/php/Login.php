<?php
include '../DB/DB.php';
//$db = new DBVorlage("localhost", "root", "", "portfolio");
session_start();
DB::$user= "root";
DB::$dbName = "portfolio";
$typedUser = $_POST["benutzer"];
$typedPW = $_POST['password'];
$sql = "SELECT * FROM benutzer WHERE benutzername = '$typedUser'";

$result = DB::queryFirstRow($sql);
//var_dump($result);

$kundenId = $result["kundenID"];
$_SESSION["kundenID"] = $kundenId;

$userPw = $result["passwort"];
$username = $result["benutzername"];

if(isset($typedUser)
        && $typedUser == $username
	&& isset($typedPW)
	&& $typedPW == $userPw)
{
	//echo "Herzlich Willkommen ".$_POST['benutzer']."!<br/>";
    header("Location: ../index.php");
    //header("Location: session_test.php");
    //echo $_SESSION["kundenID"];
}
else
{
	header("Location: ../Welcome.php#login");
}

?>