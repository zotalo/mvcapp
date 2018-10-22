<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
<div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT;?>/img/tea.png" alt="tea" height="40" width="40"/><?php echo SITENAME;?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Αρχική</a>
          </li> -->
          <li class="nav-item dropdown" data-hover="dropdown">
            <a class="nav-link" href="<?php echo URLROOT; ?>/protocols/index">Πρωτόκολλο</a>
            <ul class="dropdown-menu bg-dark">
              <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/protocols/all">Προηγούμενα Έτη</a></li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/files/index">Αρχεία</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">Σχετικά</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT;?>/users/show/<?php echo $_SESSION['user_id'];?>">Καλώς ήρθες <?php echo $_SESSION['user_name'] ." με ρόλο: ". $_SESSION['user_role']; ?></a>
          </li>
          <?php if($_SESSION['user_role_no']==1) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/administrators/index">Διαχείριση</a>
            </li>
          <?php endif; ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Αποσύνδεση</a>
          </li>
          
        <?php else : ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Εγγραφή</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Σύνδεση</a>
          </li>
        <?php endif; ?>
        </ul>
      </div>
      </div>
    </nav>