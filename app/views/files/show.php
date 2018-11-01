<?php require APPROOT . '/views/inc/header.php';?>
    <a href="<?php echo URLROOT; ?>/protocols/show/<?php echo $data['id'];?>" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
    <br>
    <?php if($_SESSION['user_role_no'] ==2 || $_SESSION['user_role_no'] ==1) : ?>
        <form class="pull-right delete" action="<?php echo URLROOT; ?>/files/delete/<?php echo $data['fileid'];?>" method ="post">
            <input type="submit" value="Διαγραφή" class="btn btn-danger">
        </form>
    <?php endif; ?>
    <h1><?php echo $data['name'];?></h1>
    <a href="<?php echo $data['url'];?>" class="btn btn-light"><i class="fa fa-download"></i>Λήψη Αρχείου</a>
    <div class="embed-responsive embed-responsive-21by9">
        <?php if($data['ext']==1) : ?>
        <iframe class="embed-responsive-item" src="<?php echo $data['url'];?>">
        </iframe>
        <?php endif; ?>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>