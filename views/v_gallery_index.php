<h1>Photo Gallery</h1>

<?php foreach($gallery as $photo): ?>
    <div class="img">
        <a target="_blank" href="/uploads/gallery/<?=$photo['photo']?>">
            <img src=/uploads/gallery/<?=$photo['photo']?> alt="Photo Error" width="110" height="90">
        </a>
        <div class="desc"><?=$photo['description']?></div>
    </div>

<?php endforeach; ?>

<div class="right-side-bar">
	<?=$addphoto;?>    
</div>
