<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pharma_con = "localhost";
$database_pharma_con = "pharma";
$username_pharma_con = "root";
$password_pharma_con = "";
$pharma_con = mysql_pconnect($hostname_pharma_con, $username_pharma_con, $password_pharma_con) or trigger_error(mysql_error(),E_USER_ERROR); 
?>