<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Ardent implements UserInterface, RemindableInterface {

	protected $table = 'users';

	protected $hidden = array('password');

	public static $rules = array(
			'username' => 'required|between:4,16',
			'email' => 'required|email',
			'password' => 'required|alpha_num|min:6|confirmed',
			'password_confirmation' => 'required|alpha_num|min:6',
		);

	public static $factory = array(
			'username' => 'string',
			'email' => 'email',
			'password' => 'password',
			'password_confirmation' => 'password',
		);

	public $autoPurgeRedundantAttributes = true;

	public function posts(){
		return $this->hasMany('Post');
	}

	public function follows(){
		return $this->belongsToMany('User', 'user_follows', 'user_id', 'follows_id');
	}

	public function followers(){
		return $this->belongsToMany('User', 'user_follows', 'follows_id', 'user_id');
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


}