<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('administrator_message');?>
<a href="<?php echo URLROOT; ?>/administrators/users" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
<h1><?php echo $data['title'];?></h1>
<h1> <?php echo $data['users']->userName;?> </h1>
<p><strong>Δικαιώματα Χρήστη: </strong><?php echo $data['users']->rolesDescription;?></p>
<p><strong>Κατάσταση Χρήστη: </strong><?php echo $data['users']->statusDescription;?></p>
<p><strong>Email: </strong><?php echo $data['users']->email;?></p>
<a href="<?php echo URLROOT;?>/administrators/edit/<?php echo $data['users']->userId; ?>" class="btn btn-dark">Επεξεργασία</a>
<?php require APPROOT . '/views/inc/footer.php';?>