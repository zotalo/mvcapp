<?php require APPROOT . '/views/inc/header.php';?>
<div class="text-center">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1><?php echo $data['title'];?></h1>
        </div>
    </div>
</div>
<a href="<?php echo URLROOT; ?>/users/index/<?php echo $data['id'];?>" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
    <form action="<?php echo URLROOT; ?>/users/change" method="post">
        <div class="form-group">
            <label for="current_password">Τρέχων Κωδικός: <sup>*</sup></label>
            <input type="password" name="current_password" class="form-control form-control-lg <?php echo (!empty($data['current_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['current_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['current_password_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="new_password">Νέος Κωδικός: <sup>*</sup></label>
            <input type="password" name="new_password" class="form-control form-control-lg <?php echo (!empty($data['new_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['new_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['new_password_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="confirm_new_password">Επιβεβαίωση Νέου Κωδικού: <sup>*</sup></label>
            <input type="password" name="confirm_new_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_new_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_new_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_new_password_err']; ?></span>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" value="Αλλαγή" class="btn btn-success btn-block">
            </div>
        </div>
    </form>
<?php require APPROOT . '/views/inc/footer.php';?>