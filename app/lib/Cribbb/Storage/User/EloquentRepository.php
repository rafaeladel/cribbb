<?php
	namespace Cribbb\Storage\User;
	use User;

	class EloquentRepository implements IUserRepository {
		public function all(){
			return User::all();
		}

		public function find($id){
			return User::find($id);
		}

		public function create($input){
			return User::create($input);
		}
	}
?>