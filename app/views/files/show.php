<?php require APPROOT . '/views/inc/header.php';?>
<<<<<<< HEAD
<h1> <?php echo $data['name'];?> </h1>
<h2> <?php echo $data['url'];?> </h2>
=======
<h1> FILE TEST </h1>
<h2><?php echo $_SERVER['DOCUMENT_ROOT'];?></h2>    
>>>>>>> e518f30a61e090a0da1e3252cce6a99d3ac062b1
<div class="embed-responsive embed-responsive-21by9">
<iframe class="embed-responsive-item" src="<?php echo $data['url'];?>">

</iframe>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>