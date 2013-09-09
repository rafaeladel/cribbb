<?php
use Zizaco\FactoryMuff\Facade\FactoryMuff;

class CommentTest extends TestCase {
	
	public function testRequiredBody(){
		$user = FactoryMuff::create('User');
		$post = FactoryMuff::create('Post');
		$comment = FactoryMuff::create('Comment');

		// $user = new User(array(
		// 		'username' => 'rafael',
		// 		'email' => 'rere@ewe.com',
		// 		'password' => '123456',
		// 		'password_confirmation' => '123456',
		// 	));
		// $post = new Post(array('body' => 'this is test post'));
		// $comment = new Comment(array('body' => 'This is comment body'));

		$this->assertFalse($user->save());
		$errors = $user->errors()->all();
		$this->assertEquals($errors[0], 'tst');

		$user->posts()->save($post);
		$errors = $post->errors()->all();
		$this->assertCount(0, $errors);
		// $this->assertEquals($errors[0], 'tst');
		$post->comments()->save($comment);
		// $errors = $comment->errors()->all();
		$this->assertCount(0, $errors);
		// $this->assertEquals($errors[0], 'tst');
	}
}

?>