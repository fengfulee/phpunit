<?PHP
/**
 * The `StringTest` is used for testing a lot of String related features of PHP
 * Let's begin. If you are not familiar with PHPUnit, please refer to the manual
 * `http://phpunit.de/manual/current/zh_cn/index.html`
 * 
 */
class StringTest extends PHPUnit_Framework_TestCase {

	public function test_str_replace () {
		$string = "aa-bb-cc-dd";
		$search = array('a', 'b', 'c');
		$replace = array('A', 'B', 'C');
		$ret = str_replace($search, $replace, $string);
		$this->assertEquals('AA-BB-CC-dd',$ret);

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

}
?>
