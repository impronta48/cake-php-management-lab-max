<?php
class User extends AppModel {	
	public $hasMany = array('Task',
        'Resources' => array(
            'className' => 'User',
            'foreignKey' => 'manager_id',
        )
        );
    public $belongsTo = array(
        'Manager' => array(
            'className' => 'User',
            'foreignKey' => 'manager_id',
        )
    );
	public $hasAndBelongsToMany = array('Project');
	public $displayField = 'username';
}
