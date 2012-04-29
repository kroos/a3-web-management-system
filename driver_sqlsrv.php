<?php
##################################################################################################
//MSSQL SERVER AND ODBC SETTING.
//Database server.
$server = '122.255.120.139';

//your mssql username
$sa = 'sa';

//sa password
$sa_pass = 'oi62it2a2o';

//this is your ODBC that connected to your ASD database (account and charac0 table)
$db_asd = 'ASD';

##################################################################################################
//do not edit this unless u know what r u doing.
$connectionInfoASD = array("UID" => $sa, "PWD" => $sa_pass, "Database"=> $db_asd, "ReturnDatesAsStrings" => TRUE);
$conn1 = sqlsrv_connect( $server, $connectionInfoASD) or die ("<p align='center'>Fatal Error :: Cant Connect To The Database $db_asd</p><pre>".print_r( sqlsrv_errors(), true)."</pre>");


$s = "select c_id from ASD.dbo.charac0";
$r = sqlsrv_query($conn1, $s, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
if (!$r)
	{
		echo "<pre>".print_r(sqlsrv_errors(), true)."</pre>";
	}
$n = sqlsrv_num_rows($r);
if (!$n)
	{
		echo "<pre>".print_r( sqlsrv_errors(), true)."</pre>";
	}
echo "num rows = ".$n."<br />";

var_dump($n);
?>