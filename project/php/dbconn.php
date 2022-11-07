<?php
$servername = "mssql12.unoeuro.com";
$username = "nicku_dk";
$password = "aR49Bh3D5rHy";
$my_db = "nicku_dk_db_registreringssytem";

$serverName = "mssql12.unoeuro.com\\sqlexpress, 1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"nicku_dk_db_registreringssytem", "UID"=>"nicku_dk", "PWD"=>"aR49Bh3D5rHy");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
  echo "Connection established.<br />";
} else {
  echo "Connection could not be established.<br />";
  die( print_r( sqlsrv_errors(), true));
}

/*
$stmt = sqlsrv_query( $conn, "SELECT * FROM users");

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
  echo $row['fname']." ".$row['sname']." <br />";
}


sqlsrv_free_stmt( $stmt);
*/
?>