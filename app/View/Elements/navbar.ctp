<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Management Lab</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo $this->Html->url('/'); ?>">Home</a></li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Progetti <span class="caret"></span></a>
				
					<ul class="dropdown-menu">
		  				<li><a href="<?php echo $this->Html->url('/projects'); ?>">Progetti Aperti</a></li>
		  				<li><a href="<?php echo $this->Html->url('/projects/index/-1'); ?>">Progetti Chiusi</a></li>
		  				<li><a href="<?php echo $this->Html->url('/projects/add'); ?>">Aggiungi Progetto</a></li>
					</ul>
			</li>
			
            <li><a href="<?php echo $this->Html->url('/tasks'); ?>">Task</a></li>
            <li><a href="<?php echo $this->Html->url('/users'); ?>">Risorse</a></li>
            <li><a href="#report">Report</a></li>
            
		  </ul>
		  
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo $this->Html->url('/user/me'); ?>">Area Riservata</a></li>
			<li>
				<a href="#area-riservata">
					<span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
					<span class="label label-default">3</span>
				</a>				
			</li>
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>