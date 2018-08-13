<?php require APPROOT . '/views/inc/header.php';?>
    <div class="container text-center">
        <div class="row mb-3">
            <div class="col-md-6">
                    <h1>Διαχειριστής</h1>
            </div>
        </div> 
        <div class="row justify-content-around">
            <div class="card col-3" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo URLROOT; ?>/public/img/user.png" alt="users">
                <div class="card-body mx-auto">
                    <a href="<?php echo URLROOT; ?>/administrators/users" class="btn btn-dark">Διαχείριση Χρηστών</a>
                </div>
            </div>
            <div class="card col-3" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo URLROOT; ?>/public/img/folder.png" alt="users">
                <div class="card-body mx-auto">
                    <a href="<?php echo URLROOT; ?>/administrators/files" class="btn btn-dark">Διαχείριση Αρχείων</a>
                </div>
            </div>
            <div class="card col-3" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo URLROOT; ?>/public/img/system.png" alt="users">
                <div class="card-body mx-auto">
                    <a href="<?php echo URLROOT; ?>/administrators/system" class="btn btn-dark">Διαχείριση Συστήματος</a>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>