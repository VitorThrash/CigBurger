<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CigBurger Backoffice</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png') ?>" type="image/png">
    
    <!--Bootstrap-->
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/bootstrap.min.css') ?>">
  
    <!--Fontawesome-->

    <link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome/all.min.css') ?>">
     <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    </head>

<body class="login-page-background">
    


<!--render section-->
<?= $this->renderSection('content') ?>



<!--Bootstrap JS-->
<script src="<?=base_url('assets/libs/bootstrap/bootstrap.bundle.min.js')  ?>"></script>


</body>
</html>