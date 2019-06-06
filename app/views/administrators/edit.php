<?php require APPROOT . '/views/inc/header.php';?>
<div class="row mb-3">
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/administrators/show/<?php echo $data['users']->userId;?>" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
        <h1><?php echo $data['title'];?></h1>
    </div>
</div>
<div class="card card-body bg-light mt-5">
    <h2><?php echo $data['users']->userName;?></h2>
    <form action="<?php echo URLROOT;?>/administrators/edit/<?php echo $data['users']->userId;?>" method="post">
        <div class="form-group">
            <label for="role">Ρόλος: </label>
            <select name="role" class="form-control form-control-lg <?echo (!empty($data['roles_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['role']->rolesid;?>">
                <?php foreach($data['role'] as $role) : ?>
                    <option value="<?php echo $role->rolesid;?>"<?php if($role->rolesid == $data['users']->userRole){echo "selected";}?>><?php echo $role->rolesname;?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
        <label for="status">Κατάσταση: </label>
            <select name="status" class="form-control form-control-lg <?echo (!empty($data['statuses_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['status']->statusId;?>">
                <?php foreach($data['status'] as $status) : ?>
                    <option value="<?php echo $status->statusId;?>"<?php if($status->statusId == $data['users']->userStatus){echo "selected";}?>><?php echo $status->statusDescription;?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['users']->email; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Ενημέρωση">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>