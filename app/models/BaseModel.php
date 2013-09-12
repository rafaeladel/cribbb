<?php
class BaseModel extends Eloquent {
	
	/**	
	* The validation rules for each model
	* @var array
	*/
	protected static $rules = [];

	/**
	 * Validation errors
	 * @var array
	 */
	public $errors = [];

	/**
	 * To remove any "_confirmation" attributes
	 * - Checked inside static::saving() event
	 * @var boolean
	 */
	protected $removeConfirmationFields = false;


	/**
	 * Validation method
	 * - Called in static::saving() before any saving
	 * - Populates $this->errors
	 * @return boolean
	 */
	public function validate(){
		$v = Validator::make($this->attributes, static::$rules);
		if($v->passes()) {
			return true;
		}

		$this->errors = $v->messages();

		return false;
	}

	/**
	 * The actual saving occures here
	 */
	public static function boot(){
		parent::boot();
		static::saving(function($model){
			if($model->validate() === true){
				if($model->removeConfirmationFields){
					foreach ($model->attributes as $key => $value) {
						if(preg_match("/[a-zA-Z]+_confirmation/", $key)){
							array_splice($model->attributes, array_search($key, array_keys($model->attributes)), 1);
						}
					}
				}
				// echo "test";
				return true;
			} else {
				return false;
			}
		});
	}
}
?>