<?php
	use Cribbb\Storage\User\IUserRepository as IUserRepo;

	class UserController extends BaseController{
		public function __construct(IUserRepo $user){
			$this->user = $user;
		}

		public function Index(){
			return $this->user->all();
		}
	}
?>