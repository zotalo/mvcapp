<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('protocol_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Πρωτόκολλο <?php echo $data['currentyear'];?></h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/protocols/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Νέο Πρωτόκολλο
            </a>
        </div>
    </div>
    <table id="tprot" class="table table-hover table-sm loader">
        <thead id ="tablehead" class="thead-dark">
            <th scope="col">Αρ.Πρωτ.</th>
            <th scope="col">Ημ.Πρωτ.</th>
            <th scope="col">Θέμα</th>
            <th scope="col">Εισ/Εξερ</th>
            <th scope="col">Από/Προς</th>
            <th scope="col">Σχετ. Αρ.</th>
        </thead>
        <tbody class="table-hover">
            <?php foreach($data['protocols'] as $protocols) : ?>
            <tr>
                <th scope="row"><a href="<?php echo URLROOT; ?>/protocols/show/<?php echo $protocols->protocolId;?>"><?php echo $protocols->protocolNo;?></a></td>
                <td><?php echo dateFormat($protocols->protocolDate); ?></td>
                <td><?php echo $protocols->protocolSubject;?></td>
                <td><?php echo $protocols->inOutDescription;?></td>
                <td><?php echo $protocols->protocolFromTo; ?></td>
                <td><?php echo $protocols->protocolDocumentNo; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php require APPROOT . '/views/inc/footer.php';?>