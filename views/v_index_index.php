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
		<li> Required features 
			<ul>
			<li>Landing page </li>
			<li> Sign up, Log in, Log out</li>
			<li> Add posts </li>
			<li> See a list of all other users</li>
			<li> Follow and unfollow users </li>
			<li> View followed posts - does not include self by default, explicitly follow yourself or use My Posts </li>
			</ul>
		</li>
		<li> +1 features 
			<ul>
			<li> View my posts and View all posts, redirect to My posts after adding post</li>
			<li> Display logged in user's profile; add or replace a profile photo
				<ul>
					<li> Layout is not beautiful; Placement of replace profile photo is not great.</li>
				</ul>
			</li>
			</ul>
		</li>
		<li> Basic look and feel
			<ul>
			<li> Minimal containers, pretty background</li>
			<li> Navigation bar with different options if user is logged in or not</li>
			</ul>
		</li>
		<li> Error checking
			<ul>
			<li> Check for blank fields for signup and login </li>
			<li> Check for unique email addresses on signup</li>
			<li> Upload of invalid file type reports an error </li>
			</ul>
		</li>
		<li> Code structure
			<ul>			
			<li> Sanitize data from input forms - signup, login, update </li>
			<li> Review for DRY </li>
			<li> Code validation </li>
			</ul>
		</li>
		<li> Testing on live server </li>
		<li> Issues
			<ul>
			<li> IE doesn't work on local server - an environment issue?</li>
			<li> Adding a post on IE10 says field required even if you put text in the textarea </li>
			<li> On invalid email address in signup, it reports error but your input is gone </li>
			</ul>
		</li>
	</ul>
</div>