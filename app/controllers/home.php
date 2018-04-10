<?php

class Home extends Controller {
	

	public function index($name = '') {
	
	$this->model('User');
	$user->name = $name;
	echo $user->name;



	}
	public function test($name = '', $name2 = '') {
		echo 'Test in home file!!' . $name . ',' . $name2;
	}

	
}