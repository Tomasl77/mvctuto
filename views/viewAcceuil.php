<?php  
foreach ($articles as $art): ?>

<h2><?= $art->pseudo()?></h2>

<div>Votre id est <?= $art->id()?></div>
<div>Votre mail est <?= $art->mail()?></div>
<?php endforeach; ?>