<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class PostTest extends TestCase {

	public function testRelationWithUser(){
		$post = FactoryMuff::create('Post');
		$this->assertEquals($post->user_id, $post->user_id);
	}

	public function testRequiredFields(){
		$post = new Post();
		$post->body = "tetetetet";

		$this->assertFalse($post->save());
		$errors = $post->errors()->all();

		$this->assertCount(1, $errors);

	}

	public function testSavingPostToUser(){
		$user = FactoryMuff::create('User');
		$post = new Post();

		$this->assertFalse($user->posts()->save($post));

	}


}
?>