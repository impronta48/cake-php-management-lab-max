<h1>Elenco dei Task </h1>

<?php foreach ($projects as $p) : ?>
<h2>
	<a href="<?php echo $this->Html->url('/projects/view/' . $p['Project']['id']) ?>">
		<?php echo $p['Project']['name'] ?>
	</a>

	<a href="<?php echo $this->Html->url('/projects/edit/' . $p['Project']['id']) ?>">
		<i class="fa fa-pencil"></i>
	</a>
	
</h2>

<table class="table table-striped">
<tr>
	<th width="10%">Completo</th>
	<th width="50%">Descrizione Task</th>
	<th width="10%">Assegnato a</th>
	<th width="10%">Deadline</th>
	<th width="10%"></th>
</tr>
<?php
		//Il controller mi passa una variabile $tasks perchè ho fatto $this->set('tasks'....)		
		foreach($p['Task'] as $t):	
                $extraclass= '';                        
                if ($t['complete'])
                {
                    $extraclass = ' completo';
                }                        
?>		
		<tr class="<?php echo $extraclass ?>">
			<td><?php if (isset($t['complete']) )
					  {
						echo $this->Form->checkbox('Task.complete',
							array('default' => $t['complete'],
								   'class'=>'finish ',
								   'task_id' => $t['id'], 
								 )
							);						
					  }
				?>
			</td>
			<td><?php if (isset($t['name']) )
					  {
                ?>                    
                    <?php 
                    //Metto la stellina piena o vuota a seconda del campo starred
                    if ($t['starred'])
                    {
                        $startype = 'glyphicon-star';                        
                    }
                    else
                    {
                        $startype = 'glyphicon-star-empty';
                    }
                    ?>                    
                    <span class="starred glyphicon <?php echo $startype ?>" 
                          task_id="<?php echo $t['id'] ?>">
                    </span>&nbsp;
					<?php	echo $t['name']  ?>
				<?php
					  }						
				?>
			</td>
			<td>
				<a href="<?php echo $this->Html->url('usertasks/' . $t['user_id'] )?>">
				<?php	echo $t['User']['username']  ?>
				</a>
			</td>

			<td><?php if (isset($t['deadline']) && $t['deadline'] > 0 )
					  {
						echo $t['deadline'] ;
					  }						
				?>
			</td>
			<td>
				<a class="btn btn-xs btn-primary" href="
						<?php echo $this->Html->url('edit/' . $t['id']) ?>"
				>
					<i class="fa fa-pencil"></i>
				</a>
			</td>
		</tr>
		
<?php   endforeach; ?>	

</table>
<?php   endforeach; //Gira sui progetti ?>	

