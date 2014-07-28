<?PHP

/**
 * Here, do you want to know what `PCRE` means.
 * PCRE -- Perl-Compatible Regular Expressions.
 * 
 */
class PCRETest extends PHPUnit_Framework_TestCase {

	public function test_preg_split () {
		/**
		 * the regular expression means that there is one or more space or colom.
		 */
		//first
		$keywords = preg_split("/[\s,]+/", "hypertext language, programming");
		$str = implode(',', $keywords);
		$this->assertEquals('hypertext,language,programming',$str);
		//second
		$str = 'Vein Queen';

		$chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
		$chars_1 = preg_split('//', $str, -1);

		//$this->assertEquals($chars, $chars_1);
		//there are 3 space in the first chars.
	 


	}
	
}
?>
