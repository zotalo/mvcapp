<?php require APPROOT . '/views/inc/header.php';?>
<div class="row mb-3">
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/administrators/show/<?php echo $data['users']->userId;?>" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
        <h1><?php echo $data['title'];?></h1>
    </div>
</div>
<?php echo generatePassword();
?>
<?php require APPROOT . '/views/inc/footer.php';?>