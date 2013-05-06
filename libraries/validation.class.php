<?php

/*
 * FileName: Validation.class.php Version: 1.0 Author: Keshi Chander Yadav, Tanu Trehan, Manish Date: May 03, 2013
 */
class validation {
	function validation() {
		$this->id = 0;
	}
	function add_fields($controler_name, $postVar, $authType, $error) {
		$index = $this->id ++;
		
		$this->check_vars [$index] ['data'] = $postVar;
		$this->check_vars [$index] ['authtype'] = $authType;
		$this->check_vars [$index] ['error'] = $error;
		$this->check_vars [$index] ['controler_name'] = $controler_name;
	}
	function validate() {
		$errorMsg = array ();
		$result = 1;
		for($i = 0; $i < $this->id; $i ++) {
			$errorMsg [$this->check_vars [$i] ['controler_name']] = "";
		}
		for($i = 0; $i < $this->id; $i ++) {
			$postVar = $this->check_vars [$i] ['data'];
			$authType = $this->check_vars [$i] ['authtype'];
			
			if ($this->check_vars [$i] ['error'] == "" || $this->check_vars [$i] ['error'] == " ") {
				$error = "invalid";
			} else {
				$error = $this->check_vars [$i] ['error'];
			}
			
			$pos = strpos ( $authType, '=' );
			if ($pos !== false) {
				$authType = substr ( $this->check_vars [$i] ['authtype'], 0, $pos );
				$value = substr ( $this->check_vars [$i] ['authtype'], $pos + 1 );
			}
			
			switch ($authType) {
				
				case "required" :
					{
						if (is_array ( $postVar )) {
							$count = count ( $postVar );
							
							for($j = 0; $j < $count; $j ++) {
								$length = strlen ( trim ( $postVar [$j] ) );
								if (! $length) {
									$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . " :File " . ($j + 1) . "<br>";
								}
							}
						} elseif (isset ( $postVar ) && empty ( $postVar )) {
							$length = strlen ( trim ( $postVar ) );
							if (! $length) {
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
							}
						} else {
							$length = strlen ( trim ( $postVar ) );
							if (! $length) {
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
							}
						}
						break;
					}
				
				case "alphabets" :
					{
						$regexp = '/^[A-za-z]$/';
						if (! preg_match ( $regexp, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						
						break;
					}
				
				case "alphanumeric" :
					{
						$regexp = '/^[A-za-z0-9]$/';
						if (! preg_match ( $regexp, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "numeric" :
					{
						$regexp = '/^[0-9]$/';
						if (! preg_match ( $regexp, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "maxlength" :
					{
						$length = strlen ( trim ( $postVar ) );
						if ($length > $value)
							$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						
						break;
					}
				
				case "minlength" :
					{
						$length = strlen ( trim ( $postVar ) );
						if ($length < $value && $length != 0)
							$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						
						break;
					}
				
				case "username" :
					{
						$regexp1 = '/^[0-9]$/';
						$regexp2 = '/^[a-zA-Z]+[a-zA-Z0-9\.\_]*[a-zA-Z0-9]+$/';
						if (! preg_match ( $regexp1, trim ( $postVar ) ) && ! preg_match ( $regexp2, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "script" :
					{
						$regexp1 = '/(<([^>]+)>)/i';
						if (! preg_match ( $regexp1, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "address" :
					{
						$regexp = '/^[a-zA-Z0-9]+.*$/';
						if (! preg_match ( $regexp, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "phone" :
					{
						
						if (isset ( $value )) {
							$found = strpos ( $value, ',' );
							if ($found === false) {
								$options [0] = $value;
							} else {
								$options = explode ( ",", $value );
							}
						}
						
						$patternMatch = 0;
						foreach ( $options as $opt ) {
							$type = $this->availablePhoneType ( $opt );
							foreach ( $type as $regexp ) {
								if (preg_match ( $regexp, $postVar )) {
									$patternMatch = 1;
								}
							}
							if ($patternMatch)
								break;
						}
						
						if (! $patternMatch) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "mobile" :
					{
						$regexp1 = '/^[0-9]{10}$/';
						// (+91)1111111111
						$regexp2 = '/^[\(][\+][0-9]{2}[\)][0-9]{10}$/';
						// +911111111111
						$regexp3 = '/^[\+][0-9]{2}[0-9]{10}$/';
						// 1-1111111111
						$regexp4 = '/^[0-9]{2}[\-][0-9]{10}$/';
						
						if (! preg_match ( $regexp1, trim ( $postVar ) ) && ! preg_match ( $regexp2, trim ( $postVar ) ) && ! preg_match ( $regexp3, trim ( $postVar ) ) && ! preg_match ( $regexp4, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "email" :
					{
						$regexp = '/^[A-Za-z]+((\.|\_){1}[a-zA-Z0-9]+)*@([a-zA-Z0-9]+([\-]{1}[a-zA-Z0-9]+)*[\.]{1})+[a-zA-Z]{2,4}$/';
						if (! preg_match ( $regexp, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "url" :
					{
						$regexp = '|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i';
						if (! preg_match ( $regexp, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
				
				case "date" :
					{
						$errorMsg [$this->check_vars [$i] ['controler_name']] .= $this->validateDate ( trim ( $postVar ), $value, $error );
						break;
					}
				
				case "datatype" :
					{
						if ($value == "int") {
							$result = is_int ( $postVar );
						}
						if ($value == "float") {
							$result = is_float ( $postVar );
						}
						if ($value == "bool") {
							$result = is_bool ( $postVar );
						}
						if ($value == "null") {
							$result = is_null ( $postVar );
						}
						if ($value == "numeric") {
							$result = is_numeric ( $postVar );
						}
						if (!$result) {
							$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						
						break;
					}
				
				case "custom" :
					{
						if (! preg_match ( $value, trim ( $postVar ) )) {
							$length = strlen ( trim ( $postVar ) );
							if ($length)
								$errorMsg [$this->check_vars [$i] ['controler_name']] .= $error . "<br>";
						}
						break;
					}
			}
		}
		
		return $errorMsg;
	}
	function validateDate($postVar, $value, $error) {
		$errorMsg = "";
		
		$length = strlen ( trim ( $postVar ) );
		if ($length) {
			
			if (isset ( $value )) {
				$found = strpos ( $value, ',' );
				if ($found === false) {
					$options [0] = $value;
				} else {
					$options = explode ( ",", $value );
				}
			} else {
				$options [0] = 'dd-mm-yyyy';
			}
			
			$patternMatch = 0;
			foreach ( $options as $opt ) {
				$pos1 = strpos ( $opt, '-' );
				$pos2 = strpos ( $opt, '/' );
				$pos3 = strpos ( $opt, '.' );
				
				if ($pos1 !== false) {
					if ($pos1 == 2) {
						if (strlen ( $opt ) == 8)
							$regexp = '/^[0-9]{2}[\-][0-9]{2}[\-][0-9]{2}$/';
						else
							$regexp = '/^[0-9]{2}[\-][0-9]{2}[\-][0-9]{4}$/';
					}
					if ($pos1 == 4)
						$regexp = '/^[0-9]{4}[\-][0-9]{2}[\-][0-9]{2}$/';
				}
				
				if ($pos2 !== false) {
					if ($pos2 == 2) {
						if (strlen ( $opt ) == 8)
							$regexp = '/^[0-9]{2}[\/][0-9]{2}[\/][0-9]{2}$/';
						else
							$regexp = '/^[0-9]{2}[\/][0-9]{2}[\/][0-9]{4}$/';
					}
					if ($pos2 == 4)
						$regexp = '/^[0-9]{4}[\/][0-9]{2}[\/][0-9]{2}$/';
				}
				
				if ($pos3 !== false) {
					if ($pos3 == 2) {
						if (strlen ( $opt ) == 8)
							$regexp = '/^[0-9]{2}[\.][0-9]{2}[\.][0-9]{2}$/';
						else
							$regexp = '/^[0-9]{2}[\.][0-9]{2}[\.][0-9]{4}$/';
					}
					if ($pos3 == 4)
						$regexp = '/^[0-9]{4}[\.][0-9]{2}[\.][0-9]{2}$/';
				}
				
				if (preg_match ( $regexp, $postVar )) {
					$patternMatch = 1;
					if ((isset ( $pos1 ) && $pos1 == 2) || (isset ( $pos2 ) && $pos2 == 2) || (isset ( $pos3 ) && $pos3 == 2)) {
						$str1 = substr ( $opt, 0, 2 );
						$str2 = substr ( $opt, 3, 2 );
						
						if ($str1 == 'dd') {
							$DD = substr ( $postVar, 0, 2 );
							$MM = substr ( $postVar, 3, 2 );
							$YY = substr ( $postVar, 6 );
						}
						if ($str1 == 'mm') {
							$MM = substr ( $postVar, 0, 2 );
							$DD = substr ( $postVar, 3, 2 );
							$YY = substr ( $postVar, 6 );
						}
						if ($str1 == 'yy') {
							if ($str2 == 'mm') {
								$YY = substr ( $postVar, 0, 2 );
								$MM = substr ( $postVar, 3, 2 );
								$DD = substr ( $postVar, 6 );
							} else {
								$MM = substr ( $postVar, 0, 2 );
								$DD = substr ( $postVar, 3, 2 );
								$YY = substr ( $postVar, 6 );
							}
						}
					}
					
					if ((isset ( $pos1 ) && $pos1 == 4) || (isset ( $pos2 ) && $pos2 == 4) || (isset ( $pos3 ) && $pos3 == 4)) {
						$str = substr ( $opt, 5, 2 );
						
						if ($str == 'dd') {
							$YY = substr ( $postVar, 0, 4 );
							$DD = substr ( $postVar, 6, 2 );
							$MM = substr ( $postVar, 8, 2 );
						}
						if ($str == 'mm') {
							$YY = substr ( $postVar, 0, 4 );
							$MM = substr ( $postVar, 6, 2 );
							$DD = substr ( $postVar, 6, 2 );
						}
					}
					
					if ($DD == 0 || $MM == 0 || $YY == 0) {
						$errorMsg .= "Invalid Date...<br>";
					}
					
					if ($MM <= 12) {
						switch ($MM) {
							case 4 :
							case 6 :
							case 9 :
							case 11 :
								if ($DD > 30) {
									$errorMsg .= "Selected month has maximum 30 days.<br>";
								}
							default :
								if ($DD > 31) {
									$errorMsg .= "Selected month has maximum 31 days.<br>";
								}
								break;
						}
					}
					
					if (($YY % 4) == 0) {
						if (($MM == 2) && ($DD > 29)) {
							$errorMsg .= "Invalid days in February for leap year.<br>";
						}
					} else {
						if (($MM == 2) && ($DD > 28)) {
							$errorMsg .= "Invalid days in February for non leap year.<br>";
						}
					}
				}
				
				if ($patternMatch)
					break;
			}
			
			if (! $patternMatch)
				$errorMsg .= $error . "<br>";
		}
		return $errorMsg;
	}
	function availablePhoneType($country) {
		// India
		$type [0] = '/^[0-9]{6,10}$/';
		// (+91)[022]111111
		$type [1] = '/^[\(][\+][0-9]{2}[\)][\[][0-9]{3,5}[\]][0-9]{6,10}$/';
		// +91022111111
		$type [2] = '/^[\+][0-9]{2}[0-9]{3,5}[0-9]{6,10}$/';
		// 91-111111
		$type [3] = '/^[0-9]{2}[\-][0-9]{6,10}$/';
		return $type;
	}
	
	// Helps prevent XSS attacks
	private function encodeXSString($string) {
		// Remove dead space.
		$string = trim ( $string );
		
		// Prevent potential Unicode codec problems.
		$string = utf8_decode ( $string );
		
		// HTMLize HTML-specific characters.
		$string = htmlentities ( $string, ENT_NOQUOTES );
		$string = str_replace ( "#", "&#35;", $string );
		$string = str_replace ( "%", "&#37;", $string );
		$length = intval ( $length );
		
		if ($length > 0) {
			$string = substr ( $string, 0, $length );
		}
		return $string;
	}
	
	// Helps prevent XSS attacks
	private function decodeXSString($string) {
		// Remove dead space.
		$string = trim ( $string );
		
		// Prevent potential Unicode codec problems.
		$string = utf8_decode ( $string );
		
		// HTMLize HTML-specific characters.
		$string = htmlentities ( $string, ENT_NOQUOTES );
		$string = str_replace ( "&#35;", "#", $string );
		$string = str_replace ( "&#37;", "%", $string );
		$length = intval ( $length );
		
		if ($length > 0) {
			$string = substr ( $string, 0, $length );
		}
		return $string;
	}
	
	// prevent sql injection
	// $param parameter will accept array type
	private function preventSQLInjection($string) {
		foreach ( $string as $key => $value ) {
			$value = mysql_real_escape_string ( $value );
		}
		return $string;
	}
}

?>