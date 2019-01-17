<?php require APPROOT . '/views/inc/header.php';?>
<a href="<?php echo URLROOT; ?>/administrators/show/<?php echo $data['users']->userId;?>" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
<h1><?php echo $data['title'];?></h1>
<?php require APPROOT . '/views/inc/footer.php';?>