<h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>

<p>
	Have fun discussing Nanners!
</p>

<div class=background-container>
	<h1> Status </h1>
	<ul>
		<li> Landing page - this page updated with current status </li>
		<li> Navigation bar with different options if user is logged in or not - done</li>
		<li> Sign up - done</li>
		<li> Log in  - done</li>
		<li> Log out  - done</li>
		<li> See a list of all other users - done</li>
		<li> Follow or unfollow users </li>
		<li> View followed posts - does not include self by default </li>
		<li> +1 feature - View my posts and all posts - done </li>
		<li> +1 feature - Display logged in user's profile, it's not beautiful</li>
		<li> +1 feature - Upload an image and display on profile page </li>
		<li> Basic look and feel - only the outside container and nav bar</li>

		<li> todo Review for DRY </li>
		<li> todo check error handling </li>
		<li> add checking of blank fields for signup and login </li>
		<li> check for unique email addresses on signup </li>
		<li> think about other error conditions </li>
		<li> Defect: Placement of replace profile photo is not correct </li>
		<li> Enhance: Redirect after posting should do something better - redirect to myposts </li>
	</ul>
</div>