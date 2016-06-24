<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
if($_POST){
	/////////////////////////////////////
	///FIRST PARSE THE INSERTED STRING///
	/////////////////////////////////////
	$pChars = array('ا' => 'ا',	'ب' => 'ب',	'پ' => 'پ',	'ت' => 'ت',	'ث' => 'ث',	'ج' => 'ج',	'چ' => 'چ',	'ح' => 'ح',	'خ' => 'خ',	'د' => 'د',	'ذ' => 'ذ',	'ر' => 'ر',	'ز' => 'ز',	'ژ' => 'ژ',	'س' => 'س',	'ش' => 'ش',	'ص' => 'ص',	'ض' => 'ض',	'ط' => 'ط',	'ظ' => 'ظ',	'ع' => 'ع',	'غ' => 'غ',	'ف' => 'ف',	'ق' => 'ق',	'ک' => 'ک',	'گ' => 'گ',	'ل' => 'ل',	'م' => 'م',	'ن' => 'ن',	'و' => 'و',	'ه' => 'ه',	'ی' => 'ی');
	$eChars = array('a' => 'a',	'b' => 'b',	'c' => 'c',	'd' => 'd',	'e' => 'e',	'f' => 'f',	'g' => 'g',	'h' => 'h',	'i' => 'i',	'j' => 'j',	'k' => 'k',	'l' => 'l',	'm' => 'm',	'n' => 'n',	'p' => 'p',	'q' => 'q',	'r' => 'r',	's' => 's',	't' => 't',	'u' => 'u',	'v' => 'v',	'w' => 'w',	'x' => 'x',	'y' => 'y',	'z' => 'z');

	$pCharNum = 0;
	$eCharNum = 0;
	$notRec = 0;

	$string = $_POST['string'];

	$strlen = mb_strlen( $string, 'UTF-8');

	for( $i = 0; $i <= ($strlen-1); $i++ ) {
	    $char = strtolower( mb_substr( $string, $i, 1, 'UTF-8' ) );

		if( isset($pChars[$char])){
			$pCharNum++;
		}
		elseif( isset($eChars[$char])){
			$eCharNum++;
		}
		else
		{
			$notRec++;
		}
	}

	$input = array(number_format($pCharNum / $strlen, 4), number_format($eCharNum / $strlen, 4), number_format($notRec / $strlen, 4) );
	/////////////////////////////////////////////
	///MAKE ANN TO MEASURE THE LANGUAGE WEIGHT //
	/////////////////////////////////////////////
	$train_file = (dirname(__FILE__) . "/langDetector.net");
	if (!is_file($train_file))
	    die("The file langDetector.net has not been created! Please run train_model.php to generate it");

	$ann = fann_create_from_file($train_file);

	if (!$ann)
	    die("ANN could not be created");

	$calc_out = fann_run($ann, $input);
	fann_destroy($ann);

	$pPercent = $calc_out[0] * 100;
	$enPercent = $calc_out[1] * 100;
	echo "<p>Your Inserted String: {$string}</p>";
	echo "<p>CHANSE OF TO BE PERSIAN: {$pPercent} %</p>";
	echo "<p>CHANSE OF TO BE ENGLISH: {$enPercent} %</p>";
	echo "<hr />";
}
?>
<form method="post">
	<p>Enter a simple string and get the parsed value.</p>
	<p><textarea name="string" rows="10" cols="100" dir="auto"></textarea></p>
	<p><input type="submit"></p>
</form>
