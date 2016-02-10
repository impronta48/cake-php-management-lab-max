<h1>Modifica il Task</h1>
<?php echo $this->Form->create('Task'); ?> 

	<?php echo $this->Form->hidden('id')  //DEVO PORTARMI L'ID del RECORD! ?>
	<?php echo $this->Form->input('name') ?>
    <?php echo $this->Form->input('complete', array('checkboxLabel'=> 'completo', 'label'=>'')) ?>
    <br/>
	<?php echo $this->Form->input('deadline', 
			array('class'=> '', 'type' => 'date', 'dateFormat' => 'DMY')) 
	?>
	<?php echo $this->Form->input('user_id', array('empty' => '--- non definito---')) ?>
	<?php echo $this->Form->input('project_id', array('empty' => '--- non definito---')) ?>
	<?php echo $this->Form->input('task_id', array(
								'empty' => '--- non definito---', 
								'label'=> 'Task Padre',
							)) ?>
<?php echo $this->Form->end('Salva'); ?>