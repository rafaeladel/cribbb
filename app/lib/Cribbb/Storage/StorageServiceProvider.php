<?php
	namespace Cribbb\Storage;

	use Illuminate\Support\ServiceProvider;

	class StorageServiceProvider extends ServiceProvider {
		public function register(){
			$this->app->bind('Cribbb\Storage\User\IUserRepository', 'Cribbb\Storage\User\EloquentRepository');
		}
	}
?>