<?
    $transferhost = 'localhost';
	$transferdbname   = 'a0563693_transfer';
	$transferuser = 'a0563693_transfer';
	$transferpass = 'kk7f5QnC';

	$host = '217.106.107.72';
	$dbname   = 'EVE45016';
	$user = 'H45016';
	$pass = 'houstonrppass';

	$transferconnect = mysqli_connect($transferhost, $transferuser, $transferpass,$transferdbname);

	$connect = mysqli_connect($host, $user, $pass,$dbname);
?>