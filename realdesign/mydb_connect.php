<?php
$dbc=mysqli_connect('localhost','root','','sysintg');

if (!$dbc) {
 die('Could not connect: '.mysql_error());
}

?>