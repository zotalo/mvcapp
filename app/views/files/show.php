<?php require APPROOT . '/views/inc/header.php';?>
<a href="<?php echo URLROOT; ?>/protocols/show/<?php echo $data['id'];?>" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
<br>
<form class="pull-right delete" action="<?php echo URLROOT; ?>/files/delete/<?php echo $data['fileid'];?>" method ="post">
        <input type="submit" value="Διαγραφή" class="btn btn-danger">
    </form>
<h1> <?php echo $data['name'];?> </h1>
<div class="embed-responsive embed-responsive-21by9">
<iframe class="embed-responsive-item" src="<?php echo $data['url'];?>">

</iframe>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>