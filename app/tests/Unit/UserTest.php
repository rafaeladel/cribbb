<?php
use Zizaco\FactoryMuff\Facade\FactoryMuff;

class UserTest extends TestCase {

	public function testValidatorInherited(){
		$user = new User();
		$user->username = "rafael";
		$user->email = "tesst@test.com";
		$user->password = "123456";
		$user->password_confirmation = "123456";
		$this->assertTrue($user->save());
		// $user->save();
	}

	/**
	* @expectedException BadMethodCallException
	*/
	public function testUsernameIsRequired(){
		// $user = new User();
		// $user->email = "rafael.adel@dada.com";
		// $user->password = "123456";
		// $user->password_confirmation = "123456";

		// $user = FactoryMuff::create('User');

		// $this->assertEquals($user->username, $user->username);
		// $this->assertEquals($user->email, $user->email);
		// $this->assertEquals($user->password, $user->password);


		// $this->assertFalse($user->save());
		// $errors = $user->errors()->all();
		// $this->assertCount(1, $errors);
		// $this->assertEquals($errors[0], 'The username field is required.');

		$test = new User();
		$test->setSalePrice('fifteen dollars');

	}
}
?>