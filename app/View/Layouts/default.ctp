<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>		
		<?php echo $this->fetch('title'); ?>
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		//echo $this->Html->css('https://bootswatch.com/united/bootstrap.min.css');
		echo $this->Html->css('managementlab');
		
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
	<!-- Fixed navbar -->
    <?php echo $this->element('navbar'); ?>
	
	<!-- Begin page content -->
    <div class="container">		
		<div class="alert alert-success">
			<?php echo $this->Session->flash();?>
		</div>

		<?php echo $this->fetch('content'); ?>
    </div>	
	
	<!-- Fixed footer -->
	<?php echo $this->element('footer'); ?>
		
    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'); ?>
    
	 <!-- Include all compiled plugins (below), or include individual files as needed -->
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->Html->script('managementlab'); ?>    
</body>
</html>
