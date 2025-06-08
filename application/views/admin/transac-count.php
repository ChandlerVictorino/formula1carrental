<?php

$servername = "sql12.freesqldatabase.com";
$uname = "sql12783490";
$pass = "vyXWKG9dEy";
$db = "sql12783490";

$conn = mysqli_connect($servername, $uname, $pass, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT SUM(transaction_price) AS total FROM transaction";
$amountsum = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row_amountsum = mysqli_fetch_assoc($amountsum);

echo $row_amountsum['total'];
?>
