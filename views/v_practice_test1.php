
<p>
	This is the practice test1 page
</p>

<?php if(isset($publicvar)): ?>
    <h1>Value of publicvar:  <?=$publicvar?></h1>
<?php endif; ?>

<?php if(isset($protectedvar)): ?>
	<h1>Value of protectedvar: <?=$protectedvar?></h1>
<?php endif; ?>