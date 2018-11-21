<?php require APPROOT . '/views/inc/header.php';?>
    <div class="text-center">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1 class=""><?php echo $data['title'];?></h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="card col-3  mb-3 d-inline-block">
            <p class="card-text">
                <span class="font-weight-bold">ID: </span><span><?php echo $data['id'];?></span>
            </p>
            <p class="card-text">
            <span class="font-weight-bold">Ρόλος: </span><span><?php echo $data['role'];?></span>
            </p>
            <p class="card-text">
            <span class="font-weight-bold"> Όνομα: </span><span><?php echo $data['name'];?></span>
            </p>
            <p class="card-text">
            <span class="font-weight-bold"> Email: </span><span><?php echo $data['email'];?></span>
            </p>
            <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/users/change/<?php echo $_SESSION['user_id'];?>" class="btn btn-secondary">
                <i class="fa fa-address-card"></i> Αλλαγή Κωδικού
            </a>
        </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>