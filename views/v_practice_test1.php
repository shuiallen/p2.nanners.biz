
<p>
	This is the practice test1 page
</p>

<?php if($publicvar): ?>
    <h1>Value of publicvar in view:  <?=$publicvar?></h1>
<?php else: ?>
	<h1>no public var</h1>
<?php endif; ?>

<?php if($protectedvar): ?>
	<h1>Value of protectedvar in view: <?=$protectedvar?></h1>
<?php else: ?>
	<h1>no protected var</h1>
<?php endif; ?>