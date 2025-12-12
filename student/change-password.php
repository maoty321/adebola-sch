<?php include ("./includes/head.php"); ?>
<link rel="stylesheet" href="../css/home-dashboard.css">
<title>Document</title>

<body class="bg-light">
    <div class="wrapper">
      <?php include './includes/header.php'?>

        <div class="container-fluid">
            <div class="row">
               <?php include './includes/side-bar.php'?>
                <div class="col-md-8 content" style="">
                   
                    <?php include'./component/change-password.php' ?>
                </div>
            </div>
        </div>
    </div>

<?php include './includes/footer.php'?>
</body>

</html>