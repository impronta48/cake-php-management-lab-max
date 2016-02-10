<?php
class Task extends AppModel {	
	public $belongsTo = array(
		'Project',
		'User',
		
		'Parent'=>array(
		  'className'=>'Task',
		  'foreignKey'=>'task_id'
		)
	);

	public $hasMany = array(
    'Children'=>array(
      'className'=>'Task',
      'foreignKey'=>'task_id'
    )
  );
}
