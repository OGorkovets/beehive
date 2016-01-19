<?php
require_once "blocks/functions.php";

$hname = $observdate = $duration = $mitecount = $msg = "";


if ($_POST['submit']) {
	$hname = test_input($connection, $_POST['hname']);
	$observdate = test_input($connection, $_POST['observdate']);
	$duration = test_input($connection, $_POST['duration']);
	$mitecount = test_input($connection, $_POST['mitecount']);

	$sql = "INSERT INTO observation (hive_name, observation_date, duration, mite_count) VALUES ('$hname', '$observdate', '$duration', '$mitecount')";
	$result = queryMysql($sql);

	if ($result) {
		$msg = "The data were successfully recorded!";
		//$result->close();
		$connection->close();
	}
}
?>