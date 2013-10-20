<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<!-- Common CSS/JS -->
	<link rel="stylesheet" type="text/css" href="../css/test.css">

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<ul id='menu'>

	    <li><a href='/'>Home</a></li>

	    <!-- Menu for users who are logged in -->
	    <?php if(is_object($user) && $user): ?>
	        <li><a href='/users/logout'>Logout</a></li>
	        <li><a href='/users/profile'>Profile</a></li>
	        <li><a href='/users/users'>Users</a></li>

	    <!-- Menu options for users who are not logged in -->
	    <?php else: ?>

	        <li><a href='/users/signup'>Sign up</a></li>
	        <li><a href='/users/login'>Log in</a></li>

	    <?php endif; ?>

	</ul>


	<?php if(isset($content)) echo $content; ?>

	<!-- Common CSS/JSS -->
	<!-- tbd -->
	
	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>