<?php 
// pr($bookmarks);
foreach($bookmarks as $b): ?>
	<?= h($b->twit) ?>
	<?= h($b->user_id); ?>
	<?= h($color) ?>
	<br>
<?php endforeach; ?>
<<?php
echo $encrpt,'<br>','<hr>';;
echo $decrpt, '<br><hr>';

echo "MD5: ",$md5, '<hr>';

echo "sha256: ",$sha256, '<hr>';

echo "sha1: ",$sha1, '<hr>';
?>