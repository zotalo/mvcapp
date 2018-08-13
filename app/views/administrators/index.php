<?php require APPROOT . '/views/inc/header.php';?>
<div class="container">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo URLROOT; ?>/public/img/user.png" alt="users" width="128" height="128">
        <div class="card-body">
         <h5 class="card-title">
         Χρήστες</h5>
         <a href="<?php echo URLROOT; ?>administrators/users" class="btn btn-primary">Διαχείριση</a>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>