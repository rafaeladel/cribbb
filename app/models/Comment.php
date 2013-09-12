<?php

class Comment extends BaseModel {
	protected $table = 'comments';
	public $fillable = array('body');

	public function post(){
		return $this->belongsTo('Post');
	}

	public static $rules = array(
		'body' => 'required',
		'post_id' => 'required',
	);

	public static $factory = array(
		'body' => 'text',
		'post_id' => 'factory|Post',
	);
}
?>