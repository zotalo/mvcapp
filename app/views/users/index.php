<?php require APPROOT . '/views/inc/header.php';?>
<div class="text-center">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class=""><?php echo $data['title'];?></h1>
        </div>
    </div>
</div>
<div class="row justify-content-around">
    <div class="card ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span class="font-weight-bold">ID: </span><span><?php echo $data['id'];?></span>
            </li>
            <li class="list-group-item">
                <span class="font-weight-bold">Ρόλος: </span><span><?php echo $data['role'];?></span>
            </li>
            <li class="list-group-item">
                <span class="font-weight-bold"> Όνομα: </span><span><?php echo $data['name'];?></span>
            </li>
            <li class="list-group-item">
                <span class="font-weight-bold"> Email: </span><span><?php echo $data['email'];?></span>
            </li>
            <li class="list-group-item text-center">
                <a href="<?php echo URLROOT; ?>/users/change/<?php echo $_SESSION['user_id'];?>" class="btn btn-secondary">
                    <i class="fa fa-address-card"></i> Αλλαγή Κωδικού
                </a>
            </li>
        </ul>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>