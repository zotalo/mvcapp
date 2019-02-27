<?php require APPROOT . '/views/inc/header.php';?>
<h1><?php echo $data['title'];?></h1>
<p><?php echo $data['description'];?></p>
<p>Τελαυταία Έκδοση: <strong><?php echo APPVERSION; ?></strong></p>
<p>Αλλαγές Στην Έκδοση: <strong><?php echo APPCHANGES; ?></strong></p>
<p>Ιστορικό Εκδόσεων: <strong><a href="<?php echo URLROOT;?>/pages/versions.php">Όλες οι εκδόσεις</a></strong>
<p>Υπεύθυνος Ανάπτυξης: <strong><?php echo APPDEVELOPER; ?></strong></p>
<p>Επικοινωνία: Email. <strong><a href="mailto:<?php echo DEVELOPEREMAIL;?>"><?php echo DEVELOPEREMAIL;?></a></strong> τηλ. <strong><a href="tel:2103891494"><?php echo DEVELOPERPHONE;?></a></strong>
<?php require APPROOT . '/views/inc/footer.php';?>