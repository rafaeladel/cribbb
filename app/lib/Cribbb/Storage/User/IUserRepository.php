<?php
	namespace Cribbb\Storage\User;

	interface IUserRepository {
		public function all();
		public function find($id);
		public function create($input);
	}
?>