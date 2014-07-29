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

	public static function showProperty ($property) {
		print "The property is " . $property;
	}

	public function introduce ($name, $age) {
		return "My name is " . $name . ", age is " . $age;
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
		call_user_func(array('T','showProperty'),'Vein');


		$my = call_user_func(array('T','introduce'), array('vein',22));
		$this->assertEquals ('My name is vein, age is 22', $my);

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
}

?>
