<h1>Elenco Utenti</h1>

<table class="table table-striped">
<tr>
	<th>Username</th>
	<th>Email</th>
	<th>Azioni</th>
</tr>
<?php foreach($users as $u) : ?>
	<tr>
		<td><?php echo $u['User']['username']; ?></td>
		<td><a href="mailto:<?php echo $u['User']['email']; ?>">
				<i class="fa fa-envelope"></i> <?php echo $u['User']['email']; ?>
			</a>
		</td>
		<td>
			<?php echo $this->Html->link('[Edit]','edit/'. $u['User']['id']); ?>
			<?php echo $this->Html->link('[Delete]',
										'delete/'. $u['User']['id'],
										array('confirm' => 'Vuoi davvero cancellare questo utente?')
										); ?>			
			<a class="btn btn-sm btn-primary" 
				href="<?php echo $this->Html->url('/tasks/usertasks/'.$u['User']['id'] ) ?>">
				Tasks
			</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>