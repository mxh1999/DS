<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$idErr = $pswordErr = "";
$id = $psword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["id"])) {
		$idErr = "Id cannot be empty.";
	} else {
		$id = test_input($_POST["id"]);
	}
	
	if (empty($_POST["psword"])) {
		$pswordErr = "Password cannot be empty.";
	} else {
		$psword = test_input($_POST["psword"]);
	}
}
<!DOCTYPE html>
<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> ">
	userid: <input type = "text" name = "id" value = "<?php echo $id; ?>" >
	<span class = "error"> <?php echo $idErr; ?> </span>
	<br><br>
	password: <input type = "text" name = "psword" value = "<?php echo $psword; ?>" >
	<span class = "error"> <?php echo $pswordErr; ?> </span>
	<br><br>
	<input type = "submit" name = "submit" value = "submit">
</form>