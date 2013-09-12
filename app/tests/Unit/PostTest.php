<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class PostTest extends TestCase {

	// public function testRelationWithUser(){
	// 	$post = FactoryMuff::create('Post');
	// 	$this->assertEquals($post->user_id, $post->user_id);
	// }

	// public function testRequiredFields(){
	// 	$post = new Post();
	// 	$post->body = "tetetetet";

	// 	$this->assertFalse($post->save());
	// 	$errors = $post->errors()->all();

	// 	$this->assertCount(1, $errors);

	// }

	// public function testSavingPostToUser(){
	// 	$user = FactoryMuff::create('User');
	// 	$post = new Post();

	// 	$this->assertFalse($user->posts()->save($post));

	// }

	public function testValidator(){
		$post = new Post();
		$this->assertFalse($post->validate());
	}

	public function testSavingPost(){
		$post = new Post();
		$this->assertTrue($post->save());
		// $this->assertEquals($post->errors->first(), "wew");
	}
}
?>