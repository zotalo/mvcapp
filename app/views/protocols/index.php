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
    <?php $i=1; ?>
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Αρ.Πρωτ.</th>
            <th scope="col">Εισ/Εξερ</th>
            <th scope="col">Από/Προς</th>
            <th scope="col">Σχετικός Αρ.</th>
            <th scope="col">Ημ.Πρωτ.</th>
        </thead>
        <tbody class="table-hover">
            <?php foreach($data['protocols'] as $protocols) : ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <th scope="row"><a href="<?php echo $protocols->protocolId;?>"><?php echo $protocols->protocolYear. "." . $protocols->protocolNo;?></a></td>
                <td ><?php echo $protocols->inOutDescription;?></td>
                <td ><?php echo $protocols->protocolFromTo; ?></td>
                <td ><?php echo $protocols->protocolDocumentNo; ?></td>
                <td ><?php echo $protocols->protocolDate; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?php foreach($data['protocols'] as $protocols) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title">
                <?php echo $protocols->protocolYear. "." . $protocols->protocolNo . " - " . $protocols->inOutDescription;?>
            </h4>
            <h6 class="card-title">
            από <?php echo $protocols->username ." στις " . $protocols->protocolRecordate; ?>
            </h6>
            <div class="bg-light p2 mb-3">
                Ημ. Πρωτοκόλλου: <?php echo $protocols->protocolDate; ?>
            </div>
            <div class="bg-light p2 mb-3">
                Από/Προς: <?php echo $protocols->protocolFromTo; ?>
            </div>
            <p class="card-text">
                <?php echo $protocols->protocolDescription; ?>
            </p>
            <a href="<?php echo URLROOT; ?>/protocol/show/<?php echo $protocols->protocolId; ?>" class="btn btn-dark">Περισσότερα</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php';?>