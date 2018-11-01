<?php require APPROOT . '/views/inc/header.php';?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Χρήστες</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Προσθήκη Χρήστη
        </a>
    </div>
</div>
<div class="card-columns">
<?php foreach($data['users'] as $user) : ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <?php echo $user->username; ?>
            </h4>
            <h6 class="card-subtitle bg-light p2 mb-3">
            Role: <?php echo $user->rolesname; ?>
            </h6>
            <p class="card-text">
            Email:  <?php echo $user->email; ?>
            </p>
            <a href="<?php echo URLROOT; ?>/administrators/show/<?php echo $user->userid; ?>" class="btn btn-dark">Περισσότερα</a>
         </div>
    </div>
<?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>