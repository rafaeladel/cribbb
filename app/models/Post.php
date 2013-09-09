<?php
use LaravelBook\Ardent\Ardent;
class Post extends Ardent {
	protected $table = 'posts';
	public $fillable = array('body');

	public function user(){
		return $this->belongsTo('User');
	}

	public function comments(){
		return $this->hasMany('Comment');
	}

	public static $rules = array(
			'body' => 'required',
			'user_id' => 'required',
		);

	public static $factory = array(
			'body' => 'text',
			'user_id' => 'factory|User',
		);
}

?>