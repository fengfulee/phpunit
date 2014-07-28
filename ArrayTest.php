<?PHP
/**
 * In order to have a good understanding of PHP's Array.
 * Here,I wrote some testcase for it.
 * 
 */

    function user_defined_array_walk (&$value, $key) {
    	static $count = 0;
    	$value = $value . $count ;
    	$count ++;
	}

class ArrayTest extends PHPUnit_Framework_TestCase {


	public function test_array_push_AND_array_pop () {
		$arr = array('Vein');
		array_push($arr, 'Oliever');
		$this->assertEquals('Oliever',$arr[1]);

		$pop = array_pop($arr);
		$this->assertEquals('Oliever', $pop);

		return $arr;
	}

	/**
	 * @depends test_array_push_AND_array_pop
	 * dependency test.
	 */
	public function test_array_shift_AND_array_unshift ($arr) {
		array_unshift($arr, 'Lee');
		$this->assertEquals('Vein',$arr[1]);

		$this->assertEquals('Lee',array_shift($arr));

	}

	/**
	 * The method is used show how the `array_values` and `array_keys` work.
	 */

	public function test_array_values_AND_array_keys () {
		$arr = array(
			'size'	=> 'XL',
			'color'	=> 'gold'
			);

		$arr_values = array_values($arr);
		$this->assertEquals(array('XL','gold'), $arr_values);

		$arr_keys = array_keys($arr);
		$this->assertEquals(array('size','color'),$arr_keys);



	}

	/**
	 * There is user_defined function at the top of the file.
	 * We here invoke the user_defined function.
	 * array_walk -- Apply a user function to every member of an array.
	 */

	public function test_array_walk () {
		$fruits = array(
			'd'	=> 'lemon',
			'a'	=> 'orange',
			'b'	=> 'banana',
			'c'	=> 'apple'
			);
		foreach ($fruits as $key => $value) {
			static $i = 0;
			$fruits_clone[$key] = $value . $i;
			$i++;
		}
		array_walk($fruits, 'user_defined_array_walk');

		$this->assertEquals($fruits_clone,$fruits);
	}
}
?>
