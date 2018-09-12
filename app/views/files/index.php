<?php require APPROOT . '/views/inc/header.php';?>
<div class="row mb-3">
        <div class="col-md-6">
            <h1>Αρχεία</h1>
        </div>
    </div>
    <table id="tprot" class="table table-hover table-sm loader">
        <thead class="thead-dark">
            <th scope="col">Πρωτόκολλο</th>
            <th scope="col">Αρχείο</th>
            <th scope="col">Τύπος</th>
            <th scope="col">Όνομα</th>
            <th scope="col">URL</th>
        </thead>
        <tbody class="table-hover">
            <?php foreach($data['files'] as $files) : ?>
            <tr>
                <th scope="row"><a href="<?php echo URLROOT; ?>/protocols/show/<?php echo $files->fileProtocolId;?>"><?php echo $files->fileProtocolId?></a></td>
                <td><a href="<?php echo URLROOT;?>/files/show/<?php echo $files->fileId;?>"><?php echo $files->fileId; ?></a></td>
                <td><?php echo $files->fileTypeName;?></td>
                <td><?php echo $files->fileName; ?></td>
                <td><?php echo $files->fileUrl; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php require APPROOT . '/views/inc/footer.php';?>