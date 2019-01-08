<?php require APPROOT . '/views/inc/header.php';?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Δημιουργία Νέου Λογαριασμού</h2>
                <p>Συμπλήρωση Στοιχείων Νέου Χρήστη του Συστήματος</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="form-group">
                    <label for="name">Όνομα: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Κωδικός Πρόσβασης: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Επιβεβαίωση Κωδικού Πρόσβασης: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="roles">Ρόλος: <sup>*</sup></label>
                    <select name="roles" class="form-control form-control-lg <?php echo (!empty($data['roles_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['roles']; ?>">
                        <?php foreach($data['role'] as $role) : ?>
                            <option value="<?php echo $role->rolesid; ?>"><?php echo $role->rolesname;?> </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="invalid-feedback"><?php echo $data['role_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="statuses">Κατάσταση: <sup>*</sup></label>
                    <select name="statuses" class="form-control form-control-lg <?php echo (!empty($data['status_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['statuses']; ?>">
                        <?php foreach($data['status'] as $status) : ?>
                            <option value="<?php echo $status->statusId; ?>"><?php echo $status->statusDescription;?> </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="invalid-feedback"><?php echo $data['status_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Προσθήκη Χρήστη" class="btn btn-success btn-block">
                    </div>
                    <!-- <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have and account? Login</a>
                    </div> -->
                </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>