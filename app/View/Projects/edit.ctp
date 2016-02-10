<?php echo $this->Form->create(); ?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('description'); ?>
<?php echo $this->Form->input('startdate', array('type'=>'text', 'class'=>'datepicker form-control')); ?>
<?php echo $this->Form->input('enddate', array('type'=>'text', 'class'=>'datepicker form-control')); ?>
<?php echo $this->Form->input('closed'); ?>
<?php echo $this->Form->input('manager_id'); ?>
<?php echo $this->Form->input('User'); ?>
<?php echo $this->Form->end('Salva'); ?>
