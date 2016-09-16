<?php 
foreach($bookmark as $b): ?>
	<?= h($b->twit) ?>
	<?= h($b->user_id); ?>
	<?= h($color) ?>
	<br>
<?php endforeach; ?>
