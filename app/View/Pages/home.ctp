<h1>Benvenuti nel Management Lab</h1>

<div class="row">
    <div class="col-md-4">
        <?php echo $this->element('projects', array('title' =>'Ultimi Progetti'), array('cache' => true)); ?>
    </div>
    
    
    <div class="col-md-8">
        <?php echo $this->element('tasks', array(), array('cache' => true)); ?>
    </div>    
</div>