<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $pageTitle; ?></title>


</head>

<body>
<?php require($this->viewFile); ?>
</body>
</html>