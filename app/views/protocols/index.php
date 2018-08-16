<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('protocol_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Πρωτόκολλο</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/protocol/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Νέο Πρωτόκολλο
            </a>
        </div>
    </div>
    <?php foreach($data['protocols'] as $protocols) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title">
                <?php echo $protocols->protocolYear. "." . $protocols->protocolNo . " - " . $protocols->inOutDescription;?>
            </h4>
            <h5 class="card-title">
            από χρήστη: <?php echo $protocols->username; ?>
            </h5>
            <div class="bg-light p2 mb-3">
                Date: <?php echo $protocols->protocolDate; ?>
            </div>
            <div class="bg-light p2 mb-3">
                From/To: <?php echo $protocols->protocolFromTo; ?>
            </div>
            <p class="card-text">
                <?php echo $protocols->protocolDescription; ?>
            </p>
            <a href="<?php echo URLROOT; ?>/protocol/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php';?>