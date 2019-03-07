<?php require APPROOT . '/views/inc/header.php';?>
<h1><?php echo $data['title'];?></h1>
<p><?php echo $data['description'];?></p>
<p>Τελευταία Έκδοση: <strong><?php echo $data['lastversion']->versionno." - ".$data['lastversion']->versiondate; ?></strong></p>
<p>Αλλαγές Στην Έκδοση: <strong><?php echo $data['lastversion']->versiondescription; ?></strong></p>
<p>Ιστορικό Εκδόσεων: <strong><a href="<?php echo URLROOT;?>/pages/versions">Όλες οι εκδόσεις</a></strong>
<p>Υπεύθυνος Ανάπτυξης: <strong><?php echo APPDEVELOPER; ?></strong></p>
<p>Επικοινωνία: Email. <strong><a href="mailto:<?php echo DEVELOPEREMAIL;?>"><?php echo DEVELOPEREMAIL;?></a></strong> τηλ. <strong><a href="tel:2103891494"><?php echo DEVELOPERPHONE;?></a></strong>
<?php require APPROOT . '/views/inc/footer.php';?>