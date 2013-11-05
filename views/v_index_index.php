<h1>Welcome to <?=APP_NAME?>
	<?php if($user): ?>
		<?php echo ', ';  ?>
		<?php if ($user->nickname): ?>
			<?php echo $user->nickname;  ?>
		<?php else: ?>
			<?php echo $user->first_name; ?>
		<?php endif; ?>
	<?php endif; ?>
</h1>

<p>
	Have fun discussing Nanners!
</p>

<div class=background-container>
	<h1> Status </h1>
	<ul>
		<li> Required features </li>
			<ul>
				<li>Landing page </li>
				<li> Sign up, Log in, Log out</li>
				<li> Add posts </li>
				<li> See a list of all other users</li>
				<li> Follow and unfollow users </li>
				<li> View followed posts - does not include self by default, explicitly follow yourself or use My Posts </li>
			</ul>
		<li> +1 features </li>
			<ul>
			<li> View my posts and View all posts, redirect to My posts after adding post</li>
			<li> Display logged in user's profile; add or replace a profile photo </li>
			<ul>
				<li> Layout is not beautiful; Placement of replace profile photo is not great.</li>
			</ul>
		</ul>
		<li> Basic look and feel </li>
			<ul>
				<li> Minimal containers, pretty background</li>
				<li> Navigation bar with different options if user is logged in or not</li>
			</ul>
		<li> Error checking </li>
			<ul>
				<li> Check for blank fields for signup and login </li>
				<li> Check for unique email addresses on signup</li>
				<li> Other error conditions ? </li>
				<li> Upload of invalid file type reports an error </li>
			</ul>

		<li> check sanitizing for sql injection attacks? </li>
		<li> todo Review for DRY </li>
		<li> Code validation - ran once, check again before submitting </li>
		<li> Run on live server - create users & posts </li>
	</ul>
</div>