<?PHP

/**
 * The 
 */
class CtypeTest extends PHPUnit_Framework_TestCase {

	/**
	 * ctype_alnum --- check for alphanumeric character(s).
	 */

	public function test_ctype_alnum () {

		$string0 = 'AbCd1zyz9';
		$string1 = 'foo@#bar';
		$fg0 = ctype_alnum($string0);
		$this->assertTrue($fg0);

		$fg1 = ctype_alnum($string1);
		$this->assertFalse($fg1);

	}

	/**
	 * ctype_alpha---Check for alphabetic character(s)
	 */

	public function test_ctype_alpha () {
		$string0 = 'KBacdde';
		$string1 = 'vein1992';

		$flag0 = ctype_alpha($string0);
		$this->assertTrue($flag0);

		$flag1 = ctype_alpha($string1);
		$this->assertFalse($flag1);	


	}

	/**
	 * ctype_digit---Check for numeric charcter(s)
	 */

	public function test_ctype_digit () {
		$string0 = '1000.12';
		$string1 = '199,000';
		$string2 = '1000023';
		$string3 = 42;

		$this->assertFalse(ctype_digit($string0));
		$this->assertFalse(ctype_digit($string1));		
		//Here, you may have found something not what you ever expected.
		//Once there is an character which is not a numeric, then, the function will return false.
		
		$this->assertTrue(ctype_digit($string2));

		$this->assertFalse(ctype_digit($string3)); 
		//here, you should be aware that ASCII 42 is the `*` character.
		//So, the function expects a string to be useful, so for example passing in an 
		//integer may not return the expected result. However, also note that HTML forms
		//will result in numeric strings and not integers.
		//Just using the function without doubt. 

	}


	public function test_ctype_space () {
		$str0 = "\n\r\t";
		$str1 = "\narf12";

		$this->assertTrue (ctype_space($str0));		
		$this->assertFalse (ctype_space($str1));
	}
}

?>
