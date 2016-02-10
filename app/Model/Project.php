<?php
class Project extends AppModel {
	public $hasMany = array('Task');
	public $hasAndBelongsToMany = array('User');
	public $order = "closed";
}
