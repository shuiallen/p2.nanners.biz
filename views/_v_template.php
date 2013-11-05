<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<!-- Common CSS/JS -->
	<link rel="stylesheet" type="text/css" href="/css/styles.css">

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<div class=background-container>
		<div class=nav-bar>
			<ul>
			    <li><a href='/'>Home</a></li>

			    <!-- Menu for users who are logged in -->
			    <?php if(is_object($user) && $user): ?>
			        <li><a href='/users/logout'>Logout</a></li>
			        <li><a href='/users/profile'>My Profile</a></li>
			        <li><a href='/posts/users'>Users</a></li>
			        <li><a href='/posts/add'>Add a Post</a></li>
			        <li><a href='/posts'>View Followed Posts</a></li>
	      		    <li><a href='/posts/myposts'>View My Posts</a></li>
	      		    <li><a href='/posts/allposts'>View All Posts</a></li>
	      		    <li><a href='/gallery'>Gallery</a></li>

			    <!-- Menu options for users who are not logged in -->
			    <?php else: ?>

			        <li><a href='/users/signup'>Sign up</a></li>
			        <li><a href='/users/login'>Log in</a></li>

			    <?php endif; ?>
			</ul>
		</div>
	</div>  

	<?php if(isset($content)) echo $content; ?>

	<!-- Common CSS/JSS -->
	<!-- tbd -->
	
	<?php if(isset($client_files_body)) echo $client_files_body; ?>

    
</body>
</html>