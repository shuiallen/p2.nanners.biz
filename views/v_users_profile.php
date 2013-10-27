<h1>This is the profile of <?=$user->first_name?> <?=$user->last_name?></h1>
<h2> Email address: <?=$user->email?></h2>
<h2> Profile created :     <time datetime="<?=Time::display($user->created,'Y-m-d G:i')?>">
        <?=Time::display($user->created)?>
    </time>
</h2>

<?php if(!isset($image)): ?>
	<form action="/users/p_profile_upload" method="post"
		enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="Submit">
	</form>
<?php else: ?>
	<h2> TODO : get and display the image </h2>
<?php endif; ?>