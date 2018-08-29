<?php require APPROOT . '/views/inc/header.php';?>
    <div class="text-center">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1 class=""><?php echo $data['title'];?></h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="card col-3">
            <p class="card-text">
                ID: <?php echo $data['id'];?>
            </p>
            <p class="card-text">
                Ρόλος: <?php echo $data['role'];?>
            </p>
            <p class="card-text">
                Όνομα: <?php echo $data['name'];?>
            </p>
            <p class="card-text">
                Email: <?php echo $data['email'];?>
            </p>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>