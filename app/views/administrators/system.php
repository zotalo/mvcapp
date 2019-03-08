<?php require APPROOT . '/views/inc/header.php';?>
<h1><?php echo $data['title'];?></h1>
<p><?php echo $data['description'];?></p>
    <div class="text-center"> 
        <div class="row justify-content-around">
            <div class="card col-3" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo URLROOT; ?>/public/img/timeline.png" alt="users">
                <div class="card-body mx-auto">
                    <a href="<?php echo URLROOT; ?>/administrators/versioning" class="btn btn-dark">Διαχείριση Εκδόσεων</a>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>