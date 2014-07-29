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
	 

		$chars = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
		//print_r($chars);
		//
		
	}

	public function test_preg_replace () 	{
		//first test , preg_replace can do what str_replace can do .
		$subject = "aa-bb-cc-dd";
		$search = array('a', 'b', 'c');
		$replace = array('A', 'B', 'C');
		$ret = str_replace($search, $replace, $subject);
		$this->assertEquals('AA-BB-CC-dd',$ret);
		
		//second test.
		$search = '/-/';	//here , you should add forward slash on both sides of the string.
		$replace = '#';
		$ret = preg_replace($search, $replace, $subject);

		$this->expectOutputString ('aa#bb#cc#dd');
		print $ret;
 
	}

	public function test_preg_match_all () {
		$subject =<<<END
		<a class="class1">www.baidu.com</a>
		<a class="class1">www.google.com</a>
		<a class="class1">www.bing.com</a>
END;
		$pattern ='/\<a class="class1"\>(\w.*?)\<\/a\>/';
		preg_match_all($pattern, $subject, $matches);
		
		$arr = array(
			'www.baidu.com',
			'www.google.com',
			'www.bing.com'
			);

		$this->assertEquals($arr,$matches[1]);
		

	}

	public function test_preg_match () {
		$pattern = '@^(?:http://)?([^/]+)@i';
		$subject = "http://www.php.net/index.html";
		preg_match($pattern, $subject, $matches);

		//print_r($matches);
		//http://www.php.net 	all
		//www.php.net 			only the sub regex.
		//here, the first parentheses is not contained in the $matches.
		//
		
		$pattern = '#(^[a-zA-Z_.-]+)@([a-zA-Z_]+)\.(?:[a-zA-Z]{2,4}$)#i';
		$subject = 'jeff@nowhere.com';
		preg_match($pattern, $subject, $matches);

		//print_r($matches);

	}
	
}
?>
