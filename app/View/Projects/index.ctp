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
            
            <?php 
                    //Prima di stampare l'immagine verifico se esiste il file                    
                    if (file_exists( ROOT. DS. APP_DIR . DS . WEBROOT_DIR . DS . 'img'  .DS . 'projects' . DS  . $project['Project']['id'] . '.jpg' ))
                    {
                        echo $this->Html->image('projects/' . $project['Project']['id'] . '.jpg',
                        array('class'=>'thumbnail', 'height'=>'50px')); 
                    };
            ?>
  </li>
<?php endforeach; ?>
</ul>