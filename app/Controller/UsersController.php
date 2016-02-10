<?php
class UsersController extends AppController {
	public $scaffold;
	
	public function index()
	{
		$this->User->recursive = -1;
		$u = $this->User->find('all');
		$this->set('users',$u);
	}
}
