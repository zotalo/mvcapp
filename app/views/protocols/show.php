<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('protocol_message'); ?>
<a href="<?php echo URLROOT; ?>/protocols" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
<br>
<h1><?php echo $data['protocol']->protocolYear . "." . $data['protocol']->protocolNo. " [" . dateFormat($data['protocol']->protocolDate)."]";?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Δημιουργήθηκε από <?php echo $data['user']->username; ?> στις <?php echo dateFormatH($data['protocol']->protocolRecordate); ?>
</div>
<?php if($data['protocol']->protocolUpdateUser != null) :?>
<div class="bg-info text-light p-1 mb-1">
    Τελευταία ενημέρωση από <?php echo $data['upduser']->username; ?> στις <?php echo dateFormatH($data['protocol']->protocolUpdateRecordDate); ?>
</div>
<?php endif; ?>
<div class="">
    <p><strong>Θέμα: </strong><?php echo $data['subject']; ?></p>
    <p><strong>Εισ/Εξ: </strong><?php echo $data['protocol']->inOutDescription; ?></p>
    <p><strong>Από/Προς: </strong><?php echo $data['protocol']->protocolFromTo; ?></p>
    <p><strong>Περιγραφή: </strong><?php echo $data['protocol']->protocolDescription; ?></p>
    <p><strong>Ημ. Έκδοσης: </strong><?php echo dateFormat($data['protocol']->protocolDateIssued); ?></p>
    <p><strong>Αριθμός Σχετικού Εγγράφου: </strong><?php echo $data['protocol']->protocolDocumentNo; ?></p>
    <?php if($data['file']==null): ?>
        <form action="<?php echo URLROOT;?>/files/add/<?php echo $data['protocol']->protocolId; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Αρχείο</label>
                <input type="file" name="file"  >
                <div>
                <span class="invalid-feedback"><?php echo $data['file_err'];?></span>
                <span class="invalid-feedback"><?php echo $data['ext_err'];?></span>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Ανέβασμα Αρχείου">
        </form>
    <?php else: ?>
        <p><strong>Επισυναπτόμενο: </strong><a href="<?php echo URLROOT;?>/files/show/<?php echo $data['file'];?>"><?php echo $data['name']; ?></a></p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-att-modal-lg">
            <?php echo $data['name'];?>
        </button>

        <!--MODAL-->
        <div class="modal fade bd-att-modal-lg" id="attachment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Επισυναπτόμενο</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">    
                <?php if($_SESSION['user_role_no'] ==2 || $_SESSION['user_role_no'] ==1) : ?>
                    <form class="pull-right delete" action="<?php echo URLROOT; ?>/files/delete/<?php echo $data['file'];?>" method ="post">
                        <input type="submit" value="Διαγραφή" class="btn btn-danger">
                    </form>
                <?php endif; ?>
                <h1><?php echo $data['name'];?></h1>
                <a href="<?php echo $data['url'];?>" class="btn btn-light"><i class="fa fa-download"></i>Λήψη Αρχείου</a>
                <div class="embed-responsive embed-responsive-21by9">
                    <?php if($data['ext']==1) : ?>
                    <iframe class="embed-responsive-item" src="<?php echo $data['url'];?>#zoom=80">
                    </iframe>
                    <?php endif; ?>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    <?php endif;?>

</div>
<?php if($_SESSION['user_role_no'] ==2 || $_SESSION['user_role_no'] ==1) : ?>
<hr>
    <a href="<?php echo URLROOT;?>/protocols/edit/<?php echo $data['protocol']->protocolId; ?>" class="btn btn-dark">Επεξεργασία</a>

    <form class="pull-right delete" action="<?php echo URLROOT; ?>/protocols/delete/<?php echo $data['protocol']->protocolId;?>" method ="post">
        <input type="submit" value="Διαγραφή" class="btn btn-danger">
    </form>
<?php endif; ?>
<span class="invalid-feedback"><?php echo $data['file_err'];?></span>
                <span class="invalid-feedback"><?php echo $data['ext_err'];?></span>
<?php require APPROOT . '/views/inc/footer.php';?>