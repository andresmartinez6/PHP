<?php
session_start();
$_SESSION=[];
session_destroy();
if (isset($_COOKIE["user"])){
    setcookie("user", "", time() - 3600, "/");
}
echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../index.php">';

?>