<?php require APPROOT . '/views/inc/header.php';?>
<div class="container">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo URLROOT; ?>/public/img/user.png" alt="users">
        <div class="card-body centered">
         <h5 class="card-title">
         Χρήστες</h5>
         <a href="<?php echo URLROOT; ?>/administrators/users" class="btn btn-primary">Διαχείριση</a>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>