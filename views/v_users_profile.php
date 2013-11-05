<h2> Profile </h2>
<h2> <?=$user->first_name?> <?=$user->last_name?></h2>
<h2> Email address: <?=$user->email?></h2>
<h2> Profile created :     <time datetime="<?=Time::display($user->created,'Y-m-d G:i')?>">
        <?=Time::display($user->created)?>
    </time>
</h2>

<!-- 

<?php if($user->avatar != PLACE_HOLDER_IMAGE): ?>
	<img src=<?=$user->avatar?> alt="UserAvatar" width="160" height="120">
<?php endif; ?>
 -->

<div class=vertical-container>
	<img src=<?=$user->avatar?> alt="UserAvatar" width="300" height="120">
	<?php if($user->avatar != PLACE_HOLDER_IMAGE): ?>
		<p> <strong>Replace your profile photo: </strong></p>
	<?php else: ?>
		<p> <strong>Add your profile photo: </strong></p>
	<?php endif; ?>

	<form class=formfields action="/users/p_profile_upload" method="post"
		enctype="multipart/form-data">

	    <?php if(isset($error)): ?>
		    <div class='error'>
		            Invalid file type.
		    </div>
		<?php endif; ?>


		<label for="file">Filename:</label>
		<input type="file" name="file" id="file" required><br>

 		<input type="submit" name="submit" value="Submit">
	</form>
</div>

