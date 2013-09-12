<?php
class UserControllerTest extends TestCase{

	public function setUp(){
		parent::setUp();
		$this->mock = $this->mock("Cribbb\Storage\User\ITestRepo");
	}

	public function mock($class){
		$mock = Mockery::mock($class);
		$this->app->instance($class, $mock);
		return $mock;
	}

	public function testIndex(){
		$this->mock->shouldReceive('getCount')->andReturn(7)->once();
		$this->call('GET', 'test');
		$this->assertEquals(7, $this->mock->getCount());
	}
}
?>