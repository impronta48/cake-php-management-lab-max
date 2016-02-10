<h1>Elenco Progetti</h1>
<a href="<?php echo $this->Html->url('add')?>" class="btn btn-primary">
	<i class="fa fa-plus"></i> Aggiungi Progetto
</a>
<a href="<?php echo $this->Html->url('index/-1')?>" class="btn btn-default btn-xs">
	Progetti Chiusi
</a>
<br/>
<br/>
<ul class="list-group">
<?php foreach ($projects as $project) : ?>
  <li class="list-group-item">  
			
			<?php if (isset($conta2[$project['Project']['id']])) : ?>
			<span class="badge badge-primary">
			<?php echo $conta2[$project['Project']['id']]; ?>
			/ <?php echo count($project['Task']); ?>
			</span> 
			<?php endif; ?>

			<a href="<?php echo $this->Html->url('view/' . $project['Project']['id']) ?>">
			<?php echo $project['Project']['name']; ?> 
			</a>
  </li>
<?php endforeach; ?>
</ul>