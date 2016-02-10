<h1>Task dell'utente <a href="<?php echo $this->Html->url('/users/view/' . $u['id'])?>">
						<?php echo $u['username'] ?>
					</a>
</h1>


<?php echo $this->Form->create('Task', array(
			'url' => array('action' => 'add'), 	//Forzo questo form ad usare un'altra action
			'inputDefaults' => array(		 	//Utili per bootstrap
					'div' => 'form-group',
					'label' => false,
					'wrapInput' => false,
					'class' => 'form-control'
				),
			'class' => 'well form-inline'
	)) ?>

	<?php echo $this->Form->input('Task.name',
		array('placeholder' => '+ Aggiungi un task alla tua lista',
			  'class' => 'form-control',
			  'div' => 'col-md-10',
			  'style' => 'width: 100%'			  
		)) ?>
	<?php echo $this->Form->hidden('Task.user_id', array('value'=>$u['id'] )) ?>
	<?php echo $this->Form->submit('Aggiungi Task',
				array(
					'div' => 'form-group',
					'class' => 'btn btn-primary'
				)
	); ?>
<?php echo $this->Form->end(); ?>


<table class="table table-striped">
<tr>
	<th>Completo</th>
	<th>Descrizione Task</th>
	<th>Deadline</th>
	<th></th>
</tr>
<?php
		//Il controller mi passa una variabile $tasks perchè ho fatto $this->set('tasks'....)
		//debug($tasks);
		foreach($tasks as $t):	
?>		
		<tr>
			<td><?php if (isset($t['Task']['complete']) )
					  {
						echo $this->Form->checkbox('Task.complete',
							array('default' => $t['Task']['complete'],
								   'class'=>'finish'
								 )
							);						
					  }
				?>
			</td>
			<td><?php if (isset($t['Task']['name']) )
					  {
				?>
					<?php	echo $t['Task']['name']  ?>
					<?php if (strlen($t['Project']['name'])) : ?>
					<span class="text-muted small">
					<a href="<?php echo $this->Html->url('/projects/view/' . $t['Project']['id']) ?>">
						#<?php echo $t['Project']['name'] ?> 
					</a>
					</span>
					<?php endif; ?>
				<?php
					  }						
				?>
			</td>
			<td><?php if (isset($t['Task']['deadline']) && $t['Task']['deadline'] > 0 )
					  {
						echo $t['Task']['deadline'] ;
					  }						
				?>
			</td>
			<td>
				<a class="btn btn-xs btn-primary" href="
						<?php echo $this->Html->url('edit/' . $t['Task']['id']) ?>"
				>
					<i class="fa fa-pencil"></i>
				</a>
			</td>
		</tr>
		
<?php   endforeach; ?>	
</table>
