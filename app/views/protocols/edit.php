<?php require APPROOT . '/views/inc/header.php';?>
<a href="<?php echo URLROOT; ?>/protocols" class="btn btn-light"><i class="fa fa-backward"></i>Επιστροφή</a>
<div class="card card-body bg-light mt-5">
            <h2>Πρωτόκολλο: <?php echo $data['year'] . "." . $data['number'];?></h2>
            <p>Επεξεργασία</p>
            <form action="<?php echo URLROOT; ?>/protocols/edit/<?php echo $data['id'];?>" method="post">
            <div class="form-group">
                <label for="subject">Θέμα: <sup>*</sup></label>
                <input type="text" name="subject" class="form-control form-control-lg <?php echo (!empty($data['subject_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['subject']; ?>">
                <span class="invalid-feedback"><?php echo $data['subject_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="inout">Εισ/Εξ:</label>
                <select name="inout" class="custom-select">
                    <?php $val=inOutValue($data['inout']);?>
                    <option value=<?php echo $data['inout'];?> selected><?php echo $data['protocol']->inOutDescription;?></option>
                    <option value=<?php echo $val[0];?>><?php echo $val[1]?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="pdate">Ημερομηνία: <sup>*</sup></label>
                <input type="date" name="pdate" data-date-format="dd/mm/yyyy" class="form-control form-control-lg <?php echo (!empty($data['pdate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['pdate'];?>">
                <span class="invalid-feedback"><?php echo $data['pdate_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="fromto">Από/Προς: <sup>*</sup></label>
                <input type="text" name="fromto" class="form-control form-control-lg <?php echo (!empty($data['fromto_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fromto'];?>">
                <span class="invalid-feedback"><?php echo $data['fromto_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="description">Περιγραφή: </label>
                <textarea name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description'];?></textarea>
                <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="nodoc">Αρ. Εγγράφου: </label>
                <input type="text" name="nodoc" class="form-control form-control-lg <?php echo (!empty($data['nodoc_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nodoc'];?>">
                <span class="invalid-feedback"><?php echo $data['nodoc_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idate">Ημ. Έκδοσης: </label>
                <input type="date" name="idate" data-date-format="dd/mm/yyyy" class="form-control form-control-lg <?php echo (!empty($data['idate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idate'];?>">
                <span class="invalid-feedback"><?php echo $data['idate_err']; ?></span>
            </div>
            
            <input type="submit" class="btn btn-success" value="Καταχώριση">
            </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>