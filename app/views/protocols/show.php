<?php require APPROOT . '/views/inc/header.php';?>
<a href="<?php echo URLROOT; ?>/protocols" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>
<br>
<h1><?php echo $data['protocol']->protocolYear . "." . $data['protocol']->protocolNo. "-" . dateFormat($data['protocol']->protocolDate);?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Δημιουργήθηκε από <?php echo $data['user']->username; ?> στις <?php echo dateFormatH($data['protocol']->protocolRecordate); ?>
</div>
<div class="">
<p><strong>Θέμα: </strong><?php echo $data['protocol']->protocolSubject; ?></p>
<p><strong>Περιγραφή: </strong><?php echo $data['protocol']->protocolDescription; ?></p>
<p><strong>Εισ/Εξ: </strong><?php echo $data['protocol']->inOutDescription; ?></p>
<p><strong>Από/Προς: </strong><?php echo $data['protocol']->protocolFromTo; ?></p>
</div>
<hr>
    <a href="<?php echo URLROOT;?>/protocols/edit/<?php echo $data['protocol']->protocolId; ?>" class="btn btn-dark">Edit</a>
    <form class="pull-right" action="<?php echo URLROOT; ?>/protocols/delete/<?php echo $data['protocol']->protocolId;?>" method ="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php require APPROOT . '/views/inc/footer.php';?>