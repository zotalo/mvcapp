<?php require APPROOT . '/views/inc/header.php';?>
<h1> <?php echo $data['name'];?> </h1>
<h2> <?php echo $data['url'];?> </h2>
<div class="embed-responsive embed-responsive-21by9">
<iframe class="embed-responsive-item" src="<?php echo $data['url'];?>">

</iframe>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>