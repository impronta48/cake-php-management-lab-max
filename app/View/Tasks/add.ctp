<h1>Aggiungi un Task</h1>
<?php echo $this->Form->create('Task', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
		'class' => 'well'
	)); ?> 

	<?php echo $this->Form->input('name') ?>
	<?php echo $this->Form->input('complete', array('class'=> null)) ?>
	<?php echo $this->Form->input('deadline', 
			array('class'=> '', 'type' => 'date', 'dateFormat' => 'DMY')) 
	?>
	<?php echo $this->Form->input('user_id', array(
								'options'=> $elenco_utenti,
								'empty' => '--- non definito---'
								)) ?>
	<?php echo $this->Form->input('project_id', array('empty' => '--- non definito---')) ?>
	<?php echo $this->Form->input('task_id', array(
								'empty' => '--- non definito---', 
								'label'=> 'Task Padre',
							)) ?>
<?php echo $this->Form->end('Salva'); ?>