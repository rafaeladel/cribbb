<?php
use Zizaco\FactoryMuff\Facade\FactoryMuff;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/makeusers', function()
{
	$user1 = new User();
	$user1->username = "un1";
	$user1->email = "rrrr@rrrr.com";
	$user1->password = "123456";
	$user1->password_confirmation = "123456";
	$user1->save();

	$user2 = new User();
	$user2->username = "un2";
	$user2->email = "aaaa@aaa.com";
	$user2->password = "123456";
	$user2->password_confirmation = "123456";
	$user2->save();

	$user3 = new User();
	$user3->username = "un3";
	$user3->email = "nnn@nnn.com";
	$user3->password = "123456";
	$user3->password_confirmation = "123456";
	$user3->save();

	$user1->follows()->save($user2);
	$user1->follows()->save($user3);
});

Route::get('/', function(){
	$user = User::with('followers')->find(4);
	$result = "";
	foreach ($user->followers as $follower) {
		$result .= $follower->username . "<br>";
	}
	return $result;

});