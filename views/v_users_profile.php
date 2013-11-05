<h2> Profile </h2>

<div class=vertical-container>
    <form class=formfields method='POST' action='/users/p_update'>
        First Name<br>
        <input type='text' name='first_name' value=<?=$user->first_name ?>>
        <br><br>

        Last Name<br>
        <input type='text' name='last_name' value=<?=$user->last_name ?>>
        <br><br>

        Nick Name (optional)<br>
        <input type='text' name='nickname' value=<?=$user->nickname ?>>
        <br><br>

        Email<br>
        <input type='text' name='email' value=<?=$user->email?>>
        <br><br>

        <input type='submit' value='Update'>

        <?php $error = NULL; ?>
    </form>
</div>
<br>
<p> Profile created :
    <time datetime="<?=Time::display($user->created,'Y-m-d G:i')?>">
         <?=Time::display($user->created)?>
    </time>
</p>
<div class="vertical-container">
	<?=$avatar;?>    
</div>


