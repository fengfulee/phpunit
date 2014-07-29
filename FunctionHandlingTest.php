<?PHP
/*
 *this is a user-defined function which has been invoked below 
 *in the call_user_func .
 */
function showName ($name) {
	if(empty($name)) {
		throw new Exception("Empty `$name`", 1);
	}

	return strtoupper($name);
}

/**
 * Here, we declare a class `T`, and at the same time, I write a static method and a 
 * dynamic method.
 * and both of them perform well in the `call_user_func`.
 */
class T {

	private $name;
	private $age;
	public static function showProperty ($property) {
		print "The property is " . $property;
	}

	public function introduce ($name, $age) {
		return "My name is " . $name . ", age is " . $age;
	}

	public function __construct ($name,$age) {
		$this->name = $name;
		$this->age = $age;
	}


	public function use_property () {
		return array(
			'name'	=>  $this->name,
			'age'	=>	$this->age
			);
	}

}

/**
 * These functions all handle various operations involved in working with functions.
 */
class FunctionHandlingTest extends PHPUnit_Framework_TestCase {

	
	/**
	 * @expectedException Exception
	 */
	public function test_call_user_func () {
		$name_upper = call_user_func('showName','Vein');
		$this->assertEquals('VEIN',$name_upper);

		$name_upper = call_user_func('showName');

		$this->expectOutputString ('The property is Vein');
		echo call_user_func(array('T','showProperty'),'Vein');


		$my = call_user_func(array('T','introduce'), array('vein',22));
		$this->assertEquals ('My name is vein, age is 22', $my);

		$t = new T('ve',10);
		$ret = call_user_func(array($t, 'use_property'));
		print($ret);
 
	}	


	/*
	 *internal: system internal functions .
	 *user: user-defined functions which we can use.
	 */
	public function test_get_defined_functions () {
 
		$functions = get_defined_functions();
		//printf('There are %d functions',count($functions));
		$this->assertCount(2,$functions);
	}

	public function test_call_user_func_array () {


		//call_user_func_array(array('T','introduce'), array('vein',22));

		$name = call_user_func_array('showName', array('vein'));
		$this->assertEquals('VEIN',$name);

		$this->expectOutputString('The property is male');
		call_user_func_array(array('T','showProperty'), array('male'));


		$t = new T('vein',22);
		$ret = call_user_func_array(array($t, 'introduce'), array('vein', 22));
 		$this->assertEquals('My name is vein, age is 22',$ret);

 		$ret = call_user_func_array(array($t, 'use_property'),array());
 		//print_r($ret);
	}

}

?>
