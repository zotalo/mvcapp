<?php require APPROOT . '/views/inc/header.php';?>
<div class="container">
    <div class="card">
        <img class="card-img-top" src="<?php echo APPROOT; ?>/public/img/user.png" alt="users">
        <div class="card-body">
         <h5 class="card-title">
         Χρήστες</h5>
         <a href="<?php echo URLROOT; ?>administrators/users" class="btn btn-primary"></a>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>