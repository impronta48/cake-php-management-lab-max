<?php $projects = $this->requestAction('/projects/index'); ?>

<div class="panel">
    <div class="panel-heading bg-primary text-white">
        <div class="panel-title"><h4><?php echo $title ?></h4></div>
    </div>
    <div class="panel-body">
        <ul>
        <?php foreach ($projects as $p)
        {
            echo "<li>". $p['Project']['name']. '</li>';
        }
        ?>
        </ul>
    </div>
</div>
