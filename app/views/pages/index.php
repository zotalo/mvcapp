<?php require APPROOT . '/views/inc/header.php';?>
    <div class="jumbotron jumbotron-flud text-center">
        <div class="container">
        <h1 class="display-3"><?php echo $data['title'];?></h1>
        <p class="lead"><?php echo $data['description'];?></p>
        <div class="lead"><img src="<?php echo URLROOT;?>/img/tea.png" alt="tea" /></div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>