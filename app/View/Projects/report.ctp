<h1>Report Progetti</h1>

<?php foreach ($projects as $p) { ?>
<div class="row">
	<div class="well col-md-12">
		<h2>
			<a href="<?php echo $this->Html->url('view/' . $p['Project']['id']) ?>">
				<?php echo $p['Project']['name'] ?>
			</a>

			<sup>
			<a href="<?php echo $this->Html->url('edit/' . $p['Project']['id']) ?>">
				<i class="fa fa-pencil "></i>
			</a>
			</sup>
		</h2>

		<?php 
		//inizializzo le variabili ad ogni ciclo
		$percentuale = 0;
		$extra_progress ='';
		$durata = 0;
		//Gestione progetti chiusi => Sempre verdi
		if ($p['Project']['closed'])
		{
			$extra_progress = 'progress-bar-success';
			$percentuale = 100;
		}
		else { //Calcolo la durata del progetto e il punto a cui siamo arrivati 			
			$datetime1 = new DateTime($p['Project']['startdate']);
			$datetime2 = new DateTime($p['Project']['enddate']);
			$interval = $datetime1->diff($datetime2);
			$durata = (int) $interval->format('%a');
			$oggi = new DateTime("now");
			$ggusati = (int) $oggi->diff($datetime1)->format('%a');
		}

		//Progetti in corso con data valida
		if ($durata > 0)
		{
			$percentuale = ($ggusati / $durata) * 100 ;
		}
		
		//Progetti aperti che sono oltre la scadenza
		if ($percentuale > 100)
		{
			$extra_progress = 'progress-bar-danger';
		}

		//debug($durata);
		//debug($ggusati);
		//debug($percentuale);		
		?>

		<div class="col-md-9">
			<div class="pull-right">
				
				<?php if ($p['Project']['enddate'] > 0) {
							echo 'Data di scadenza: ' . $p['Project']['enddate'] ;
					  }
				?>
			</div>

			<br>
			
			<div class="progress">
				<div class="progress-bar <?php echo $extra_progress ?>"
					 role="progressbar"
					 aria-valuenow="<?php echo $percentuale ?>" 
					 aria-valuemin="0"
					 aria-valuemax="100"				 
					 style="width: <?php echo floor($percentuale) ?>%; min-width: 2em;">
	    			<?php echo floor($percentuale) ?>%
	  				</div>
			</div>

			<br>

			<div class="col-md-3">
				Task Completati: <?php echo $numtask[$p['Project']['id']]['completati'] ?>
			</div>
			<div class="col-md-3">
				Task Aperti: <?php echo $numtask[$p['Project']['id']]['aperti'] ?>
			</div>
			<div class="col-md-3">
				Task Scaduti: <?php echo $numtask[$p['Project']['id']]['scaduti'] ?>
			</div>

		</div>
		<div class="col-md-3">
			<button class="btn btn-sm btn-primary">Report PDF <i class="fa fa-file-pdf-o"></i></button>

			<button class="btn btn-sm  btn-primary">Report XLS <i class="fa fa-file-excel-o"></i></button>
		</div>
	</div>
</div>
<?php } ?>

