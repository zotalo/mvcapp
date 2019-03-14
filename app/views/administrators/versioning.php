<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('administrator_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1><?php echo $data['title'];?></h1>
        <p><?php echo $data['description'];?></p>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/administrators/versionadd" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Προσθήκη Έκδοσης
        </a>
    </div>
</div>
<table id="tprot" class="table table-hover table-sm loader">
    <thead id ="tablehead" class="thead-dark">
        <th scope="col">Έκδοση</th>
        <th scope="col">Ημερομηνία</th>
        <th scope="col">Περιγραφή</th>
    </thead>
    <tbody class="table-hover">
        <?php foreach($data['versions'] as $versions) : ?>
        <tr>
            <td scope="row"><a href="<?php echo URLROOT; ?>/administrators/versionshow/<?php echo $versions->versionid;?>"><?php echo $versions->versionno;?></a></td>
            <td><?php echo $versions->versiondate;?></td>
            <td><?php echo $versions->versiondescription; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php';?>