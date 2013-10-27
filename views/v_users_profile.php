<h1>This is the profile of <?=$user->first_name?> <?=$user->last_name?></h1>
<h2> Email address: <?=$user->email?></h2>
<h2> Profile created :     <time datetime="<?=Time::display($user->created,'Y-m-d G:i')?>">
        <?=Time::display($user->created)?>
    </time>
</h2>