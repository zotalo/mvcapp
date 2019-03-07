<?php require APPROOT . '/views/inc/header.php';?>
<h1><?php echo $data['title'];?></h1>
<p><?php echo $data['description'];?></p>
<ul class="list-group">
<?php foreach($data['versions'] as $version) : ?>

        <li class="list-group-item">
            <?php echo $version->versionno." - ".$version->versiondate." - ".$version->versiondescription; ?>
        </li>
<?php endforeach; ?>
</ul>
<?php require APPROOT . '/views/inc/footer.php';?>