<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
if($_POST){
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

	print_r( number_format($pCharNum / $strlen, 4) . ' ');
	print_r( number_format($eCharNum / $strlen, 4) . ' ');
	print_r( number_format($notRec / $strlen, 4) );
	echo "<br />";
	echo ($_POST['lang'] == 'fa') ? '1 0' : '0 1';
}
?>

<form method="post">
	<p>Enter a simple string and get the parsed value.</p>
	<p><textarea name="string" rows="10" cols="100" dir="auto"></textarea></p>
	<p>Persian: <input type="radio" name="lang" value="fa" /></p>
	<p>English: <input type="radio" name="lang" value="en" /></p>
	<p><input type="submit"></p>
</form>
