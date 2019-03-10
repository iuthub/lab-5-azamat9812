<?php
	$fail = 
	"";

	$name = "";
	$section = "";
	$creditNumber = "";
	$type = "";

	$hide = "";
	$textToSave = "";
	$textToShow = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["name"];
		$section = $_POST["section"];
		$creditNumber = $_POST["creditNumber"];
		$type = $_POST["cc"];
		if (strlen($name) != 0 and strlen($section) != 0 and strlen($creditNumber) != 0 and strlen($type) != 0) {
			$textToSave = $name.";".$section.";".$creditNumber.";".$type."\n";
			file_put_contents("suckers.txt", $textToSave, FILE_APPEND);
			$textToShow = file_get_contents("suckers.txt");
		} else {
			$hide = "hide";
		}
	} else {
		$hide = "hide";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		<div class="<?=$hide?>">
			<h1>Thanks, sucker!</h1>

			<p>Your information has been recorded.</p>

			<dl>
				<dt>Name</dt>
				<dd><?=$name?></dd>

				<dt>Section</dt>
				<dd><?=$section?></dd>

				<dt>Credit Card</dt>
				<dd><?=$creditNumber?> (<?=$type?>)</dd>
			</dl>

			<p>
				Here are all suckers who have submitted here:
			</p>
			<pre><?=$textToShow?></pre>
		</div>

		<div class="<?= strlen($hide) == 0 ? 'hide' : ''?>">
			<h1>Sorry</h1>
	
			<p>You didn't fill out form completely. <a href="buyagrade.html">Try again?</a></p>
		</div>
	</body>
</html>